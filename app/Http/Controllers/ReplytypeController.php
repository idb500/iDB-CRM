<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;
class ReplytypeController extends Controller
{
   

    public function index(Request $request)
    {
        $stages = \DB::table('bid_date_replytype')->select('bid_date_replytype.*','users.name as uname')->join("users", "users.id", "=", "bid_date_replytype.created_by")->get();   
        return view('settings.reply_type.index',compact('stages'));
    }
    public function create()
    {
       
        return view('settings.reply_type.create');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:bid_date_replytype,name',
        // ]);
        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['fafaicon']; 
        
       $created_by = $input['created_by'];       
        $data = \DB::table('bid_date_replytype')->insert(['name'=>$name,'icon'=>$fafaicon, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('reply_type.index')
                        ->with('success','Bigdata Reply type created successfully');

    }
    public function edit($id)
    {
        $user = \DB::table('bid_date_replytype')->where(['id'=>$id])->first();
        return view('settings.reply_type.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:bid_date_replytype,name',
           
        // ]);


        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['icon']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('bid_date_replytype')->where('id', $id)->update(['name'=>$name, 'icon'=>$fafaicon,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('reply_type.index')
                        ->with('success','Bigdata reply type updated successfully');
    }
    public function destroy($id)
    {
        DB::table("bid_date_replytype")->where('id',$id)->delete();
        return redirect()->route('reply_type.index')
                        ->with('success','Bigdata reply type deleted successfully');
    }


  
  
}
