<?php

namespace App\Http\Controllers\Panel;

use App\Fuel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;


class PanelController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Главная'
        ];
        return view('panel.index', $data);
    }
}
