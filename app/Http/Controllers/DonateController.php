<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\URL;
use Session;
class DonateController extends Controller
{
    public function index(Request $request){
        $project = Project::with('Category')->with('User')->find($request->id_project);
        return view('user.donate')->with(compact('project'));
    }
    public function vnpayPayment(Request $request){

    $project=Project::find($request->id_project);
    $donation = new Donation();
    $donation->id_project = $request->id_project;
    $donation->id_user = Session::get('user')->id;
    $donation->anonymous = $request->anonymous;
    $donation->money = filter_var($request->money,FILTER_SANITIZE_NUMBER_INT);
    $donation->content_donation = $request->content_donation;
    $donation->artifacts = $request->artifacts;
    $donation->phone = $request->phone;
    $donation->address = $request->address;
    $donation->save();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/charitiableproject/public/donatesuccess";
    $vnp_TmnCode = "HDACW8SU";//Mã website tại VNPAY
    $vnp_HashSecret = "OBVDCXETVALUDXIHELFZKLWDJHWOWGOW"; //Chuỗi bí mật

    $vnp_TxnRef = $donation->id;
    $vnp_OrderInfo = $request->content_donation;
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = filter_var($request->money,FILTER_SANITIZE_NUMBER_INT) *100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    //$vnp_ExpireDate = $_POST['txtexpire'];
    if (isset($fullName) && trim($fullName) != '') {
        $name = explode(' ', $fullName);
        $vnp_Bill_FirstName = array_shift($name);
        $vnp_Bill_LastName = array_pop($name);
    }
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('status' => '200'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        return response()->json($returnData,200);
    }
    }
    public function vnpayPaymentAPI(Request $request){

        // return $request->all();
    $project=Project::find($request->id_project);
    $donation = new Donation();
    $donation->id_project = $request->id_project;
    $donation->id_user =  $request->id_user;
    $donation->anonymous = $request->anonymous;
    $donation->money = filter_var($request->money,FILTER_SANITIZE_NUMBER_INT);
    $donation->content_donation = $request->content_donation;
    $donation->artifacts = $request->artifacts;
    $donation->phone = $request->phone;
    $donation->address = $request->address;
    $donation->save();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://192.168.1.13/charitiableproject/public/api/v1/donatesuccess";
    $vnp_TmnCode = "HDACW8SU";//Mã website tại VNPAY
    $vnp_HashSecret = "OBVDCXETVALUDXIHELFZKLWDJHWOWGOW"; //Chuỗi bí mật

    $vnp_TxnRef = $donation->id;
    $vnp_OrderInfo = $request->content_donation;
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = filter_var($request->money,FILTER_SANITIZE_NUMBER_INT) *100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    //$vnp_ExpireDate = $_POST['txtexpire'];
    if (isset($fullName) && trim($fullName) != '') {
        $name = explode(' ', $fullName);
        $vnp_Bill_FirstName = array_shift($name);
        $vnp_Bill_LastName = array_pop($name);
    }
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('status' => '200'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        return response()->json($returnData,200);
    }
    }
    public function donateSuccessAPI(Request $request){
        // return $request->all();
        $id_donation = filter_var($request->vnp_TxnRef,FILTER_SANITIZE_NUMBER_INT);
        $donation = Donation::find($id_donation);
        $project = Project::find($donation->id_project);
         $url_redirect = '/project/'.$project->slug."=".$project->id;
        if($request->vnp_TransactionStatus!="02"){
            $project->donation=$project->donation+$donation->money;
            $project->save();
            $arr = [
                'status'=>200,
                'message'=>"Ủng hộ thành công",
                'data'=>null
            ];
            return response()->json($arr,200);
        }
        else{
            $donation->delete();
            $arr = [
                'status'=>200,
                'message'=>"Hủy thanh toán",
                'data'=>null
            ];
            return response()->json($arr,200);
        }
    }
    public function donateSuccess(Request $request){
        $id_donation = filter_var($request->vnp_TxnRef,FILTER_SANITIZE_NUMBER_INT);
        $donation = Donation::find($id_donation);
        $project = Project::find($donation->id_project);
         $url_redirect = '/project/'.$project->slug."=".$project->id;
        if($request->vnp_TransactionStatus!="02"){
            $project->donation=$project->donation+$donation->money;
            $project->save();
            return redirect($url_redirect)->with('status_donate','sucess');
        }
        else{
            $donation->delete();
            return redirect($url_redirect);
        }
    }
}
