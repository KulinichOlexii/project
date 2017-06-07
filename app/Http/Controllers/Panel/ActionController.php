<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Action;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActionRequest;


class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::orderBy('id', 'desc')->paginate(10);
        return view('panel.action.index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.action.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRequest $request)
    {
        $action = new Action;
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date("Y-m-d H:i:s") . '-' . $file->getClientOriginalName();
            $request->file('image')->move("img", $fileName);
            $action->image = $fileName;
        }
        $action->title_ru = $request->title_ru;
        $action->title_ua = $request->title_ua;
        $action->content_ru = $request->content_ru;
        $action->content_ua = $request->content_ua;
        $action->endData = $request->endData;
        $action->status = $request->status;
        $action->active = $request->active;
        $action->save();
        return redirect('/panel/action');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = Action::find($id);
        return view('panel.action.show', compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Action::find($id);
        return view('panel.action.edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActionRequest $request, $id)
    {
        $action = Action::find($id);
        if (isset($request['active'])) $request['active'] = $request['active'] ? 1 : null;
        else $request['active'] = null;
        if ($request['image'] == '') {
            unset($request['image']);
        }
        $action->update($request->all());
        return redirect('/panel/action');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::find($id);
        if(!empty($action->image)){
            $file_path = base_path() . '/public/img/' . $action->image;
            if(file_exists($file_path)) unlink($file_path);
        }
        $action->delete();
        return redirect('/panel/action');
    }
}
