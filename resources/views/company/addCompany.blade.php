@extends('admin.admin')

@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('companys.company')
  <!-- <small> @Lang('products.addedittitle')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('companys.admin')</a></li>
  <li><a href="/admin/products/list">@Lang('companys.company')</a></li>
  <li><a href="/admin/products/add">@Lang('companys.addedittitle')</a></li>
</ol>
@stop
@section('content')

<?php
  $url = '';
  if(empty($Companys)) {
    $companys = '';
    $representative = '';
    $taxnumber='';
    $email='';
    $address='';
    $phone_number='';
    $faxnumber='';
    $url = '/admin/companys/save';
  }
  else {
    $companys=$Companys->company_name;
    $representative = $Companys->representative;
    $taxnumber = $Companys->tax_number;
    $email=$Companys->email;
    $address=$Companys->address;
    $phone_number=$Companys->phone_number;
    $faxnumber=$Companys->fax_number;
    $url = '/admin/companys/update/'.$Companys->id.'';
  }
  if(count($errors)>0) {
    $name = old('productcname');
    $code=old('productcode');
    $price = old('productcprice');
    $unit=old('unit');
    $des=old('descreption');
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

<p class="box-title" style="text-transform: uppercase;"><i class="fa fa-tags"></i> @Lang('companys.addedittitle')</p>
</div>
<div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('companys',trans('companys.companys'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('companys',$companys,['class'=>'form-control','id'=>'productcode']) !!}                    
                      @if($errors->has('companys'))
                    <p style="color: red">
                  {{$errors->first('companys')}}
                    </p>
                  @endif
                </div>
                </div>

                 <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('representative',trans('companys.representative'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('representative',$representative,['class'=>'form-control','id'=>'productname']) !!}                    
                    @if($errors->has('representative'))
                    <p style="color: red">
                      {{$errors->first('representative')}}
                    </p>
                    @endif
                  </div>
                  </div>
                  </div>


                   <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('taxnumber',trans('companys.taxnumber'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::number('taxnumber',$taxnumber,['class'=>'form-control','id'=>'productcprice']) !!}                    
                    @if($errors->has('taxnumber'))
                    <p style="color: red">
                      {{$errors->first('taxnumber')}}
                    </p>
                    @endif
                  </div>
                  </div>
              

                
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('email',trans('companys.email'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('email',$email,['class'=>'form-control','id'=>'unit']) !!}                    
                    @if($errors->has('email'))
                    <p style="color: red">
                      {{$errors->first('email')}}
                    </p>
                    @endif
                  </div>
                  </div>
                </div>

                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('address',trans('companys.address'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::textarea('address',$address,['class'=>'form-control','id'=>'descreption','rows'=>2]) !!}                    
                    @if($errors->has('address'))
                    <p style="color: red">
                      {{$errors->first('address')}}
                    </p>                  @endif
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('phone_number',trans('companys.phone_number'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::textarea('phone_number',$phone_number,['class'=>'form-control','id'=>'descreption','rows'=>2]) !!}                    
                    @if($errors->has('phone_number'))
                    <p style="color: red">
                      {{$errors->first('phone_number')}}
                    </p>
                    @endif
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('faxnumber',trans('companys.faxnumber'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::textarea('faxnumber',$faxnumber,['class'=>'form-control','id'=>'descreption','rows'=>2]) !!}                    
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