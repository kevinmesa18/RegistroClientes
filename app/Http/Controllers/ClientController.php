<?php

namespace App\Http\Controllers;

use App\City;
use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $clients = Client::with('city')->get();
        return view('Clients.View', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('Clients.Create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::create([
                'name' => $request['name'],
                'city_id' => $request['city_id'],
            ]);
            DB::commit();
            return redirect("/clients")->with('status', 'Se creo el cliente correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/clients")->with('errors', $e->getMessage());
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
        $cities = City::all();
        $client = Client::find($id);
        return view('Clients.Edit', compact('cities', 'client'));
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
            $client = Client::findOrFail($id);
            $client->name = $request['name'];
            $client->city_id = $request['city_id'];
            $client->save();
            DB::commit();
            return redirect("/clients")->with('status', 'Se edito el cliente correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/clients")->with('errors', $e->getMessage());
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
            $client = Client::findOrFail($id);
            $client->delete();
            DB::commit();
            return redirect("/clients")->with('status', 'Se elimino la ciudad correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/clients")->with('errors', $e->getMessage());
        }
    }
}
