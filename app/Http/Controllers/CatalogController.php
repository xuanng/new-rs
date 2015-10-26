<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Requests\CatalogRequest;
use RS\Http\Controllers\Controller;
use Auth;
use RS\Catalog;
use RS\Category;

class CatalogController extends Controller
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
        $Catalogs = Catalog::paginate(25);
        // $Catalogs = Catalog::all();
        // $Catalogs = Catalog::where('category','Mobile')->get();
        // $Catalogs = Catalog::where('category','Mobile')->where('price','>=',999.90)->paginate(25);
        // $Catalogs = Catalog::where('category','Mobile')->orWhere('price','>=',999.90)->paginate(1);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Catalogs'));
    }

    public function create()
    {
        $categories = $this->getCategoriesInArrayLists();
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('categories'));
    }

    public function store(CatalogRequest $request)
    {
        $Catalog = Catalog::create(array(
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'category' => $request->get('category'),
            ));

        return redirect()->route($this->view_dir.'.index')->with('success','Record added.');
    }

    public function show($catalog_id)
    {
        $Catalog = Catalog::find($catalog_id);
        // $Catalog = Catalog::where('id',$catalog_id)->first();
        // $Catalog = Catalog::where('id',$catalog_id)->get()[0];
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Catalog'));
    }

    public function edit($catalog_id)
    {
        $categories = $this->getCategoriesInArrayLists();
        $Catalog = Catalog::find($catalog_id);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Catalog','catalog_id','categories'));
    }

    public function update(CatalogRequest $request, $catalog_id)
    {
        $Catalog = Catalog::find($catalog_id);
        $Catalog->name = $request->get('name',$Catalog->name);
        $Catalog->price = $request->get('price',$Catalog->price);
        $Catalog->category = $request->get('category',$Catalog->category);
        $Catalog->save();
        return redirect()->route($this->view_dir.'.index')->with('success','Record updated.');
    }

    public function destroy($catalog_id)
    {
        Catalog::destroy($catalog_id);
        session()->flash('success','Record Deleted.');
        return '';
    }

    private function getCategoriesInArrayLists()
    {
        return Category::lists('name','name');
    }
}
