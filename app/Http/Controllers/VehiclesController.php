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

    public function update(Request $r)
    {
        $vehicle = Vehicle::find($r->id);
        $vehicle->update($r->all());
        return response()->json('updated!');
    }

    public function index()
    {
        $vehs = Vehicle::all()->toArray();
        return array_reverse($vehs);
    }

    public function destroy(Request $r)
    {
        $veh = Vehicle::find($r->id);
        $veh->delete();

        return response()->json('veh deleted!');
    }

}
