<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::withCount('clients')->get();
        return view('Cities.View', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cities.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try {
            DB::beginTransaction();
            $city = City::create([
                'name' => $request['name']
            ]);
            DB::commit();
            return redirect("/cities")->with('status', 'Se creo la ciudad correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/cities")->with('errors', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('Cities.Edit', compact('city'));
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
        try {
            DB::beginTransaction();
            $city = City::findOrFail($id);
            $city->name = $request['name'];
            $city->save();
            DB::commit();
            return redirect("/cities")->with('status', 'Se edito la ciudad correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/cities")->with('errors', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $city = City::findOrFail($id);
            $city->delete();
            DB::commit();
            return redirect("/cities")->with('status', 'Se elimino la ciudad correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/cities")->with('errors', $e->getMessage());
        }
    }
}
