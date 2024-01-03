<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Models\Car;
use App\Models\Store;
use Carbon\Carbon;

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
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateStoreRequest $request)
    {
        $name = $request->input('name'); // 将 'name' 字段作为 name
        $country = $request->input('name'); // 将 'name' 字段作为 country
        $service = $request->input('service'); // 将 'service' 字段作为 service
        $info = $request->input('info'); // 将 'info' 字段作为 info
        $url = $request->input('url'); // 将 'url' 字段作为 url
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

        return redirect('stores');
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
        parent::edit($id);
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
    public function update(CreateStoreRequest $request, $id)
    {
        $store=store::findOrFail($id);
        $store->update($request->all());
        return redirect('stores/'.$store->id)->with('message','Store updated successfully!'); // 返回到 cars 路由
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
