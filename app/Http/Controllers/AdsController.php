<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ads;
use View;
use Validator;
use Storage;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Ads')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $ads = Ads::get();
        return view('pages.backend.ads.index', compact('ads'));
    }

    public function create()
    {
        if (!can('Create Ads')) {
            abort(403);
        }

        return view('pages.backend.ads.create');
    }

    public function loadForm($template)
    {
        if (!can('Create Ads')) {
            abort(403);
        }

        $html = View::make('pages.frontend.ads.form.'.$template);
        return $html;
    }

    public function store(Request $request)
    {
        if (!can('Create Ads')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required'
        ]);

        if ($validator->fails()) {
            $message = [];

            foreach ($validator->errors()->all() as $error) {
                $message[] = $error;
            }
            return response()->json([
                'status' => 'failed',
                'message' => join(' | ', $message)
            ]);
        }

        $adsData = [];
        $adsData['title'] = $request->title;
        $adsData['template'] = $request->template;
        $adsData['data'] = $request->template_data;

        if (isset($request->template_data['images']) && is_array($request->template_data['images'])) {
            foreach ($request->template_data['images'] as $name => $file) {
                $imageFilePath = Storage::disk(config('app.storage_disk'))->putFile('upload/ads/images', $file);
                $adsData['data'][$name] = $imageFilePath;
            }
            unset($adsData['data']['images']);
        }
        $adsData['data'] = json_encode($adsData['data']);
        Ads::create($adsData);

        return response()->json([
            'status' => 'success',
            'ad' => $adsData
        ]);
    }

    public function edit(Ads $ad)
    {
        if (!can('Edit Ads')) {
            abort(403);
        }
        
        $id =  $ad->id;
        $row = Ads::find($id);
        return view('pages.backend.ads.edit', compact('row'));
    }

    public function update(Request $request, Ads $ad)
    {
        if (!can('Edit Ads')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required'
        ]);

        if ($validator->fails()) {
            $message = [];

            foreach ($validator->errors()->all() as $error) {
                $message[] = $error;
            }
            return response()->json([
                'status' => 'failed',
                'message' => join(' | ', $message)
            ]);
        }

        $adsData = [];
        $adsData['title'] = $request->title;
        $adsData['template'] = $request->template;
        $adsData['data'] = json_decode($ad['data'], true);
        $adsData['data'] = array_merge($adsData['data'], $request->template_data);

        if (isset($request->template_data['images']) && is_array($request->template_data['images'])) {
            foreach ($request->template_data['images'] as $name => $file) {
                $oldFile = $adsData['data'][$name];
                $imageFilePath = Storage::disk(config('app.storage_disk'))->putFile('upload/ads/images', $file);
                $adsData['data'][$name] = $imageFilePath;

                if (Storage::disk(config('app.storage_disk'))->exists($oldFile)) {
                    Storage::disk(config('app.storage_disk'))->delete($oldFile);
                }
            }
            unset($adsData['data']['images']);
        }
        $adsData['data'] = json_encode($adsData['data']);
        $ad->update($adsData);
        return response()->json([
            'status' => 'success',
            'ad' => $adsData
        ]);
    }
}
