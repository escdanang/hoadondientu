@extends('admin.admin')

@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('products.products')
  <!-- <small> @Lang('products.addedittitle')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('products.admin')</a></li>
  <li><a href="/admin/products/list">@Lang('products.products')</a></li>
  <li><a href="/admin/products/add">@Lang('products.addedittitle')</a></li>
</ol>
@stop
@section('content')

<?php
  $url = '';
  if(empty($products)) {
    $code = '';
    $name = '';
    $price='';
    $unit='';
    $des='';
    $url = '/admin/products/save';
  }
  else {
    $code=$products->product_code;
    $name = $products->product_name;
    $price = $products->price;
    $unit=$products->unit_of_calculation;
    $des=$products->product_description;
    $url = '/admin/products/update/'.$products->id.'';
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

<p class="box-title" style="text-transform: uppercase;"><i class="fa fa-tags"></i> @Lang('products.addedittitle')</p>
</div>
<div class="box-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('code',trans('products.productcode'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('productcode',$code,['class'=>'form-control','id'=>'productcode']) !!}                    
                      @if($errors->has('productcode'))
                    <p style="color: red">
                  {{$errors->first('productcode')}}
                    </p>
                  @endif
                </div>
                </div>

                 <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('name',trans('products.productname'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('productname',$name,['class'=>'form-control','id'=>'productname']) !!}                    
                    @if($errors->has('productname'))
                    <p style="color: red">
                      {{$errors->first('productname')}}
                    </p>
                    @endif
                  </div>
                  </div>
                  </div>


                   <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbprice',trans('products.price'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::number('productcprice',$price,['class'=>'form-control','id'=>'productcprice']) !!}                    
                    @if($errors->has('productcprice'))
                    <p style="color: red">
                      {{$errors->first('productcprice')}}
                    </p>
                    @endif
                  </div>
                  </div>
              

                
                    <div class="col-sm-6">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbunit',trans('products.unitofcaculation'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::text('unit',$unit,['class'=>'form-control','id'=>'unit']) !!}                    
                    @if($errors->has('unit'))
                    <p style="color: red">
                      {{$errors->first('unit')}}
                    </p>
                    @endif
                  </div>
                  </div>
                </div>

                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" style="margin-right: 0px; margin-left: 0px">
                    {!! Form::label('lbdes',trans('products.descripsion'),['style'=>'font-weight:normal']) !!} </br>
                    {!! Form::textarea('descreption',$des,['class'=>'form-control','id'=>'descreption','rows'=>2]) !!}                    
                    @if($errors->has('descreption'))
                    <p style="color: red">
                      {{$errors->first('descreption')}}
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