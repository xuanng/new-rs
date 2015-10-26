<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Controllers\Controller;
use Response, Auth;
use RS\Catalog;
use RS\Category;
use RS\Cart;
use RS\TransactionHead;
use RS\TransactionDetail;

class APIController extends Controller
{
public function index()
{
    return view('api.tester');
}

public function login(Request $Request)
{
    $AppData = $this->getAppDataInArray(__FUNCTION__);
    $Data = array();
    if(!\Request::has('data'))
     {
        $Data = array('status' => 'data error');
    }else{
        $inputs = json_decode($Request->get('data'),true);
        if (Auth::once(['name' => $inputs['name'], 'password' => $inputs['password']])) {
            $Carts = Cart::where('user_id','=',Auth::user()->id)->paginate(25);
            $item=0;
            foreach ($Carts as $cart) {
                $item++;
                //$Data+=array('item'.$item.'_name'=>$cart->Catalog->name);
            }
            if ($item==0) {
                $item='no item in cart';
            }
             $Data += array('Cart item' =>$item);
            $Data += array('status' => 'success','user_id' => Auth::id());
            $Data += array('item' =>$item);
                

        } else {
            $Data = array('status' => 'invalid login');
        }
    }

        return $this->generateReturnJSONString(array_merge(compact('AppData'),compact('Data')));
    }

public function cart(Request $Request)
{
    $AppData = $this->getAppDataInArray(__FUNCTION__);
    $Data = array();
    if(!\Request::has('data'))
    {
            $Data = array('status' => 'data error');
    }else{
        $Carts = Cart::where('user_id','=',Auth::user()->id)->paginate(25);
        $item=0;
    foreach ($Carts as $cart) {
        $item++;
        $Data+=array('item'.$item.'_name'=>$cart->Catalog->name,'item'.$item.'_price'=>$cart->Catalog->price);
    }
    if ($item==0) {
        $item='no item in cart';
    }
    }
    return $this->generateReturnJSONString(array_merge(compact('AppData'),compact('Data')));
}
public function catalog(Request $Request)
{
    $AppData = $this->getAppDataInArray(__FUNCTION__);
    $Data = array();
    if(!\Request::has('data'))
    {
        $Data = array('status' => 'data error');
    }else{
        $Catalogs =Catalog::all();
        $item=0;
        foreach ($Catalogs as $catalog) {
            $item++;
            $Data+=array('item'.$item.'_name'=>$catalog->name,'item'.$item.'_price'=>$catalog->price);
        }
    }
    return $this->generateReturnJSONString(array_merge(compact('AppData'),compact('Data')));
    }
public function transaction(Request $Request)
{
    $AppData = $this->getAppDataInArray(__FUNCTION__);
    $Data = array();
    if(!\Request::has('data'))
    {
        $Data = array('status' => 'data error');
    }else{
        $TransactionHead =TransactionHead::where('user_id',Auth::user()->id)->paginate(25);
        $item=0;
        foreach ($TransactionHead as $transactionhead) {
            $item++;
            $Data += array($item.'.order_no'=>$transactionhead->order_num,);
            
        }
    }
    return $this->generateReturnJSONString(array_merge(compact('AppData'),compact('Data')));
}



protected function getAppDataInArray($api_key,$last_updated_at = null)
{

    return array(
            "module"            => $api_key,
            "settingIndex"      => date('Y-m-d H:i:s'),
            "portal_url"        => "http:\/\/sdp-cms.herokuapp.com",
            "download_url"      => "http:\/\/sdp-cms.herokuapp.com",
            "web_url"           => "http:\/\/sdp-cms.herokuapp.com",
            "totalRecords"      => 0,
            "last_updated_at"   => is_null($last_updated_at)? date('Y-m-d H:i:s'):$last_updated_at,
    );    
}

protected function generateReturnJSONString($data)
{
    return Response::make(json_encode($data, JSON_PRETTY_PRINT))->header('Content-Type', "application/json");
}



}
