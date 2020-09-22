<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $categories = DB::table('categories')->simplePaginate(15);
        return view('categories.index', ['categories' => $categories]);
    }

    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function create(Request $request) {
        $request->user()->authorizeRoles(['admin']);
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request) {
        $name = $request->get('name');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect('/categories')->with('success', 'Categoria registrada correctamente.');
    }

    public function edit(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, $id) {
        $name = $request->get('name');
        $category = Category::findOrFail($id);
        $category->name = $name;
        $category->save();
        return redirect('/categories')->with('success', 'Categoria actualizada correctamente.');
    }
}
