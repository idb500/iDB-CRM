<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;
class Note_typeController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:Notetype-list');
         $this->middleware('permission:Notetype-create', ['only' => ['create','store']]);
         $this->middleware('permission:Notetype-update', ['only' => ['edit','update']]);
         $this->middleware('permission:Notetype-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $stages = \DB::table('note_type')->select('note_type.*','users.name as uname')->join("users", "users.id", "=", "note_type.created_by")->get();   
        return view('note_type.index',compact('stages'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permission = Permission::get();
        return view('note_type.create',compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name',
        ]);
        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['fafaicon']; 
        
       $created_by = $input['created_by'];       
        $data = \DB::table('note_type')->insert(['name'=>$name,'icon'=>$fafaicon, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('note_type.index')
                        ->with('success','Category created successfully');

    }
    public function edit($id)
    {
        $user = \DB::table('note_type')->where(['id'=>$id])->first();
        return view('note_type.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name',
           
        ]);


        $input = $request->all();
        $name = $input['name']; 
        $fafaicon = $input['icon']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('note_type')->where('id', $id)->update(['name'=>$name, 'icon'=>$fafaicon,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('note_type.index')
                        ->with('success','Category updated successfully');
    }
    public function destroy($id)
    {
        DB::table("note_type")->where('id',$id)->delete();
        return redirect()->route('note_type.index')
                        ->with('success','Category deleted successfully');
    }


  
  
}
