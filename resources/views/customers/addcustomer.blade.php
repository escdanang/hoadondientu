@extends('admin.admin')

@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('customers.customers')
  <!-- <small> @Lang('customers.addedittitle')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('customers.admin')</a></li>
  <li><a href="/admin/customers/list">@Lang('customers.customers')</a></li>
  <li><a href="/admin/customers/add">@Lang('customers.addedittitle')</a></li>
</ol>
@stop
@section('content')

<?php
  $url = '';
  if(empty($customers)) {
    $taxnumber = '';
    $customerunit = '';
    $customername='';
    $email='';
    $address='';
    $phone='';
    $fax='';
    $url = '/admin/customers/save';
  }
  else {
    $taxnumber = $customers->tax_number;
    $customerunit = $customers->name_of_unit;
    $customername=$customers->customer_name;
    $email=$customers->email;
    $address=$customers->address;
    $phone=$customers->phone_number;
    $fax=$customers->fax_number;
    $url = '/admin/customers/update/'.$customers->id.'';
  }
  if(count($errors)>0) {
    $taxnumber = old('taxnumber');
    $customerunit = old('nameofunit');
    $customername=old('customername');
    $email=old('email');
    $address=old('address');
    $phone=old('phone_number');
    $fax=old('faxnumber');
  }
?>

{!! Form::open(array('url' => $url, 'class' => 'form-horizontal')) !!}
    {!! csrf_field() !!}
<div class="box box-primary">
<div class="box-header">
  @if(session('information'))
          <div class="alert alert-success">
            {{session('information')}}
          </div>
@endif

<p class="box-title" style="text-transform: uppercase;"><i class="fa fa-tags"></i> @Lang('customers.addedittitle')</p>
</div>
<div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('tax',trans('customers.taxnumber'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('taxnumber',$taxnumber,['class'=>'form-control','id'=>'taxnumber']) !!}                    
                      @if($errors->has('taxnumber'))
                    <p style="color: red">
                  {{$errors->first('taxnumber')}}
                    </p>
                  @endif
                </div>
                </div>

                 
                  </div>


                   <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('unit',trans('customers.nameofunit'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('nameofunit',$customerunit,['class'=>'form-control','id'=>'nameofunit']) !!}                    
                    @if($errors->has('nameofunit'))
                    <p style="color: red">
                      {{$errors->first('nameofunit')}}
                    </p>
                    @endif
                  </div>
                  </div>


                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbprice',trans('customers.customername'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('customername',$customername,['class'=>'form-control','id'=>'customername']) !!}                    
                    @if($errors->has('customername'))
                    <p style="color: red">
                      {{$errors->first('customername')}}
                    </p>
                    @endif
                  </div>
                  </div>
              

                
                    
                </div>

                 <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbunit',trans('customers.email'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('email',$email,['class'=>'form-control','id'=>'email']) !!}                    
                    @if($errors->has('email'))
                    <p style="color: red">
                      {{$errors->first('email')}}
                    </p>
                    @endif
                  </div>
                  </div>


                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbdes',trans('customers.address'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('address',$address,['class'=>'form-control','id'=>'address']) !!}                    
                    @if($errors->has('address'))
                    <p style="color: red">
                      {{$errors->first('address')}}
                    </p>
                    @endif
                  </div>
                  </div>
                </div>
               
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbdes',trans('customers.phone_number'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('phone_number',$phone,['class'=>'form-control','id'=>'phone_number']) !!}                    
                    @if($errors->has('phone_number'))
                    <p style="color: red">
                      {{$errors->first('phone_number')}}
                    </p>
                    @endif
                  </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbdes',trans('customers.faxnumber'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('faxnumber',$fax,['class'=>'form-control','id'=>'faxnumber']) !!}                    
                    @if($errors->has('faxnumber'))
                    <p style="color: red">
                      {{$errors->first('faxnumber')}}
                    </p>
                    @endif
                  </div>
                  </div>
                </div>
               
                              
</div>
  
<div class="row">
            <div class="col-sm-12" align="right" >
               {!! Form::button(trans('products.save'), array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-save','style'=>'float:right;height:34px;margin-bottom:10px;margin-right: 10px','type'=>'submit')) !!}
              {!! Form::button(trans('products.back'), array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-undo','style'=>'float:right;height:34px;margin-right:5px;margin-bottom:10px','onclick'=>"history.back(-1)")) !!}
      </div>  
</div>
</div>

{!! Form::close() !!}

@stop
@section('script')

@endsection