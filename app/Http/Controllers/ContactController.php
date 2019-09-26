<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Spatie\Permission\Models\Role;

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
    
   //  function __construct()
   //  {
   //       $this->middleware('permission:list');
   //       $this->middleware('permission:contact',  ['only' => ['listdata']]);
   //       $this->middleware('permission:contact-assigned', ['only' => ['store']]);
   //       $this->middleware('permission:contact-list' , ['only' => ['contactlist']]);
   //       $this->middleware('permission:list-note', ['only' => ['listnote']]);
   //  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    // return view('contact.index');
    $id= Auth::user()->id;
    $stag2 = \DB::table('note_type')->get(); 
    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('list')->select('list.*','users.name as uname')->join("users", "list.created_by", "=", "users.id")->get();   
     }else{
        $contact = \DB::table('list')->select('list.*','users.name as uname')>join("users", "list.created_by", "=", "users.id")->where('list.assign_marketing_head' , '=' , $id)->get();
     }
        return view('contact.index',compact('contact','stag2'));
    }
    public function listdata($listid)
    {
    // return view('contact.index');
    $id2= Auth::user()->id;
    $stag2 = \DB::table('note_type')->get(); 
    $users = \DB::table('users')->select('users.*','roles.name as rname')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '!=', 'Super Admin'],['roles.name', '!=', 'Marketing Head']])->get(); 
    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.list_id' , '=' , $listid],['contact.assigned_id', '=' ,0]])->get();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.list_id' , '=' , $listid],['contact.assigned_id' , '=' ,0]])->get();
     }
        return view('contact.listdata',compact('contact','users','stag2'));
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
    $stag = \DB::table('stages')->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',0]])->get(); 
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',0]])->count();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id', '=' ,$id2],['contact.stage','=',0]])->get();
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id', '!=' ,$id2],['contact.stage','=',0]])->count();
     }
     
        return view('contact.contactlist',compact('contact','stag','stage2','contactlistcount'));
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
    public function listnote2(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
        \DB::table('list_note')->insert(['contact_id'=>$contactid, 'stage'=>0,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
                        

    }
    public function listnote_contact(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>1,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function listnote_contact_opportunity(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];    
       $typeid=""; 
       $typeid  = isset($input['typeid']) ? $input['typeid'] : '';
      
       $description = $input['description']; 
       if($typeid!=''){
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>2,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
       } else {
        $subtypeid = $input['subtypeid']; 
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>2,'sub_type'=>$subtypeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
      
       }
        return Redirect::back();
    }
    public function listnote_contact_lead(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>3,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function remainder(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $datetimepicker = $input['datetimepicker']; 
       $description = $input['description']; 
      
        \DB::table('contact_remainder')->insert(['contact_id'=>$contactid, 'type'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'remarks'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function opportunitylist()
    {
    $id2= Auth::user()->id;
    $stag = \DB::table('stages')->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',1]])->get();  
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',1]])->count();    
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',1]])->get();
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',1]])->count();
    }
        return view('contact.opportunitylist',compact('contact','stag','stag2','contactlistcount'));
    }
    public function leadlist()
    {
    $id2= Auth::user()->id;
    $stag = \DB::table('stages')->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',2]])->get(); 
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',2]])->count();    
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',2]])->get();
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',2]])->count();
    
    }
            return view('contact.leadlist',compact('contact','stag','stag2','contactlistcount'));
    }

    
    
    public function multiple_transfer_opportunity(Request $request)
    {
        $this->validate($request, [
            'assignedto' => 'required',
        ]);
        $input = $request->all();
        
       $checkid = $input['checkid']; 
       foreach($checkid as $contactid){
        $data2 = \DB::table('contact')->where('id', $contactid)->update(['stage'=>1]);
       }
       return Redirect::back();

    }


    public function transfer_opportunity($id)
    {      
       $checkid = $id; 
 
        $data2 = \DB::table('contact')->where('id', $checkid)->update(['stage'=>1]);
       
        return Redirect::back();

    }

    public function multiple_transfer_lead(Request $request)
    {
        $this->validate($request, [
            'assignedto' => 'required',
        ]);
        $input = $request->all();
        
       $checkid = $input['checkid']; 
       foreach($checkid as $contactid){
        $data2 = \DB::table('contact')->where('id', $contactid)->update(['stage'=>2]);
       }
       return Redirect::back();

    }
    public function transfer_lead($id)
    {      
       $checkid = $id; 
 
        $data2 = \DB::table('contact')->where('id', $checkid)->update(['stage'=>2]);
       
        return Redirect::back();

    }
    public function remaindercont(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $datetimepicker = $input['datetimepicker']; 
       $description = $input['description']; 
      
        \DB::table('contact_remainder')->insert(['contact_id'=>$contactid,'stage'=>0 ,'type'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'remarks'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function remainder_contact(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $datetimepicker = $input['datetimepicker']; 
       $description = $input['description']; 
      
        \DB::table('contact_remainder')->insert(['contact_id'=>$contactid,'stage'=>1 ,'type'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'remarks'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function remainder_contact_opportunity(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $datetimepicker = $input['datetimepicker']; 
       $description = $input['description']; 
      
        \DB::table('contact_remainder')->insert(['contact_id'=>$contactid, 'stage'=>2,'type'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'remarks'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function remainder_contact_lead(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $datetimepicker = $input['datetimepicker']; 
       $description = $input['description']; 
      
        \DB::table('contact_remainder')->insert(['contact_id'=>$contactid, 'stage'=>3,'type'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'remarks'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }

    public function contactdetails($id)
    {
       
        $userid= Auth::user()->id;
        $stag = \DB::table('stages')->get(); 
        $stag2 = \DB::table('note_type')->get(); 
        $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $userid]])->limit('1')->count();       
        if($stages=='1'){
        $contact = \DB::table('contact')->select('contact.*','users.name as uname')->join("users", "contact.created_by", "=", "users.id")->where(['contact.id'=>$id])->limit('1')->get(); 
        }else{
        $contact = \DB::table('contact')->select('contact.*','users.name as uname')>join("users", "contact.created_by", "=", "users.id")->where(['contact.id'=>$id])->limit('1')->get();
        }
        return view('contact.contactdetails',compact('contact','stag','stag2'));

       
    }

}
