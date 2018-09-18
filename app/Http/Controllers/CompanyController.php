<?php

namespace App\Http\Controllers;
use App\Company;
use PDF;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
    	$companys= Company::all();
    	return view('company.company')->with(['companys'=>$companys]);
    }
    public function add()
    {
    	return view('company.addCompany');
    }
    public function save(Request $request)
    {

    	 $this->validate($request,
            [
                'taxnumber' =>'required|unique:company_table,tax_number',
                'representative' =>'required',
                'companys' =>'required',
                'representative' =>'required',
                'email' =>'required',
                'address' =>'required',
                'phone_number' =>'required',
              
            ],
            [
                'taxnumber.unique' => trans('companys.namealreadyexists'),
                'taxnumber.required' =>trans('companys.pleaseentertax'),
                'companys.required' =>trans('companys.pleaseentercompanyname'),
                'representative.required' =>trans('companys.pleaseenterrepresentative'),
                'email.required' =>trans('companys.pleaseenteremail'),
                'address.phone_number' =>trans('companys.pleaseenterphonenumber'),
            ]);
       $Company = new Company();
            $Company->tax_number = $request->taxnumber;
            $Company->representative = $request->representative;
            $Company->company_name = $request->companys;
            $Company->email = $request->email;
            $Company->address = $request->address;
            $Company->phone_number = $request->phone_number;
            $Company->fax_number = $request->faxnumber;

        $Company->save();
        return redirect('admin/companys/list')->with('information',trans('companys.addsuccess'));
    }
    public function edit($id)
    {
    	$Companys = Company::find($id);
        return view('company.addCompany')->with(['Companys'=>$Companys]);
    }
    public function update(Request $request, $id)
    {
        $Company = Company::find($id);
        if($request->taxnumber == $Company->tax_number){
    	$this->validate($request,
            [
                 'representative' =>'required',
                'companys' =>'required',
                'representative' =>'required',
                'email' =>'required',
                'address' =>'required',
                'phone_number' =>'required',
              
            ],
            [
                'taxnumber.required' =>trans('companys.pleaseentertax'),
                'companys.required' =>trans('companys.pleaseentercompanyname'),
                'representative.required' =>trans('companys.pleaseenterrepresentative'),
                'email.required' =>trans('companys.pleaseenteremail'),
                'address.phone_number' =>trans('companys.pleaseenterphonenumber'),
            ]);
        }else{
            $this->validate($request,
            [
                'taxnumber' =>'required|unique:company_table,tax_number',
                 'representative' =>'required',
                'companys' =>'required',
                'representative' =>'required',
                'email' =>'required',
                'address' =>'required',
                'phone_number' =>'required',
              
            ],
            [
                'taxnumber.unique' => trans('companys.namealreadyexists'),
                'taxnumber.required' =>trans('companys.pleaseentertax'),
                'companys.required' =>trans('companys.pleaseentercompanyname'),
                'representative.required' =>trans('companys.pleaseenterrepresentative'),
                'email.required' =>trans('companys.pleaseenteremail'),
                'address.phone_number' =>trans('companys.pleaseenterphonenumber'),
            ]);
        };
        $Company->tax_number = $request->taxnumber;
        $Company->representative = $request->representative;
        $Company->company_name = $request->companys;
        $Company->email = $request->email;
        $Company->address = $request->address;
        $Company->phone_number = $request->phone_number;
        $Company->fax_number = $request->faxnumber;
        $Company->update();
        return redirect('admin/companys/list')->with('information',trans('customers.updatesuccess'));
    }
    public function destroy(Request $request)
    {
      $Company = Company::find($request->id);
      $Company->delete();
      $Companys = Company::orderBy('id','asc')->where('company_name', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('representative', 'LIKE', '%'.$request->search.'%')
                                ->get();  
      $view = view('company.ajaxCompanys')->with(['Companys'=>$Companys]);
      return response($view);
    }
    public function search(Request $request) {
        $search = Company::where('company_name', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('representative', 'LIKE', '%'.$request->search.'%')
                                ->get();
        if($search) {
            $view = view('company.ajaxCompanys')->with(['Companys'=>$search]);
             return Response($view);
        }
    }
    public function indexPDF() {
        set_time_limit(0);
        $companys= Company::all();
    	$pdf = PDF::loadView('company.pdf',  compact('companys'));
    		return $pdf->download('company.pdf');
    }
    public function indexWord() {
        $companys= Company::all();
    	$phpWord = new \PhpOffice\PhpWord\PhpWord();
        $view = view('company.company')->with(['Companys'=>$companys]);
        $section = $phpWord->addSection($view);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));
    }
}
