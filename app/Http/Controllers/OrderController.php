<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;

class OrderController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    //
    public function index(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $orders = DB::table('orders')
        ->join('customers', 'customer_id' , '=', 'customers.id')
        ->select('orders.*', 'customers.names as names', 'customers.surnames as surnames')
        ->simplePaginate(15);
        return view('orders.index', ['orders' => $orders]);
    }

    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect("/orders")->with('success', 'Pedido Eliminado Correctamente');
    }

    public function create(Request $request) {

        $request->user()->authorizeRoles(['admin', 'user']);

        $products = Product::all();
        $customers = Customer::all();

        $cart = $this->getCart();
        $quantity = $this->computeQuantity($cart);
        $total = $this->computeTotal($cart);

        return view('orders.create',
        [
            'products' => $products,
            'customers' => $customers,
            'cart' => $cart,
            'total' => $total,
            'quantity' => $quantity
        ]);
    }

    private function getOrderItems($cart) {
        $orderItems = [];
        foreach ($cart as $cartItem) {
            $orderItem = new OrderDetails();
            $orderItem->product_id = $cartItem['id'];
            $orderItem->product_name = $cartItem['name'];
            $orderItem->product_price = $cartItem['price'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItems[]=$orderItem;
        }
        return $orderItems;        
    }

    // TODO : Refactor shopping cart method into a class

    public function store(Request $request) {

        $request->user()->authorizeRoles(['admin', 'user']);

        $cart = $this->getCart();
        $total = $this->computeTotal($cart);
        $quantity = $this->computeQuantity($cart);
        $orderItems = $this->getOrderItems($cart);

        if (!$cart) {
            return back()->with('error', 'El carrito esta vacio');
        }

        $valid_data = $request->validate(['customerId' => 'integer'],['customerId.integer' => 'Selecciona a un cliente']);
        // Save Order
        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->customer_id = $valid_data['customerId'];
        $order->total = $total;
        $order->quantity = $quantity;
        $order->save();
        $order->orderDetails()->saveMany($orderItems);
        $request->session()->forget('products');
        return redirect('/orders')->with('success', 'Pedido creado correctamente!');
    }


    public function computeQuantity($cart) {
        $total = 0;
        foreach ($cart as $cartItem) {
            $total += $cartItem['quantity'];
        }
        return $total;
    }

    public function computeTotal($cart) {
        $total = 0;
        foreach ($cart as $cartItem) {
            $total += $cartItem['total'];
        }
        return $total;
    }

    private function getCart() {
        $cart = session('products');
        if (!$cart) {
            $cart = [];
        }
        return $cart;
    }

    private function saveChanges($cart) {
        session(['products' => $cart]);
    }
    private function addItemToCart($productId, $quantity) {
        $cart = $this->getCart();
        $product = Product::find($productId);
        $cartItem = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'total' => $product->price * $quantity
        ];
        $cart[] = $cartItem;
        $this->saveChanges($cart);
    }

    public function addItemToOrder(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $this->addItemToCart($request->productId, $request->quantity);
        return response()->json(['isOk' => true]);
    }


    public function getCartProducts(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $cart = $this->getCart();
        $total = $this->computeTotal($cart);
        $quantity = $this->computeQuantity($cart);
        $response = [
            'products' => $cart,
            'total' => $total,
            'quantity' => $quantity
        ];
        return response()->json($response);
    }

    public function removeItemFromOrder(Request $request, $productId) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $cart = $this->getCart();
        $key = array_search($productId, array_column($cart, 'id'));

        if ($key !== FALSE || $key == false) {
            unset($cart[$key]);
            $cart = array_values($cart);
        }
        $this->saveChanges($cart);
        return response()->json(['isOk' => true]);
    }

    public function changeProductQuantity(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $productId = $request->productId;
        $quantity = $request->quantity;
        $cart = $this->getCart();
        $key = array_search($productId, array_column($cart, 'id'));
        $cart[$key]['quantity'] = $quantity;
        $cart[$key]['total'] = $quantity * $cart[$key]['price'];
        $this->saveChanges($cart);
        return response()->json(['isOk' => true]);
    }

    public function cancelOrder(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $request->session()->forget('products');
        return redirect("/orders/create")->with('success', 'Pedido Cancelado');
    }


}
