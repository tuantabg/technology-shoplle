<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->middleware('auth');
        $this->setting = $setting;
    }

    public function index() {
        $settings = $this->setting->latest()->paginate(15);

        return view('admin.page.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.page.setting.add');
    }

    public function store(SettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);

        return redirect()->route('settings.index')->with('message','Thêm Cài đặt thành công');
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);

        return view('admin.page.setting.edit', compact('setting'));
    }

    public function update($id, Request $request)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);

        return redirect()->route('settings.index')->with('message','Thêm Cài đặt thành công');
    }

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
