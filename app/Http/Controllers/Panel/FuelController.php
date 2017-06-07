<?php

namespace App\Http\Controllers\Panel;
use App\Fuel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\FuelRequest;

class FuelController extends Controller
{
    public function index()
    {
        $fuels = Fuel::orderBy('id', 'desc')->paginate(10);
        return view('panel.fuel.index', compact('fuels'));
    }

    public function create()
    {
        return view('panel.fuel.create');
    }

    public function store(FuelRequest $request)
    {
        $fuel = new Fuel;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date("Y-m-d H:i:s") . '-' . $file->getClientOriginalName();
            $request->file('image')->move("img",$fileName);
            $fuel->image = $fileName;
        }
        $fuel->name_ru = $request->name_ru;
        $fuel->name_ua = $request->name_ua;
        $fuel->title_ru = $request->title_ru;
        $fuel->title_ua = $request->title_ua;
        $fuel->text_ru = $request->text_ru;
        $fuel->text_ua = $request->text_ua;
        $fuel->price = $request->price;
        $fuel->active = $request->active;
        $fuel->save();
        return redirect('/panel/fuel');
    }

    public function show($id)
    {
        $fuel = Fuel::find($id);
        return view('panel.fuel.show', compact('fuel'));
    }

    public function edit($id)
    {
        $fuel = Fuel::find($id);
        return view('panel.fuel.edit', compact('fuel'));
    }

    public function update(FuelRequest $request, $id)
    {
        $fuel = Fuel::find($id);
        if(isset($request['active'])) $request['active'] = $request['active'] ? 1 : null;
        else $request['active'] = null;
        $fuel->update($request->all());
        return redirect('/panel/fuel');
    }

    public function destroy($id)
    {
        $fuel = Fuel::find($id);
        if(!empty($fuel->image)){
            $file_path = base_path() . '/public/img/' . $fuel->image;
            if(file_exists($file_path)) unlink($file_path);
        }
        $fuel->stations()->sync([]);
        $fuel->delete();
        return redirect('/panel/fuel');
    }
}
