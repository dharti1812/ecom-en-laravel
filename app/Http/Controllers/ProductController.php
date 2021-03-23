<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    public function details($id)
    {
       
        $data =  Product::find($id);
        return view('detail',['product'=>$data]);
    }

    public function search(Request $req)
    {

        $data = Product::where('name','like', '%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);

    }

    public function addtocart(Request $req)
    {
      if($req->session()->has('user'))
      {
         $cart = new Cart;
         $cart->user_id = $req->session()->get('user')['id'];
         $cart->product_id = $req->product_id;
         $cart->save();

         return redirect('/');
      }
      else{
          return redirect('/login');
      }
    }


    static function cartitem()
    {
       $userId = Session::get('user')['id'];
       return Cart::where('user_id', $userId)->count();
    }

    public function cartlist()
    {
        $userId = Session::get('user')['id'];
        $data = DB::table('cart')
        ->join('products','cart.product_id', 'products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*')
        ->get();

        return view('cartlist' , ['products'=>$data]);
    }
}
