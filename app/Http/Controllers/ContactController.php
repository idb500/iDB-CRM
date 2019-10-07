<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Spatie\Permission\Models\Role;

use Redirect,Response,DB,Config;
use Datatables;
use Hash;
use Illuminate\Support\Facades\Crypt;

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
    $contact = \DB::table('list')->select('list.*','users.name as uname')->join("users", "list.created_by", "=", "users.id")->paginate(5);   
     }else{
        $contact = \DB::table('list')->select('list.*','users.name as uname')>join("users", "list.created_by", "=", "users.id")->where('list.assign_marketing_head' , '=' , $id)->paginate(5); 
     }
        return view('contact.index',compact('contact','stag2'));
    }
    public function listdata($listid)
    {
    // return view('contact.index');
    $id2= Auth::user()->id;
    $stag2 = \DB::table('note_type')->get(); 
    $addreplyform = \DB::table('bid_date_replytype')->get(); 
    $stage = \DB::table('bigdata_stage')->get(); 
    $users = \DB::table('users')->select('users.*','roles.name as rname')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '!=', 'Super Admin'],['roles.name', '!=', 'Marketing Head']])->get(); 
    $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
  
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.list_id' , '=' , $listid],['contact.assigned_id', '=' ,0]])->paginate(5);   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.list_id' , '=' , $listid],['contact.assigned_id' , '=' ,0]])->paginate(5); 
     }
        return view('contact.listdata',compact('contact','users','stag2','listid','addreplyform','stage'));
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
       return Redirect::back();

    }
    public function contactlist()
    {
        
    // return view('contact.index');
    $id2= Auth::user()->id;
    $stag = \DB::table('stages')->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',0]])->paginate(5); 
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',0]])->count();   
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id', '=' ,$id2],['contact.stage','=',0]])->paginate(5);
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id', '!=' ,$id2],['contact.stage','=',0]])->count();
     }
     
        return view('contact.contactlist',compact('contact','stag','stage2','contactlistcount'));
    }
    public function listnote(Request $request)
    {
       
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
        \DB::table('list_note')->insert(['list_id'=>$contactid, 'stage'=>0,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();

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
       $typeid=""; 
       $typeid  = isset($input['typeid']) ? $input['typeid'] : '';
       $description = $input['description']; 
       if($typeid!=''){
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>3,'type_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
       } else {
        $subtypeid = $input['subtypeid']; 
        \DB::table('list_note')->insert(['contact_id'=>$contactid,'stage'=>3,'sub_type'=>$subtypeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
       }
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
    $stag = \DB::table('stages')->where('category','=',1)->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',1]])->paginate(5);  
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',1]])->count();    
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',1]])->paginate(5);
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',1]])->count();
    }
        return view('contact.opportunitylist',compact('contact','stag','stag2','contactlistcount'));
    }
    public function leadlist()
    {
    $id2= Auth::user()->id;
    $stag = \DB::table('stages')->where('category','=',2)->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',2]])->paginate(5); 
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',2]])->count();    
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',2]])->paginate(5);
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
    public function transfer_client($id)
    {      
       $checkid = $id; 
 
        $data2 = \DB::table('contact')->where('id', $checkid)->update(['stage'=>3]);
       
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
    public function clientlist()
    {
    $id2= Auth::user()->id;
    $stag = \DB::table('stages')->get(); 
    $stag2 = \DB::table('note_type')->get(); 
   $stages = \DB::table('users')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '=', 'Super Admin'],['users.id', '=', $id2]])->count();   
    if($stages=='1'){
    $contact = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',3]])->paginate(5); 
    $contactlistcount = \DB::table('contact')->where([['contact.assigned_id', '!=' ,0],['contact.stage','=',3]])->count();    
     }else{
        $contact = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',3]])->paginate(5);
        $contactlistcount = \DB::table('contact')->select('contact.*')->join("list", "list.id", "=", "contact.list_id")->where([['contact.assigned_id' , '=' ,$id2],['contact.stage','=',3]])->count();
    
    }
            return view('contact.clientlist',compact('contact','stag','stag2','contactlistcount'));
    }

    public function createlist()
    {
        $users = \DB::table('users')->select('users.*','roles.name as rname')->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")->join("roles", "roles.id", "=", "model_has_roles.role_id")->where([['roles.name', '!=', 'Super Admin'],['roles.name', '=', 'Marketing Head']])->get(); 
        return view('contact.create_list',compact('users'));
    }
    public function listcreatestore(Request $request)
    {
      
        $input = $request->all();
        $listname = $input['listname']; 
        $fileter = $input['fileter']; 
        $assignedto = $input['assignedto']; 
       $created_by = $input['created_by'];  
        $file = $request->file('file');
        $filename = date('YmdHis').$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
       
        //\DB::table('log')->insert(['phone'=>$phone, 'subject'=>'Collection Master add file', 'message'=> $message, 'source'=> 'Customer Portal' ,  'add_date'=>date('Y-m-d H:i:s')]);
        $lastInsertedID= \DB::table('list')->insertGetId(['list_name'=>$listname,'filter_condition'=>$fileter, 'assign_marketing_head'=>$assignedto,'created_by'=>$created_by,'created_date'=>date('Y-m-d H:i:s')]);
        if(in_array(strtolower($extension),$valid_extension)){
        
        $location = 'uploads';
        $file->move($location,$filename);
        $filepath = base_path($location."/".$filename);
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
        $num = count($filedata );
        if($i == 0){
        $i++;
        continue;
        }
        for ($c=0; $c < $num; $c++) {
        $importData_arr[$i][] = $filedata [$c];
        }
        $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
     
        \DB::table('contact')->insert(['list_id'=>$lastInsertedID, 'domain_name'=>$importData[1], 'query_time'=> date('Y-m-d H:i:s',strtotime($importData[2])),
         'create_date'=> date('Y-m-d',strtotime($importData[3])),
        'update_date'=>date('Y-m-d',strtotime($importData[4])),'expiry_date'=>date('Y-m-d',strtotime($importData[5])),'domain_registrar_id'=>$importData[6],
        'domain_registrar_name'=>$importData[7], 
        'domain_registrar_whois'=>$importData[8], 'domain_registrar_url'=>$importData[9], 'registrant_name'=>$importData[10], 'registrant_company' =>$importData[11],
        'registrant_address'=>$importData[12], 'registrant_city'=>$importData[13], 'registrant_state'=>$importData[14], 'registrant_zip' =>$importData[15],
        'registrant_country'=>$importData[16], 'registrant_email'=>$importData[17], 'registrant_phone'=>$importData[18], 'registrant_fax' =>$importData[19],
        'created_by'=>$created_by, 'created_date'=>date('Y-m-d H:i:s'), 'stage'=>0]);
        
        }
        
        
        }
        return Redirect::back();
    }
    public function nooflist($listid)
    {
        $dataemail = Crypt::decrypt($listid);
        $stages = DB::table('contact')->select('list.*')->join("list", "list.id", "=", "contact.list_id")->where(['contact.registrant_email'=>$dataemail])->distinct()->get();
        return view('contact.nooflist',compact('stages'));
       
    }
    public function addreply_form(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
       $datetimepicker = $input['datetimepicker']; 
       \DB::table('bigdata_reply')->insert(['contactid'=>$contactid, 'bigdata_replytype_id'=>$typeid,'datetime'=>date('Y-m-d H:i:s',strtotime($datetimepicker)),'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
       return Redirect::back();
    }
    public function stageform(Request $request)
    {
        $input = $request->all();
        $contactid = $input['contactid']; 
       $created_by = $input['created_by'];     
       $typeid = $input['typeid']; 
       $description = $input['description']; 
       \DB::table('bigdata_stageform')->insert(['contactid'=>$contactid, 'bigdata_stage_id'=>$typeid,'description'=>$description,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s')]);
       return Redirect::back();
    }
}
