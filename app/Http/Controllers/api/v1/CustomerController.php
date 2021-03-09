<?php

namespace App\Http\Controllers\api\v1;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validation($request);
        Customer::create($request->all());
       
    }

    public function show(Request $request, $id_customer)
    {
        return Customer::find($id_customer);
       
    }

    public function edit($customer)
    {
        //
    }

    public function update(Request $request, Customer $id_customer)
    {
        $id_customer->update($request->all());
    }

    public function destroy(Customer $id_customer)
    {
        $id_customer->delete();
    }

    public function validation(Request $request){
        return $this->validate($request,[
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_password' => 'required'
         ]);
    }
}
