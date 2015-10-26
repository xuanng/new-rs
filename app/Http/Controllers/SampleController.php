<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Controllers\Controller;
use Auth;

class SampleController extends Controller
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
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function create()
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function edit($id)
    {
        return view($this->view_dir.'.'.__FUNCTION__);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
