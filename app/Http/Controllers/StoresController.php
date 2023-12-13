<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Store;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 获取所有商店数据并返回数组形式
    public function index()
    {
        $s=store::all();
        return view('stores.index')->with('stores',$s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $name = $this->generateRandomName();
        $country = $this->generateRandomCountry();
        $service = $this->generateRandomService();
        $info = $this->generateRandomInfo();
        $url = $this->generateRandomUrl();
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

        $store = Store::create([
            'name' => $name,
            'country' => $country,
            'service' => $service,
            'info' => $info,
            'url' => $url,
            'created_at' => $random_datetime,
            'updated_at' => $random_datetime,
        ]);

        return redirect('stores'); // 返回到 stores 路由
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store=store::findOrFail($id);
        $cars=$store->cars;
        return view('stores.show',['store'=>$store,'cars'=>$cars]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store=store::findOrFail($id);
        return view('stores.edit',['store'=>$store]);
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
        $store=store::findOrFail($id);
        $store->delete();
        return redirect('stores');
    }
}
