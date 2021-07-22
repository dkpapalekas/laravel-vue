<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehiclesController extends Controller {

    public function insert(Request $r)
    {
        $x = new Vehicle();
        $x->lic_plate = $r->lic_plate;
        $x->brand = $r->brand;
        $x->model = $r->model;
        $x->km_tracker = $r->km_tracker;
        $x->save();
        return $x;
    }

    public function update(Request $r): Vehicle {
        $r->validate([
            'id' => 'required|integer',
            'brand' => 'nullable|string',
            'lic_plate' => 'nullable|string',
            'model' => 'nullable|string',
        ]);

        $id = $r->get('id');
        $brand = $r->get('brand');
        $lic_plate = $r->get('lic_plate');
        $model = $r->get('model');

        $x = Vehicle::findOrFail($r->id);

        if ($brand) $x->brand = $brand;
        if ($lic_plate) $x->lic_plate = $lic_plate;
        if ($model) $x->model = $model;

        $x->save();

        return $x;
    }

    public function index()
    {
        $vehs = Vehicle::all()->toArray();
        return $vehs;
    }

    public function destroy(Request $r)
    {
        $veh = Vehicle::find($r->id);
        $veh->delete();

        return response()->json('veh deleted!');
    }

    public function trunc(Request $r)
    {
        Vehicle::truncate();
        return response()->json('veh deleted!');
    }

}
