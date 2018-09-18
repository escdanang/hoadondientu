<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
    public function index()
    {
    	$customers= Customers::all();
    	return view('customers.customers')->with(['customers'=>$customers]);
    }
    public function add()
    {
    	return view('customers.addcustomer');
    }
    public function save(Request $request)
    {
    	 $this->validate($request,
            [
                'taxnumber' =>'required|unique:customers_table,tax_number',
                'nameofunit' =>'required',
                'customername' =>'required',
                'email' =>'required',
                'address' =>'required',
              
            ],
            [
                'taxnumber.unique' => trans('customers.namealreadyexists'),
                'taxnumber.required' =>trans('customers.pleaseentertax'),
                'nameofunit.required' =>trans('customers.pleaseentername'),
                'customername.required' =>trans('customers.pleaseentercustomername'),
                'email.required' =>trans('customers.pleaseenteremail'),
                'address.required' =>trans('customers.pleaseenteraddress'),
           
                //'descreption.required' =>trans('products.pleaseenterN'),
            ]);
       $customers = new Customers();

            $customers->tax_number = $request->taxnumber;
            $customers->name_of_unit = $request->nameofunit;
            $customers->customer_name = $request->customername;
            $customers->email = $request->email;
            $customers->address = $request->address;
            $customers->phone_number = $request->phone_number;
            $customers->fax_number = $request->faxnumber;

        $customers->save();
        return redirect('admin/customers/list')->with('information',trans('customers.addsuccess'));
    }
      public function edit($id)
    {
    	$customers = Customers::find($id);
        return view('customers.addcustomer')->with(['customers'=>$customers]);
    }
    public function update(Request $request, $id)
    {
        // sót trường hợp mã số thuế cập nhật đã tồn tại
        
    	    	 $this->validate($request,
            [
                'taxnumber' =>'required',
                'nameofunit' =>'required',
                'customername' =>'required',
                'email' =>'required',
                'address' =>'required',
              
            ],
            [
                'taxnumber.required' =>trans('customers.pleaseentertax'),
                'nameofunit.required' =>trans('customers.pleaseentername'),
                'customername.required' =>trans('customers.pleaseentercustomername'),
                'email.required' =>trans('customers.pleaseenteremail'),
                'address.required' =>trans('customers.pleaseenteraddress'),
           
                //'descreption.required' =>trans('products.pleaseenterN'),
            ]);
       $customers = Customers::find($id);

            $customers->tax_number=$request->taxnumber;
            $customers->name_of_unit = $request->nameofunit;
            $customers->customer_name = $request->customername;
            $customers->email = $request->email;
            $customers->address = $request->address;
            $customers->phone_number = $request->phone_number;
            $customers->fax_number = $request->faxnumber;

        $customers->update();
        return redirect('admin/customers/list')->with('information',trans('customers.updatesuccess'));
    

    }
    public function destroy(Request $request)
    {
      $customer = Customers::find($request->input('id'));
      if($customer->delete())
      {
        
            $customer = Customers::orderBy('id','asc')
                                                ->where('tax_number','LIKE','%'.$request->search.'%')
                                                ->orwhere('customer_name','LIKE','%'.$request->search.'%')->get();


        $view = view('customers.ajaxcustomer')->with(['customers'=>$customer]);
      }
      return response($view);
    }

     public function search(Request $request) {

        if ($request ->ajax()) {
            $search = Customers::where('tax_number', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('customer_name', 'LIKE', '%'.$request->search.'%')
                                ->get();
        if($search) {
           $view = view('customers.ajaxcustomer')->with(['customers'=>$search]);
        return Response($view);
        }
        }
    }
}
