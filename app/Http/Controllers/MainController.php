<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Can;

class MainController extends Controller
{
    //
    public function index()
    {
         $allProducts=Product::all();
         $newArrival= Product::where('type','new-arrivals')->get();
         $bestsell = Product::where('type','sale')->get();

        return view('index', compact('allProducts','newArrival','bestsell'));
    }


    public function cart()
    {
        $cartItems = DB::table('products')
            ->join('carts', 'carts.productId', '=', 'products.id')
            ->select('products.title','products.quantity as pQuantity', 'products.picture', 'products.price', 'carts.*')
            ->where('carts.customerId', session()->get('id'))
            ->get();

        return view('cart', compact('cartItems'));
    }
    public function singleProduct($id)
    {
        $product=Product::find($id);
        return view('singleProduct',compact('product'));
    }
    public function deleteCartItem($id)
    {
        $item=Cart::find($id);
        $item->delete();
        return redirect()->back()->with('success','1 Item has been deleted from cart');
    }
    public function shop()
    {
        return view('shop');
    }
    public function profile()
    {   if(session()->has('id'))
        {
        $user=User::find(session()->get('id'));
        return view('profile',compact('user'));
        }
        return view('login');
    }
    public function myOrders()
    {   if(session()->has('id'))
        {
        $orders=Order::where('customerId',session()->get('id'))->get();
        $items=DB::table('products',)->
        join('order_items','order_items.productId','products.Id')
        ->select('products.title','products.picture','order_items.*')->get();
        return view('orders',compact('orders','items'));
        }
        return redirect('login');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
                session()->forget('id');
                session()->forget('type');
                return redirect('/login');
     }
    public function loginUser(Request $data)
    {
        $user=User::where('email',$data->input('email'))->where('password',$data->input('password'))->first();
        if($user)
        {
                session()->put('id',$user->id);
                session()->put('type',$user->type);
                if($user->type=='Customer')
                {
                    return redirect('/');
                }

        else if($user->type=='Admin')
        {
           return redirect('/admin');
        }
        else
        {
            return redirect('login')->with('error', 'failed');
        }
    }
    }
    public function registerUser(Request $data)
{
    $newUser = new User();
    $newUser->fullname = $data->input('fullname');
    $newUser->email = $data->input('email');
    $newUser->password = $data->input('password');
    $newUser->picture=$data->file('file')->getClientOriginalName();
    $data->file('file')->move('uploads/profiles/',$newUser->picture);
    $newUser->type = "Customer";
    if ($newUser->save()) {
        return redirect('login')->with('success', 'Congratulations! Registration successful.');
    }

    // Handle registration failure (optional)
    return redirect()->back()->with('error', 'Registration failed. Please try again.');
}
public function updateUser(Request $data)
{
    $user = User::find(session()->get('id'));
    $user->fullname = $data->input('fullname');
    $user->password = $data->input('password');
    if($data->file('file')!=null)
    {
    $user->picture=$data->file('file')->getClientOriginalName();
    $data->file('file')->move('uploads/profiles/',$user->picture);
    }
    if ($user->save()) {
        return redirect()->back()->with('success', 'Congratulations!Your account has been updated');
    }

    // Handle registration failure (optional)
    return redirect()->back()->with('error', 'Registration failed. Please try again.');
}

public function addToCart(Request $data)
{
   if(session()->has('id'))
   {
    $item=new Cart();
    $item->quantity=$data->input('quantity');
    $item->productId=$data->input('id');
    $item->customerId=session()->get('id');
    $item->save();
    return redirect()->back()->with('success', 'Congratulations! item added into cart.');

   }
   else{
    return redirect('login')->with('error', 'info! pleae log into system.');
   }
}

public function updateCart(Request $data)
{
   if(session()->has('id'))
   {
    $item=Cart::find($data->input('id'));
    $item->quantity=$data->input('quantity');
    $item->save();
    return redirect()->back()->with('success', 'Items Updated');

   }
   else{
    return redirect('login')->with('error', 'info! pleae log into system.');
   }
}
public function checkout(Request $data)
{
   if(session()->has('id'))
   {
    $order= new Order();

    $order->status="Pending";
    $order->customerId=session()->get('id');
    $order->bill=$data->input('bill');
    $order->address=$data->input('address');
    $order->fullname=$data->input('fullname');
    $order->phone=$data->input('phone');
    if($order->save())
    {
        $carts= Cart::where('customerId',session()->get('id'))->get();
        foreach($carts as $item)
        {
            $product=Product::find($item->productId);
            $orderItem = New OrderItem();
            $orderItem->productId = $item->productId;
            $orderItem->quantity=$item->quantity;
            $orderItem->productId=$item->productId;
            $orderItem->price=$product->price;
            $orderItem->orderId=$order->id;
            $orderItem->save();
            $item->delete();

        }
    }
    return redirect()->back()->with('success', 'Your order has been placed succesfully');

   }
   else{
    return redirect('login')->with('error', 'info! pleae log into system.');
   }
}

}
