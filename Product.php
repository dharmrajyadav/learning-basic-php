<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
ini_set('memory_limit', -1);
class Product extends Controller
{
    

        public function getView()
        {

            $this->load->view('product-list');
        }

    public function productInsert(REQUEST $request)
    { 
        print_r($request->input('productname'));
        exit;


    }


}
