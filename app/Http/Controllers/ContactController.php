<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Spatie\Permission\Models\Contact;
use Redirect,Response,DB,Config;
use Datatables;
use Hash;
class ContactController extends Controller
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
    // return view('contact.index');
    $id= Auth::user()->id;

    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('list')->get();   
     }else{
        $contact = \DB::table('list')->select('list.*')->where('list.assign_marketing_head' , '=' , $id)->get();
     }
        return view('contact.index',compact('contact'));
    }
    public function listdata($listid)
    {
    // return view('contact.index');
    $id2= Auth::user()->id;

    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('contact')->where('contact.list_id' , '=' , $listid)->get();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where('contact.list_id' , '=' , $listid)->get();
     }
        return view('contact.listdata',compact('contact'));
    }

    
    public function usersList()
    {
        $contact = DB::table('contact')->select('*');
        return datatables()->of($contact)
            ->make(true);
    }
}
