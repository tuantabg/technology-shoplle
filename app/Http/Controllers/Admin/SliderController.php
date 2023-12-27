<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use StorageImageTrait;

    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(10);

        return view('admin.page.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.page.slider.add');
    }

    public function store(SliderRequest $request)
    {
        try {
            $sliderInsert = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image_url' => $request->input('image_url'),
            ];

            // Upload Image Sliders
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $sliderInsert['image_name'] = $dataImageSlider['file_name'];
                $sliderInsert['image_path'] = $dataImageSlider['file_path'];
            }

            $this->slider->create($sliderInsert);

            return redirect()->route('sliders.index')->with('message','Thêm slider thành công');

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);

        return view('admin.page.slider.edit', compact('slider'));
    }

    public function update($id, Request $request)
    {
        try {
            $sliderUpdate = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image_url' => $request->input('image_url'),
            ];

            // Upload Image Sliders
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $sliderUpdate['image_name'] = $dataImageSlider['file_name'];
                $sliderUpdate['image_path'] = $dataImageSlider['file_path'];
            }

            $this->slider->find($id)->update($sliderUpdate);

            return redirect()->route('sliders.index')->with('message','Cập nhập slider thành công');

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        $this->slider->find($id)->delete();

        return redirect()->route('sliders.index');
    }
}
