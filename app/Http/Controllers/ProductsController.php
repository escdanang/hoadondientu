<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
    	$products= Products::all();
    	return view('products.products')->with(['products'=>$products]);
    }
    public function add()
    {
    	return view('products.addproduct');
    }
    public function save(Request $request)
    {
    	 $this->validate($request,
            [
                'productcode' =>'required|unique:products_table,product_code',
                'productname' =>'required',
                'productcprice' =>'required',
                'unit' =>'required',
                //'descreption' =>'required',
            ],
            [
                'productcode.unique' => trans('products.namealreadyexists'),
                'productcode.required' =>trans('products.pleaseentercode'),
                'productname.required' =>trans('products.pleaseentername'),
                'productcprice.required' =>trans('products.pleaseenterprice'),
                'unit.required' =>trans('products.pleaseenterunit'),
                //'descreption.required' =>trans('products.pleaseenterN'),
            ]);
       $products = new Products();

            $products->product_code = $request->productcode;
            $products->product_name = $request->productname;
            $products->price = $request->productcprice;
            $products->unit_of_calculation = $request->unit;
            $products->product_description = $request->descreption;

        $products->save();
        return redirect('admin/products/list')->with('information',trans('products.addsuccess'));
    }
    public function edit($id)
    {
    	$products = Products::find($id);
        return view('products.addproduct')->with(['products'=>$products]);
    }

    public function update(Request $request, $id)
    {
    	 $this->validate($request,
            [
                'productcode' =>'required',
                'productname' =>'required',
                'productcprice' =>'required',
                'unit' =>'required',
                //'descreption' =>'required',
            ],
            [
                'productcode.required' =>trans('products.pleaseentercode'),
                'productname.required' =>trans('products.pleaseentername'),
                'productcprice.required' =>trans('products.pleaseenterprice'),
                'unit.required' =>trans('products.pleaseenterunit'),
                //'descreption.required' =>trans('products.pleaseenterN'),
            ]);
    	 $products = Products::find($id);

            $products->product_code = $request->productcode;
            $products->product_name = $request->productname;
            $products->price = $request->productcprice;
            $products->unit_of_calculation = $request->unit;
            $products->product_description = $request->descreption;

        $products->update();
        return redirect('admin/products/list')->with('information',trans('products.addsuccess'));
    }

    public function search(Request $request) {

        if ($request ->ajax()) {
            $search = Products::where('product_code', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('product_name', 'LIKE', '%'.$request->search.'%')
                                ->get();
        if($search) {
           $view = view('products.ajaxproducts')->with(['products'=>$search]);
        return Response($view);
        }
        }
    }

    public function destroy(Request $request)
    {
      $product = Products::find($request->input('id'));
      if($product->delete())
      {
        
            $product = Products::orderBy('id','asc')
                                                ->where('product_code','LIKE','%'.$request->search.'%')
                                                ->orwhere('product_name','LIKE','%'.$request->search.'%')->get();


        $view = view('products.ajaxproducts')->with(['products'=>$product]);
      }
      return response($view);
    }
}
