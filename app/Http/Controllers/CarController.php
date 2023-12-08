<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;

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
        $data = $request->validated();
        Car::create($data);

        return redirect()->route('car.index');
    }

    public function show(string $id)
    {
        $cars = Car::all();
        return view('cars.show', compact('cars'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(CarRequest $request, string $id)
    {
        $car = Car::findOrFail($id);
        $data = $request->validated();

        $car->update($data);

        return redirect()->route('car.index');
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('car.index');
    }
}
