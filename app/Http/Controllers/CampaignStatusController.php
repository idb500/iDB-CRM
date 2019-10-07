<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;
class CampaignStatusController extends Controller
{
   
    function __construct()
    {
         $this->middleware('permission:Campaign-status-list');
         $this->middleware('permission:Campaign-status-create', ['only' => ['create','store']]);
         $this->middleware('permission:Campaign-status-update', ['only' => ['edit','update']]);
         $this->middleware('permission:Campaign-status-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $stages = \DB::table('campaign_status')->select('campaign_status.*','users.name as uname')->join("users", "users.id", "=", "campaign_status.created_by")->get();   
        
        return view('settings.campaignstatus.index',compact('stages'));
    }
    public function create()
    {
       
        return view('settings.campaignstatus.create');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:category,name',
        // ]);
        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['fafaicon']; 
        
       $created_by = $input['created_by'];       
        $data = \DB::table('campaign_status')->insert(['name'=>$name,'icon'=>$fafaicon, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('campaignstatus.index')
                        ->with('success','Campaign Status created successfully');

    }
    public function edit($id)
    {
        $user = \DB::table('campaign_status')->where(['id'=>$id])->first();
        return view('settings.campaignstatus.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:category,name',
           
        // ]);
        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['icon']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('campaign_status')->where('id', $id)->update(['name'=>$name, 'icon'=>$fafaicon,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('campaignstatus.index')
                        ->with('success','Campaign Status updated successfully');
    }
    public function destroy($id)
    {
        DB::table("campaign_status")->where('id',$id)->delete();
        return redirect()->route('campaignstatus.index')
                        ->with('success','Campaign Status deleted successfully');
    }


  
  
}
