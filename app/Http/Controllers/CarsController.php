<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Models\Car;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    //殘體字
    // 获取所有汽车数据并返回数组形式
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stores = Store::all();
        $store_id = $request->query('store');
        if ($store_id) {
            $cars = Car::where('sid', $store_id)->paginate(25);
        } else {
            $cars = Car::paginate(25);
        }
        return view('cars.index', ['cars' => $cars, 'stores' => $stores, 'selectedStore' => $store_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $stores = Store::orderBy('stores.id', 'asc')->pluck('stores.name', 'stores.id');
        return view('cars.create',['stores'=>$stores,'storeSelected'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateCarRequest $request)
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
     * @return Response
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
     * @return Response
     */
    public function edit($id)
    {
        parent::edit($id);
        $car = Car::findOrFail($id);
        $stores = Store::orderBy('stores.id', 'asc')->pluck('stores.name', 'stores.id');
        $selected_tags = $car->store->id;
        return view('cars.edit', ['car' =>$car, 'stores' => $stores, 'storeSelected' => $selected_tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(CreateCarRequest $request, $id)
    {
        $car = Car::findOrFail($id);

        $car->sid = $request->input('sid');
        $car->model = $request->input('model');
        $car->riding_noise = $request->input('riding_noise');
        $car->idle_noise = $request->input('idle_noise');
        $car->max_power = $request->input('max_power');
        $car->max_rpm = $request->input('max_rpm');
        $car->displacement = $request->input('displacement');
        $car->save();

        return redirect('cars');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $car=car::findOrFail($id);
        $car->delete();
        return redirect('cars');
    }

    public function white_licenceplate(Request $request)
    {
        $stores = Store::all();
        $store_id = $request->query('store');
        if ($store_id) {
            $c = Car::whiteLicene()->where('sid', $store_id)->paginate(25);
        } else {
            $c = Car::whiteLicene()->paginate(25);
        }
        return view('cars.index', ['cars' => $c, 'stores' => $stores, 'selectedStore' => $store_id]);
    }

    public function yellow_licenceplate(Request $request)
    {
        $stores = Store::all();
        $store_id = $request->query('store');
        if ($store_id) {
            $c = Car::yellowLicene()->where('sid', $store_id)->paginate(25);
        } else {
            $c = Car::yellowLicene()->paginate(25);
        }
        return view('cars.index', ['cars' => $c, 'stores' => $stores, 'selectedStore' => $store_id]);
    }

    public function red_licenceplate(Request $request)
    {
        $stores = Store::all();
        $store_id = $request->query('store');
        if ($store_id) {
            $c = Car::redLicene()->where('sid', $store_id)->paginate(25);
        } else {
            $c = Car::redLicene()->paginate(25);
        }
        return view('cars.index', ['cars' => $c, 'stores' => $stores, 'selectedStore' => $store_id]);
    }


}
