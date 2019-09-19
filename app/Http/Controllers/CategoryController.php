<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;

class CategoryController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:category-list');
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $stages = \DB::table('category')->select('category.*','users.name as uname')->join("users", "users.id", "=", "category.created_by")->get();   
        return view('category.index',compact('stages'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permission = Permission::get();
        return view('category.create',compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name',
        ]);
        $input = $request->all();
        $name = $input['name']; 
       $created_by = $input['created_by'];       
        $data = \DB::table('category')->insert(['name'=>$name, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('category.index')
                        ->with('success','Category created successfully');

    }
    public function edit($id)
    {
        $user = \DB::table('category')->where(['id'=>$id])->first();
        return view('category.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name',
           
        ]);


        $input = $request->all();
        $name = $input['name']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('category')->where('id', $id)->update(['name'=>$name, 'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }
    public function destroy($id)
    {
        DB::table("category")->where('id',$id)->delete();
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
