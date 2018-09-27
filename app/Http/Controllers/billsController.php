<?php

namespace App\Http\Controllers;
use App\Bill;
use File;
use Illuminate\Http\Request;

class billsController extends Controller
{
    public function add()
    {
        $tax= Bill::all();
        foreach ( $tax as $o):
            $bill_tax[] = $o->tax;
            $bill_bills[] = $o->bills;
        endforeach;
    	return view('hoadon.addHoaDon')->with(['tax'=>$tax,'bill_tax'=>$bill_tax]);
    }
    public function save(Request $request)
    {
        $this->validate($request,
            [
                'bills' =>'required'
            ],
            [
                'bills.required' => "chưa chọn",
        ]);
        $id_bill=Bill::max('id');
        $tax_bill=Bill::where('id',$id_bill)->first();
        $url_bills=Bill::where('tax',$request->tax)->first();
        $bill= new Bill();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($tax_bill->tax).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/bills/images');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $bill->image = $name;
            $bill->url = "null";
        }else{
            $bill->image = "null";
            $bill->url = $url_bills->url;
        }
        if((int)substr($tax_bill->tax,6)<=9){
            $arr=substr($tax_bill->tax,8)+1;
            $bill->tax=substr($tax_bill->tax,0,8).$arr;
        }
        if(9<=((int)substr($tax_bill->tax,6))){
            $arr=substr($tax_bill->tax,7)+1;
            $max_tax=(substr($request->tax,0,7).(string)$arr);
            $app=(string)$max_tax;
            $bill->tax = $app;
        }
        if(99<=(int)substr($tax_bill->tax,6)){
            $arr=substr($tax_bill->tax,6)+1;
            $bill->tax=substr($request->tax,0,6).$arr;
        }
        $bill->bills = $request->bills;
        $bill->action = 0;
        $bill->save();
        return redirect('admin/bills/list')->with('information',trans('companys.addsuccess'));
    }
    public function index() {
        $bills= Bill::all();
        return view('hoadon.list')->with(['bills'=>$bills]);
    }
    public function index1() {
    	return view('hoadon.hoadon01');
    }
    public function index2() {
    	return view('hoadon.hoadon02');
    }
    public function index3() {
    	return view('hoadon.hoadon03');
    }
    public function index4() {
    	return view('hoadon.hoadon04');
    }
    public function index5() {
    	return view('hoadon.hoadon05');
    }
    public function index6() {
    	return view('hoadon.hoadon06');
    }
    public function index7() {
    	return view('hoadon.hoadon07');
    }
    public function index8() {
    	return view('hoadon.hoadon08');
    }
    public function index9() {
    	return view('hoadon.hoadon09');
    }
    public function index10() {
    	return view('hoadon.hoadon10');
    }
    public function index11() {
    	return view('hoadon.hoadon11');
    }
    public function index12() {
    	return view('hoadon.hoadon12');
    }
    public function index13() {
    	return view('hoadon.hoadon13');
    }
    public function index14() {
    	return view('hoadon.hoadon14');
    }
    public function index15() {
    	return view('hoadon.hoadon15');
    }
    public function index16() {
    	return view('hoadon.hoadon16');
    }
    public function index17() {
    	return view('hoadon.hoadon17');
    }
    public function index18() {
    	return view('hoadon.hoadon18');
    }
    public function index19() {
    	return view('hoadon.hoadon19');
    }
    public function index20() {
    	return view('hoadon.hoadon20');
    }
    public function index21() {
    	return view('hoadon.hoadon21');
    }
    public function index22() {
    	return view('hoadon.hoadon22');
    }
    public function index23() {
    	return view('hoadon.hoadon23');
    }
    public function index24() {
    	return view('hoadon.hoadon24');
    }
    public function index25() {
    	return view('hoadon.hoadon25');
    }
    public function index26() {
    	return view('hoadon.hoadon26');
    }
    public function index27() {
    	return view('hoadon.hoadon27');
    }
    public function index28() {
    	return view('hoadon.hoadon28');
    }
    public function index29() {
    	return view('hoadon.hoadon29');
    }
    public function index30() {
    	return view('hoadon.hoadon30');
    }
    public function index31() {
    	return view('hoadon.hoadon31');
    }
    public function index32() {
    	return view('hoadon.hoadon32');
    }
    public function index33() {
    	return view('hoadon.hoadon33');
    }
    public function index34() {
    	return view('hoadon.hoadon34');
    }
    public function index35() {
    	return view('hoadon.hoadon35');
    }
    public function index36() {
    	return view('hoadon.hoadon36');
    }
    public function index37() {
    	return view('hoadon.hoadon37');
    }
    public function index38() {
    	return view('hoadon.hoadon38');
    }
    public function index39() {
    	return view('hoadon.hoadon39');
    }
    public function index40() {
    	return view('hoadon.hoadon40');
    }
    public function index41() {
    	return view('hoadon.hoadon41');
    }
    public function index42() {
    	return view('hoadon.hoadon42');
    }
    public function index43() {
    	return view('hoadon.hoadon43');
    }
    public function index44() {
    	return view('hoadon.hoadon44');
    }
    public function index45() {
    	return view('hoadon.hoadon45');
    }
    public function destroy(Request $request)
    {

      $bill = Bill::find($request->id);
      $bill->delete();
      $destinationPath = public_path('/bills/images');
      $imagePath = $destinationPath. "/".  $bill->image;
      if(File::exists($imagePath)) {
            File::delete($imagePath);
      }
      $bills= Bill::all();
      $view = view('hoadon.ajaxBills')->with(['bills'=>$bills]);
      return response($view);
    }   
}
