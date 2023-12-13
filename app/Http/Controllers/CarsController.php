<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Store;

class CarsController extends Controller
{
    //殘體字
    // 获取所有汽车数据并返回数组形式
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有汽车数据并返回数组形式
        $c=car::all();

        return view('cars.index')->with('cars',$c);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::orderBy('id', 'asc')->pluck('cars.name', 'cars.id');
        return view('cars.create',['cars'=>$cars,'carSelected'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sid = $request->input('sid');
        $model = $request->input('model');
        $riding_noise = $request->input('riding_noise');
        $idle_noise = $request->input('idle_noise');
        $max_power = $request->input('max_power');
        $max_rpm = $request->input('max_rpm');
        $displacement = $request->input('displacement');

        $car = Car::create([
            'sid' => $sid,
            'model' => $model,
            'riding_noise' => $riding_noise,
            'idle_noise' => $idle_noise,
            'max_power' => $max_power,
            'max_rpm' => $max_rpm,
            'displacement' => $displacement,
        ]);

        return redirect('cars'); // 返回到 cars 路由
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=car::findOrFail($id);

        return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car=car::findOrFail($id);
        return view('cars.edit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car=car::findOrFail($id);
        $car->delete();
        return redirect('cars');
    }

}
