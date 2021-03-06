<?php

namespace App\Http\Controllers;

use App\Car;
use App\State;

class CarController extends Controller
{
    public function getAvailableCars()
    {
        $available_cars = State::with('cars')
                    ->where('id','=',1)
                    ->orderBy('id','desc')
                    ->get();
        
        return response(['data' => $available_cars],200);
    }

    public function showAllCars()
    {
        $cars = Car::all();
        return response(['data' => $cars],200);
    }

    public function addCar()
    {
        Car::create([
            'plate_number' => request('plate_number'),
            'model' => request('model'),
            'capacity' => request('capacity'),
            'state_id' => 1
        ]);
        return response(['message' => 'Car record added successfully'],200);
    }

    public function update($id)
    {
        $car = Car::find($id);
        $car->plate_number = request('plate_number');
        $car->model = request('model');
        $car->capacity = request('capacity');
        $car->state_id = request('state_id');
        $car->save();
        return response(['message' => 'Car record updated successfully'],200);
    }

    public function show($id)
    {
        $car = Car::find($id);
        return response(['data' => $car],200);
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return response(['message' => 'Car record has been deleted'],200);
    }
}
