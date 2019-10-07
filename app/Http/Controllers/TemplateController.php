<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;

class TemplateController extends Controller
{
    //
   
    public function template()
    {
        return view('template/template');
    }

    public function smsindex(Request $request)
    {
        $sms_template = \DB::table('sms_template')->select('sms_template.*','users.name as uname')->join("users", "users.id", "=", "sms_template.created_by")->get();   
        return view('template.sms.index',compact('sms_template'));
    }
    public function smscreate()
    {
        return view('template.sms.create');
    }
    public function smsstore(Request $request)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];       
        $data = \DB::table('sms_template')->insert(['name'=>$name,'description'=>$description ,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function smsedit($id)
    {
        $sms_template = \DB::table('sms_template')->where(['id'=>$id])->first();
        return view('template.sms.edit',compact('sms_template'));
    }
    public function smsupdate(Request $request, $id)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('sms_template')->where('id', $id)->update(['name'=>$name, 'description'=>$description ,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
       return Redirect::back();
    }
    public function smsdestroy($id)
    {
        DB::table("sms_template")->where('id',$id)->delete();
        return Redirect::back();
    }
    public function smsshow($id)
    {
        $sms_template = \DB::table('sms_template')->where(['id'=>$id])->first();
        return view('template.sms.show',compact('sms_template'));
    }

    public function emailindex(Request $request)
    {
        $email_template = \DB::table('email_template')->select('email_template.*','users.name as uname')->join("users", "users.id", "=", "email_template.created_by")->get();   
        return view('template.email.index',compact('email_template'));
    }
    public function emailcreate()
    {
        return view('template.email.create');
    }
    public function emailstore(Request $request)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];       
        $data = \DB::table('email_template')->insert(['name'=>$name,'description'=>$description ,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function emailedit($id)
    {
        $email_template = \DB::table('email_template')->where(['id'=>$id])->first();
        return view('template.email.edit',compact('email_template'));
    }
    public function emailupdate(Request $request, $id)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('email_template')->where('id', $id)->update(['name'=>$name, 'description'=>$description ,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
       return Redirect::back();
    }
    public function emaildestroy($id)
    {
        DB::table("email_template")->where('id',$id)->delete();
        return Redirect::back();
    }
    public function emailshow($id)
    {
        $email_template = \DB::table('email_template')->where(['id'=>$id])->first();
        return view('template.email.show',compact('email_template'));
    }

    public function whatsappindex(Request $request)
    {
        $whatsapp_template = \DB::table('whatsapp_template')->select('whatsapp_template.*','users.name as uname')->join("users", "users.id", "=", "whatsapp_template.created_by")->get();   
        return view('template.whatsapp.index',compact('whatsapp_template'));
    }
    public function whatsappcreate()
    {
        return view('template.whatsapp.create');
    }
    public function whatsappstore(Request $request)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];       
        $data = \DB::table('whatsapp_template')->insert(['name'=>$name,'description'=>$description ,'created_by'=>$created_by,'created_at'=>date('Y-m-d H:i:s') ,'updated_at'=>date('Y-m-d H:i:s')]);
        return Redirect::back();
    }
    public function whatsappedit($id)
    {
        $whatsapp_template = \DB::table('whatsapp_template')->where(['id'=>$id])->first();
        return view('template.whatsapp.edit',compact('whatsapp_template'));
    }
    public function whatsappupdate(Request $request, $id)
    {
        $input = $request->all();
        $name = $input['name']; 
        $description = $input['description']; 
       $created_by = $input['created_by'];  
       $data = \DB::table('whatsapp_template')->where('id', $id)->update(['name'=>$name, 'description'=>$description ,'created_by'=>$created_by,'updated_at'=>date('Y-m-d H:i:s')]);
       return Redirect::back();
    }
    public function whatsappdestroy($id)
    {
        DB::table("whatsapp_template")->where('id',$id)->delete();
        return Redirect::back();
    }
    public function whatsappshow($id)
    {
        $whatsapp_template = \DB::table('whatsapp_template')->where(['id'=>$id])->first();
        return view('template.whatsapp.show',compact('whatsapp_template'));
    }
}
