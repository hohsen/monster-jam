<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }
    public function store(SliderRequest $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/sliders_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;

            Slider::create($data);

            return redirect()->route('slider.index');
        }else{
            $data = $request->validated();
            Slider::create($data);
            return redirect()->route('slider.index');
        }
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/sliders_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;
            $slider->update($data);

            return redirect()->route('slider.index');
        }else{
            $data = $request->validated();
            $slider->update($data);
            return redirect()->route('slider.index');
        }
    }

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('slider.index');
    }
}
