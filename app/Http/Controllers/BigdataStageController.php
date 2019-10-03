<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;
class BigdataStageController extends Controller
{
   

    public function index(Request $request)
    {
        $stages = \DB::table('bigdata_stage')->select('bigdata_stage.*','users.name as uname')->join("users", "users.id", "=", "bigdata_stage.created_by")->get();   
        
        return view('settings.bigdatastage.index',compact('stages'));
    }
    public function create()
    {
       
        return view('settings.bigdatastage.create');
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
        $data = \DB::table('bigdata_stage')->insert(['name'=>$name,'icon'=>$fafaicon, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('bigdatastage.index')
                        ->with('success','Stage created successfully');

    }
    public function edit($id)
    {
        $user = \DB::table('bigdata_stage')->where(['id'=>$id])->first();
        return view('settings.bigdatastage.edit',compact('user'));
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
       $data = \DB::table('bigdata_stage')->where('id', $id)->update(['name'=>$name, 'icon'=>$fafaicon,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('bigdatastage.index')
                        ->with('success','Stage updated successfully');
    }
    public function destroy($id)
    {
        DB::table("bigdata_stage")->where('id',$id)->delete();
        return redirect()->route('bigdatastage.index')
                        ->with('success','Stage deleted successfully');
    }


  
  
}
