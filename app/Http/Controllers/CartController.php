<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Controllers\Controller;
use Auth;
use RS\Catalog;
use RS\Category;
use RS\Cart;

class CartController extends Controller
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
       
      //$Cart = Cart::all()->where('user_id','==',Auth::user()->id);
        $Cart = Cart::where('user_id', Auth::user()->id)->paginate(25);
        $cart_count = Cart::where('user_id', Auth::user()->id)->count();
       
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Cart', 'cart_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        $Catalog = Catalog::find($id);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Catalog','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request->get('catalog_id');
        $c=Cart::where('catalog_id',$id)->first();
        if ($c!=null) {
          
             $c->quantity++;
             $c->save();
            
        }else{
         $Cart = Cart::create(array(
                'catalog_id' => $request->get('catalog_id'),
                'quantity' => 1,
                'user_id'=>$request->get('user_id'),
            ));
             }
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
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function edit($id)
    {
        $Cart = Cart::find($id);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Cart','id'));;
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
       $Cart = Cart::find($id);
        $Cart->catalog_id = $request->get('catalog_id',$Cart->catalog_id);
        $Cart->quantity = $request->get('quantity',$Cart->quantity);
        $Cart->save();
        return redirect()->route($this->view_dir.'.index')->with('success','Record updated.');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        //return redirect()->route($this->view_dir.'.index')->with('success','Record Deleted.');

         return "";
    }

    
}
