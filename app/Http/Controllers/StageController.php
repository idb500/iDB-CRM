<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;

class StageController extends Controller
{
   
    function __construct()
    {
         $this->middleware('permission:stage-list');
         $this->middleware('permission:stage-create', ['only' => ['create','store']]);
         $this->middleware('permission:stage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stage-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       
        $stages = \DB::table('stages')->select('stages.*','users.name as uname','category.name as cname')->join("users", "users.id", "=", "stages.created_by")->join("category", "category.id", "=", "stages.category")->get();   
        
        return view('stage.index',compact('stages'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $category = \DB::table('category')->get();   
       
        return view('stage.create',compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryname' => 'required',
            'stagename' => 'required',
            'validity' => 'required',
        ]);

        $input = $request->all();
        $categoryname = $input['categoryname']; 
        $stagename = $input['stagename']; 
        $validity = $input['validity']; 
       $created_by = $input['created_by'];       
        $data = \DB::table('stages')->insert(['category'=>$categoryname,'name'=>$stagename,'validity'=>$validity, 'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('stage.index')
                        ->with('success','stage created successfully');
    }

   
    public function edit($id)
    {
        $category = \DB::table('category')->get();  
        $user = \DB::table('stages')->where(['id'=>$id])->first();
        return view('stage.edit',compact('user','category'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'validity' => 'required',
        ]);

        $input = $request->all();
        $categoryname = $input['category']; 
        $stagename = $input['name']; 
        $validity = $input['validity']; 
       $created_by = $input['created_by']; 
       $data = \DB::table('stages')->where('id', $id)->update(['category'=>$categoryname,'name'=>$stagename,'validity'=>$validity, 'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
     
        return redirect()->route('stage.index')
                        ->with('success','Stage updated successfully');
    }
    public function destroy($id)
    {
        DB::table("stages")->where('id',$id)->delete();
        return redirect()->route('stage.index')
                        ->with('success','Stage deleted successfully');
    }
}
