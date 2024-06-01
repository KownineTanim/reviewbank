<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GeneralSetting;

use Storage;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage General-Settings')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function create()
    {
        return view('pages.backend.general-settings.create');
    }

    public function store(Request $request)
    {
        $settings = [];
        $settings['settings_data'] = $request->settings_data;
        $settingsRow = GeneralSetting::first();

        if (empty($settingsRow)) {
            $settingsRow = new GeneralSetting();
        }

        if (isset($request->settings_data['images']) && is_array($request->settings_data['images'])) {
            foreach ($request->settings_data['images'] as $name => $file) {
                $imageFilePath = Storage::disk(config('app.storage_disk'))->putFile('upload/general_settings/images', $file);
                $settings['settings_data'][$name] = $imageFilePath;
            }
            unset($settings['settings_data']['images']);
        }
        $settingsRow->settings_data = json_encode($settings['settings_data']);
        $settingsRow->updated_at = date('Y-m-d H:i:s');
        $settingsRow->save();

        return response()->json([
            'status' => 'success',
            'settings' => $settingsRow
        ]);
    }
}
