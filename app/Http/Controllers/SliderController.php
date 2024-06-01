<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Slider, User};

use Validator, Auth, Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Slider')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $sliders = Slider::get();
        return view('pages.backend.slider.index', compact('sliders'));
    }

    public function create()
    {
        if (!can('Create Slider')) {
            abort(403);
        }
        return view('pages.backend.slider.create');
    }

    public function store(Request $request)
    {
        if (!can('Create Slider')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'highlighted_title' => 'required',
          'heading' => 'required',
          'summary' => 'required',
          'button_text' => 'required',
          'button_url' => 'required',
          'slider_image' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500'],
          'start_date' => 'required|date|before_or_equal:end_date',
          'end_date' => 'required|date|after_or_equal:start_date',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/slider/images', $request->file('slider_image'));
        $slider = new Slider();
        $slider->highlighted_title = $request->highlighted_title;
        $slider->heading  = $request->heading;
        $slider->summary  = $request->summary;
        $slider->image  = $filePath;
        $slider->button_text  = $request->button_text;
        $slider->button_url  = $request->button_url;
        $slider->button_target  = $request->button_target ? $request->button_target  : 'own-site';
        $slider->start_date  = $request->start_date;
        $slider->end_date  = $request->end_date;
        $slider->status  = $request->status;
        $slider->created_by  = Auth::id();
        $slider->save();

        return redirect()
          ->route('backend.slider.index')
          ->with('success', 'Created Successfully!')
          ->withInput();

    }

    public function edit(Slider $slider)
    {
        if (!can('Edit Slider')) {
            abort(403);
        }

        $id =  $slider->id;
        $row = Slider::find($id);
        return view('pages.backend.slider.edit', compact('row'));

    }

    public function update(Request $request, Slider $slider)
    {
        if (!can('Edit Slider')) {
            abort(403);
        }
        
        $validator = Validator::make($request->all(), [
          'highlighted_title' => 'required',
          'heading' => 'required',
          'summary' => 'required',
          'button_text' => 'required',
          'button_url' => 'required',
          'start_date' => 'required|date|before_or_equal:end_date',
          'end_date' => 'required|date|after_or_equal:start_date',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        try {

            if ($request->file('image')) {
                $imageValidation = Validator::make($request->only('image'), [
                    'image' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500']
                ]);

                if ($imageValidation->fails()) {
                  return redirect()
                      ->back()
                      ->withErrors($imageValidation->errors())
                      ->withInput();
                }
                if (Storage::disk(config('app.storage_disk'))->exists($slider->image)) {
                    Storage::disk(config('app.storage_disk'))->delete($slider->image);
                }
                $slider->image = Storage::disk(config('app.storage_disk'))->putFile('upload/slider/images', $request->file('image'));
            }

            $slider->highlighted_title = $request->highlighted_title;
            $slider->heading = $request->heading;
            $slider->summary = $request->summary;
            $slider->button_text = $request->button_text;
            $slider->button_url = $request->button_url;
            $slider->button_target = $request->button_target ? $request->button_target  : 'own-site';
            $slider->start_date = $request->start_date;
            $slider->end_date = $request->end_date;
            $slider->status = $request->status;
            $slider->created_by = Auth::id();
            $slider->save();

            return redirect()
              ->route('backend.slider.index')
              ->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
          $validator->getMessageBag()->add('failed', $e->getMessage());
        }

    }
}
