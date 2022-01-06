<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->get();

        return response()->json($cities);
    }

    public function store(CityRequest $request)
    {
        $city = City::create($request->all());

        return response()->json($city, 201);
    }

    public function show($id)
    {
        $city = City::findOrFail($id);

        return response()->json($city);
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());

        return response()->json($city, 200);
    }

    public function destroy($id)
    {
        City::destroy($id);

        return response()->json(null, 204);
    }
}
