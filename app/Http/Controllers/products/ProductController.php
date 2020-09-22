<?php

namespace App\Http\Controllers\products;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Provider;
use App\Product;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $products = DB::table('products')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name AS categoryName')
        ->simplePaginate(15);
        return view('products.index', ['products' => $products]);
    }

    public function create(Request $request) {
        $request->user()->authorizeRoles(['admin']);
        $suppliers = Provider::all();
        $categories = Category::all();
        return view('products.create', ['suppliers' => $suppliers, 'categories' => $categories]);
    }

    public function store(CreateProductRequest $request) {
        $product = new Product();
        $product->category_id = $request->category;
        $product->provider_id = $request->supplier;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect('/products')->with('success', 'Producto registrado correctamente.');
    }

    public function details(Request $request, $id) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $product = Product::findOrFail($id);
        $category = Category::findOrFail($product->category_id);
        $supplier = Provider::findOrFail($product->provider_id);
        return view('products.details', ['product' => $product, 'category' => $category, 'supplier' => $supplier]);
    }

    public function edit (Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $product = Product::findOrFail($id);
        $suppliers = Provider::all();
        $categories = Category::all();
        return view('products.edit', ['suppliers' => $suppliers, 'categories' => $categories , 'product' => $product]);
    }

    public function update(UpdateProductRequest $request, $id) {
        $product = Product::findOrFail($id);
        $product->category_id = $request->category;
        $product->provider_id = $request->supplier;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect('/products')->with('success', 'Producto actualizado correctamente.');
    }

    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success', 'Producto eliminado correctamente.');
    }

    
}
