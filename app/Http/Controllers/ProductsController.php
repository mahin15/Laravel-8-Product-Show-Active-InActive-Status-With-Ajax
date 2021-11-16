<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class ProductsController extends Controller
{
   
    public function detail($id){
        $productDetails=Product::find($id)->toArray();
        return view('home.details')->with(compact('productDetails'));
    }

}
