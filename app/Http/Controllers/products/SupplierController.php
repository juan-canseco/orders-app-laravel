<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create(Request $request) {
        $request->user()->authorizeRoles(['admin']);
        return view('suppliers.create');
    }

    public function store(CreateSupplierRequest $request) {
        $provider = new Provider();
        $provider->names = $request->names;
        $provider->surnames = $request->surnames;
        $provider->company = $request->company;
        $provider->cell_phone = $request->phone;
        $provider->save();
        return redirect('/suppliers')->with('success', 'Proveedor registrado correctamente.');
    }


    public function details(Request $request, $id) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $supplier = Provider::findOrFail($id);
        return view('suppliers.details', ['supplier' => $supplier]);
    }

    public function index(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $suppliers = DB::table('providers')->simplePaginate(15);
        return view('suppliers.index', [
            'suppliers' => $suppliers
        ]);
    }

    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return redirect('/suppliers')->with('success', 'Proveedor eliminado correctamente.');
    }


    public function edit(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $supplier = Provider::findOrfail($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(UpdateSupplierRequest $request, $id) {
        $supplier = Provider::findOrFail($id);
        $supplier->names = $request->names;
        $supplier->surnames = $request->surnames;
        $supplier->company = $request->company;
        $supplier->cell_phone= $request->phone;
        $supplier->save();
        return redirect('/suppliers')->with('success', 'Proveedor actualizado correctamente.');
    }
}
