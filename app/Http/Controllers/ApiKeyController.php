<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApiKeyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
        if(\Auth::user()->hasRole('Super Admin')){
            $c_data = \DB::table("companies")->first();
            $c_data_count = \DB::table("companies")->count();
            $is_admin = 0;
           $p_data = \DB::table("user_tnx")
           ->select("user_tnx.*", "users.name")
           ->join('users', 'users.id', '=', 'user_tnx.user_id')
           ->get();
        }else{
            $is_admin = 2;
            $c_data_count = \DB::table("companies")->where('user_id', '=', \Auth::id())->count();
            $c_data = \DB::table("companies")->where('user_id', '=', \Auth::id())->first();
            $p_data = \DB::table("user_tnx")->where('user_id', '=', \Auth::id())->get();
        }
        return view('home', compact(['c_data', 'p_data', 'c_data_count', 'is_admin']));
    }
    
    public function UpdateCompany(Request $request){
        $validator = Validator::make($request->all(), [
            "c_name"=>"required",
            "c_addess"=>"required",
            "c_country"=>"required|alpha_spaces",
            "c_state"=>"required|alpha_spaces",
            "c_city"=>"required|alpha_spaces",
            "c_pin"=>"required|numeric",
            // "c_licence"=>"required|numeric",
            "c_person"=>"required|alpha_spaces",
            "c_email"=>"required|email",
            "c_phone"=>"required|min:10|numeric",
        ],
        $messages = [
            "c_name.required"=>"Conpany name is required",
            "c_addess.required"=>"Address is required",
            "c_country.required"=>"Country is required",
            "c_country.alpha_spaces"=>"Invalid country field",
            "c_state.required"=>"Stateis required",
            "c_state.alpha_spaces"=>"Invalid state field",
            "c_city.required"=>"City is required",
            "c_city.alpha_spaces"=>"Invalid city field",
            "c_pin.required"=>"PIN Code is required",
            "c_person.required"=>"Contact person name is required",
            "c_person.alpha_spaces"=>"Invalid person field",
            "c_email.required"=>"Email is required",
            "c_email.email"=>"Not a valid email",
            "c_phone"=>"Phone is required",
            "c_phone.min"=>"Phone must contain 10 digits",
            "c_phone.max"=>"Phone must contain 100 digits",
            "c_phone.numeric"=>"Phone must contain 10 digits",            
            // "c_licence.required"=>"Number of licence required",
            // "c_licence.numeric"=>"Licence must be numeric",
        ]);
        if ($validator->passes()) {
            $count = \DB::table("companies")->where('user_id', '=', \Auth::id())->count();
            if($count == 0){
                if($request->c_gstin == ''){
                    $gstin = "NA";
                }else{
                    $gstin = $request->c_gstin;
                }
                \DB::table("companies")->insert([
                    "c_name"=>$request->c_name,
                    "c_addess"=>$request->c_addess,
                    "c_country"=>$request->c_country,
                    "c_state"=>$request->c_state,
                    "c_city"=>$request->c_city,
                    "c_pin"=>$request->c_pin,
                    "c_gstin"=>$gstin,
                    "c_person"=>$request->c_person,
                    "c_email"=>$request->c_email,
                    "c_phone"=>$request->c_phone,
                    "user_id"=>\Auth::id()
                    ]);
                return redirect()->back()->withSuccess("Details created.");
            }else{
                \DB::table("companies")->where('user_id', '=', \Auth::id())->update([
                    "c_name"=>$request->c_name,
                    "c_addess"=>$request->c_addess,
                    "c_country"=>$request->c_country,
                    "c_state"=>$request->c_state,
                    "c_city"=>$request->c_city,
                    "c_pin"=>$request->c_pin,
                    "c_gstin"=>$request->c_gstin,
                    "c_person"=>$request->c_person,
                    "c_email"=>$request->c_email,
                    "c_phone"=>$request->c_phone,
                    "user_id"=>\Auth::id()
                    ]);
                return redirect()->back()->withSuccess("Details updated.");
            }
        }else{
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }
    
    public function OfflineTnx(Request $request){
        $validator = Validator::make($request->all(), [
            "tnx_n"=>"required",
            "tnx_date"=>"required|date",
            "tnx_bank"=>"required|alpha_spaces",
            "tnx_ammount"=>"required|numeric",
            "c_licence"=>"required|numeric",
            "tnx_copy"=>"required|mimes:pdf,jpg,jpeg,png",
        ],
        $messages = [
            "tnx_n.required"=>"Transaction number is required",
            "tnx_date.required"=>"Transaction date is required",
            "tnx_date.date"=>"Check transaction date, YYYY-MM-DD",
            "tnx_bank.required"=>"Bank name is required",
            "tnx_bank.alpha_spaces"=>"Only charactor and white space allowed.",
            "tnx_ammount.required"=>"Amount is required.",
            "tnx_ammount.numeric"=>"Amount should be numeric.",
            "tnx_copy.required"=>"Attchement is required.",
            "tnx_copy.mimes"=>"Only pdf, jpg, jpeg and png allowed.",
            "c_licence.required"=>"How many licence have you purchased ?",
            "c_licence.numeric"=>"Licence number must be numberic"
        ]);
        if ($validator->passes()) {
            $count = \DB::table("user_tnx")->where('user_id', '=', \Auth::id())->where('tnx_exp', '>', date("Y-m-d"))->count();
            // if($count == 0){
                if ($request->hasFile('tnx_copy')) {
                    $files = $request->file("tnx_copy");
                    $extension=$files->getClientOriginalExtension();
                    $id_proof_filename =uniqid().'.'.$extension;
                    $files->move(public_path().'/uploads/tnx_copy/', $id_proof_filename);
                }
                \DB::table("user_tnx")->insert([
                    "tnx_n"=>$request->tnx_n,
                    "tnx_date"=>$request->tnx_date,
                    "tnx_bank"=>$request->tnx_bank,
                    "tnx_ammount"=>$request->tnx_ammount,
                    "tnx_copy"=>$id_proof_filename,
                    "tnx_status"=>2,
                    "c_licence"=>$request->c_licence,
                    "tnx_exp"=>date('Y-m-d', strtotime('+1 years')),
                    "user_id"=>\Auth::id()
                    ]);
                return redirect()->back()->withSuccess("Details created.");
            // }else{
            //     return redirect()->back()->withErrors("Payment Already Done.");
            // }
        }else{
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }
    
    public function DownloadApp(Request $request){
        $count = \DB::table("user_tnx")->where('user_id', '=', \Auth::id())->where('tnx_exp', '>', date("Y-m-d"))->where('tnx_status', '=', 1)->count();
        if($count >= 1){
            $file = '5d70c92a7ff1b.jpg';
            $filepath = "uploads/tnx_copy/" . $file;
            // Process download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }else{
            return redirect()->back()->withErrors('You are not allowed to access this url');
        }
    }
    
    public function ApproveTnx(Request $request){
        if($request->c_id != '' AND $request->c_licence != ''){
            if($request->approve == 'approve'){
                $count = \DB::table("user_tnx")->where('id', '=', $request->c_id)->where('tnx_status', '=', 2)->count();
                if($count >=1){
                    $countData = \DB::table("user_tnx")->where('id', '=', $request->c_id)->where('tnx_status', '=', 2)->first();
                    \DB::table("user_tnx")->where('id', '=', $request->c_id)->where('tnx_status', '=', 2)->update(['tnx_status'=>1, 'c_licence'=>$request->c_licence, "approved_by"=>\Auth::id()]);
                    $i = 1;
                    while($i <= $request->c_licence){
                        $hashApi = Hash::make(uniqid());
                        $hashApi = str_replace('/', '', $hashApi);
                        $hashApi = str_replace('.', '', $hashApi);
                        \DB::table("c_apikeys")->insert(['apikey'=>$hashApi, "user_id"=>$countData->user_id, 'tnx_id'=>$request->c_id, "created_at"=>date('Y-m-d H:i:s'), "status"=>1]);
                        $i++;
                    }
                    return redirect()->back()->withSuccess("Approved.");
                }else{
                    return redirect()->back()->withErrors('Oops something went wrong.');
                }
            }else{
                \DB::table("user_tnx")->where('id', '=', $request->c_id)->where('tnx_status', '=', 2)->update(['tnx_status'=>0, "approved_by"=>\Auth::id()]);
                return redirect()->back()->withSuccess("Rejected.");
            }
        }else{
            return redirect()->back()->withErrors('Oops something went wrong.');
        }
    }
    
    public function ApiKeys(Request $request){
        $apidata = \DB::table('c_apikeys')->where('user_id', '=', \Auth::id())->where('status', '=', 1)->get();
        return view('apikeys.index', compact(['apidata']));
    }
    
    public function ApiRegenerate(Request $request){
        if($request->api_id !=''){
            $apidataCount = \DB::table('c_apikeys')->where('user_id', '=', \Auth::id())->where('id', '=', $request->api_id)->count();
            if($apidataCount >= 1){
                $hashApi = Hash::make(uniqid());
                $hashApi = str_replace('/', '', $hashApi);
                $hashApi = str_replace('.', '', $hashApi);
                $apidataData = \DB::table('c_apikeys')->where('user_id', '=', \Auth::id())->where('id', '=', $request->api_id)->first();
                \DB::table('archive_apikeys')->insert(["old_apikey"=>$apidataData->apikey, "new_apikey"=>$hashApi, 'user_id'=>\Auth::id(), 'created_at'=>date('Y-m-d H:i:s')]);
                \DB::table('c_apikeys')->where('user_id', '=', \Auth::id())->where('id', '=', $request->api_id)->update(["apikey"=>$hashApi]);
                return redirect()->back()->withSuccess("API generated.");
            }else{
                return redirect()->back()->withErrors('Oops something went wrong.');
            }
        }else{
            return redirect()->back()->withErrors('Oops something went wrong.');
        }
    }
}
