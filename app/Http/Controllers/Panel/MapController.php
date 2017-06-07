<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests\StationRequest;
use App\Http\Controllers\Controller;
use App\Station;
use App\City;
use App\Fuel;
use Illuminate\Support\Facades\Input;

//use Illuminate\Support\Facades\Redirect;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::orderBy('id', 'desc')->simplePaginate(5);
        $mapStations = Station::join('cities', 'cities.id', '=', 'stations.city_id')
            ->select('stations.id', 'address_ru as address', 'lat', 'lng', 'cities.name_ru as city')
            ->with(array('fuels' => function ($query) {
                $query->select('name_ru', 'price');
            }))
            ->get();
        $infoMarkers = json_encode($mapStations);
        return view('panel.map.index', compact('stations', 'infoMarkers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuels = Fuel::where('active', 1)->get();
        $cities = City::all();
        return view('panel.map.create', compact('fuels', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationRequest $request)
    {
        $station = Station::create($request->all());
        if ($request['fuels'] != null) {
            $station->fuels()->attach($request['fuels']);
        }
        return redirect('/panel/map');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);
        $fuels = Fuel::where('active', 1)->get();
        $cities = City::all();
        return view('panel.map.edit', compact('station', 'fuels', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, $id)
    {
        $station = Station::find($id);
        $station->update($request->all());
        if (isset($request['active'])) $request['active'] = $request['active'] ? 1 : null;
        else $request['active'] = null;
        if ($request['fuels'] != null) {
            $station->fuels()->sync($request['fuels']);
        } else {
            $fuels = [];
            $station->fuels()->sync($fuels);
        }
        return redirect('/panel/map');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->fuels()->sync([]);
        $station->delete();
        return redirect('/panel/map');
    }
}
