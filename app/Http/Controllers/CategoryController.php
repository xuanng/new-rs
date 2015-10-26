<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Requests\CategoryRequest;
use RS\Http\Controllers\Controller;
use Auth;
use RS\Category;

class CategoryController extends Controller
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
        $Categories = Category::paginate(25);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Categories'));
    }

    public function create()
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function store(CategoryRequest $request)
    {
        $Category = Category::create(array(
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ));

        return redirect()->route($this->view_dir.'.index')->with('success','Record added.');
    }

    public function show($id)
    {
        $Category = Category::find($id);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Category'));
    }

    public function edit($id)
    {
        $Category = Category::find($id);
        return view($this->view_dir.'.'.__FUNCTION__)->with(compact('Category','id'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $Category = Category::find($id);
        $Category->name = $request->get('name',$Category->name);
        $Category->description = $request->get('description',$Category->description);
        $Category->save();
        return redirect()->route($this->view_dir.'.index')->with('success','Record updated.');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        session()->flash('success','Record Deleted.');
        return '';
    }
}
