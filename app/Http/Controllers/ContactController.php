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
    function __construct()
    {
         $this->middleware('permission:list');
         $this->middleware('permission:contact');
         $this->middleware('permission:contact-assigned', ['only' => ['store']]);
         $this->middleware('permission:contact-list', ['only' => ['contactlist']]);
         $this->middleware('permission:list-note', ['only' => ['listnote']]);
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
    $contact = \DB::table('list')->select('list.*','users.name as uname')->join("users", "list.created_by", "=", "users.id")->get();   
     }else{
        $contact = \DB::table('list')->select('list.*','users.name as uname')>join("users", "list.created_by", "=", "users.id")->where('list.assign_marketing_head' , '=' , $id)->get();
     }
        return view('contact.index',compact('contact'));
    }
    public function listdata($listid)
    {
    // return view('contact.index');
    $id2= Auth::user()->id;
    $users = \DB::table('users')->select('users.*','roles.name as rname')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '!=', 'Super Admin'],['roles.name', '!=', 'Marketing Head']])->get(); 
    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.list_id' , '=' , $listid],['contact.assigned_id', '=' ,0]])->get();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.list_id' , '=' , $listid],['contact.assigned_id' , '=' ,0]])->get();
     }
        return view('contact.listdata',compact('contact','users'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'assignedto' => 'required',
        ]);
        $input = $request->all();
        $assignedto = $input['assignedto']; 
       $created_by = $input['created_by'];     
       $checkid = $input['checkid']; 
       foreach($checkid as $contactid){
        $data2 = \DB::table('contact')->where('id', $contactid)->update(['assigned_id'=>$assignedto]);
     
        $data = \DB::table('contact_assign')->insert(['contact_id'=>$contactid, 'assign_to'=>$assignedto,'assign_from'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ]);
       }
        return redirect()->route('contact.index')
                        ->with('success','List Assigned successfully');

    }
    public function contactlist()
    {
    // return view('contact.index');
    $id2= Auth::user()->id;
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where('contact.assigned_id', '!=' ,0)->get();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where('contact.assigned_id' , '=' ,$id2)->get();
     }
        return view('contact.contactlist',compact('contact'));
    }
    public function listnote(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $subject = $input['subject']; 
       $description = $input['description']; 
        \DB::table('list_note')->insert(['list_id'=>$contactid, 'subject'=>$subject,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('contact.index')
                        ->with('success','Note Added successfully');

    }
}
