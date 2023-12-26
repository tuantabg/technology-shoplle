<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
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
        $this->slider->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
        ]);

        // Image Upload file
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);

        return redirect()
            ->route('menus.index')
            ->with('message','Thêm menu thành công');
    }
}
