<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Ads, LandingPageItem};

use Validator;
use Auth;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Landing-Page-Item')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $landingPageItems = LandingPageItem::orderBy('sort_order')->get();
        return view('pages.backend.landing-page.index', compact('landingPageItems'));
    }

    public function create()
    {
        if (!can('Create Landing-Page-Item')) {
            abort(403);
        }

        $ads = Ads::get();

        return view('pages.backend.landing-page.create', compact('ads'));
    }

    public function store( Request $request )
    {
        if (!can('Create Landing-Page-Item')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'landing_page_item' => 'required',
          'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $lastItem = LandingPageItem::orderBy('id', 'desc')->first();
        $sortOrder = !empty($lastItem) ? $lastItem->sort_order : 0;
        $landingPageItem = new LandingPageItem();
        $landingPageItem->type = $request->landing_page_item;

        if ($request->landing_page_item == 'advertise') {
            if (empty($request->ad_id)) {
                return redirect()
                  ->back()
                  ->with('failed', 'Advertise not selected!')
                  ->withInput();
            }
            $landingPageItem->ad_id = $request->ad_id;
        }


        $landingPageItem->created_by = Auth::id();
        $landingPageItem->status = $request->status;
        $landingPageItem->sort_order = ++$sortOrder;
        $landingPageItem->save();

        return redirect()
          ->route('backend.landing-page-item.index')
          ->with('success', 'Created Successfully!')
          ->withInput();
    }

    public function sort(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'data' => ['required', 'array', 'min:1'],
        ]);

        if ($validator->fails()) {
            $message = "";
            $errors = $validator->errors();

            foreach ($errors->all() as $error) {
                $message .= $error. ' | ';
            }
            return response()->json([
                'status' => 'failed',
                'message' => $message
            ]);
        }

        foreach ($req->data as $value) {
            [$rowId, $sortOrder] = $value;
            try {
                LandingPageItem::where('id', $rowId)->update(['sort_order' => $sortOrder]);
            } catch (Exception $e) {}
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Updated!'
        ]);
    }

    public function landingPageItemDestroy(Request $request, LandingPageItem $item)
    {
        if (!can('Delete Landing-Page-Item')) {
            abort(403);
        }
        LandingPageItem::where('id', $item->id)->delete();

        return response()->json(['success' => true]);
    }
}
