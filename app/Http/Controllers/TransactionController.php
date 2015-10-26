<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Controllers\Controller;
use Auth;
use RS\Catalog;
use RS\Category;
use RS\Cart;
use RS\TransactionHead;
use RS\TransactionDetail;

class TransactionController extends Controller
{
     protected $view_dir = '';

    function __construct() {
        $this->view_dir = strtolower(
                            snake_case(
                                str_replace('Controller','',
                                    class_basename(__CLASS__))
                                )
                            );
    }
    public function index()
    {

        $TransactionHeads = TransactionHead::where('user_id','=',Auth::user()->id)->paginate(25);
       $Count = TransactionHead::where('user_id', Auth::user()->id)->count();
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('TransactionHeads','Count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Carts = Cart::where('user_id','=',Auth::user()->id)->paginate(25);
       
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $TransactionHeads =TransactionHead::create(array(
            'item_num'=>$request->get('item_num'),
            'grand_total'=>$request->get('grand_total'),
            'user_id'=>$request->get('user_id'),
            'order_num'=>$request->get('order_num'),
            ));

        $Carts = Cart::where('user_id','=',Auth::user()->id)->paginate(25);
        $num=0;
        foreach ($Carts as $cart ) {
           
          $TransactionDetails =TransactionDetail::create(array(
            'catalog_id'=>$request->get('catalog_id'.$num),
            'quantity'=>$request->get('quantity'.$num),
            'price'=>$request->get('price'.$num),
            'total_price'=>$request->get('total_price'.$num),
            'transaction_head_id'=>$TransactionHeads->id
            ));
          $num++;
        }
        $Carts = Cart::where('user_id','=',Auth::user()->id)->delete();

        $Catalogs = Catalog::paginate(25);
        return view('catalog.index')->with(compact('Catalogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TransactionDetails=TransactionDetail::where('transaction_head_id','=',$id)->paginate(25);
        return  view($this->view_dir.'.'.__FUNCTION__)->with(compact('TransactionDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return view($this->view_dir.'.'.__FUNCTION__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }
}
