<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect,Response,DB,Config;
use Datatables;

class StageController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    return view('stage.index');
    }

    
    public function stagesList()
    {
        $stage = DB::table('stages')->select('*');
        return datatables()->of($stage)
            ->make(true);
    }

}
