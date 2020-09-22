<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $customers = DB::table('customers')->simplePaginate(15);
        return view('customers.index', ['customers' => $customers]);
    }

    public function create(Request $request) {
        $request->user()->authorizeRoles(['admin']);
        return view('customers.create');
    }


    public function store(CreateCustomerRequest $request) {
        $customer = new Customer();
        $customer->names = $request->names;
        $customer->surnames = $request->surnames;
        $customer->rfc = $request->rfc;
        $customer->save();
        return redirect('/customers')->with('success', 'Cliente registrado correctamente.');
    }


    public function edit(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $customer = Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(UpdateCustomerRequest $request, $id) {
        $customer = Customer::findOrFail($id);
        $customer->names = $request->names;
        $customer->surnames = $request->surnames;
        $customer->rfc = $request->rfc;
        $customer->save();
        return redirect('/orders')->with('success', 'Cliente editado correctamente.');
    }


    public function details(Request $request, $id) {
        $request->user()->authorizeRoles(['admin', 'user']);
        $customer = Customer::findOrFail($id);
        return view('customers.details', ['customer' => $customer]);
    }


    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Cliente eliminado correctamente!');
    }
}
