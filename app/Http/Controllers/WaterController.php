<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterRequest;
use App\Models\Water;

use App\Http\Requests;

class WaterController extends Controller
{
    public function  __construct ()
    {
        $this->middleware('auth');
    }
    public function index ()
    {
        $waters = Water::all();
        return view('water.index',compact('waters'));
    }
    public function create()
    {
        return view('water.create');
    }

    public function store(WaterRequest $request)
    {
        //Water::create($request->getWaterData());
        $water = $request->getWater();
        $water->save();
        $water->fish()->attach($request->get('fish'));
        return redirect('/waters');
    }
}
