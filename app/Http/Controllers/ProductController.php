<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist' , ['products'=>$data]);
    }

    public function removecart($id)
    {
      Cart::destroy($id);
      return redirect('cartlist');
    }


    public function ordernow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products','cart.product_id', 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');

        return view('ordernow' , ['total'=>$total]);
    }
    public function orderplace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allcart = Cart::where('user_id', $userId)->get();
       foreach($allcart as $cart){

        $order = new Order;
        $order->product_id = $cart['product_id'];
        $order->user_id = $cart['user_id'];
        $order->status = 'Pending';
        $order->payment_method = $req->payment;
        $order->payment_status = 'Pending';
        $order->address = $req->address;
        $order->save();
        Cart::where('user_id', $userId)->delete();
       }
       return redirect('/');
    }

    public function myorders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders' , ['orders'=>$orders]);
    }
}
