<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CarRequest $request)
    {
        $data = $request->all();
        Car::create($data);

        return redirect()->route('car.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('car.index');
    }
}
