@extends('admin.admin')

@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('bills.bill')
  <!-- <small> @Lang('products.addedittitle')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('bills.admin')</a></li>
  <li><a href="/admin/products/list">@Lang('bills.bills')</a></li>
  <li><a href="/admin/products/add">@Lang('bills.addedittitle')</a></li>
</ol>
@stop
@section('content')

<?php
  $url = '';
  if(empty($bill)) {
    $bills =[
        '01GTKT' =>  trans('bills.01GTKT'),
        '02GTKT' =>  trans('bills.02GTKT'),
        ];
    $url = '/admin/bills/save';
  }
  else {
  }
  if(count($errors)>0) { 
        $billls = old('bills');   
  }
?>

{!! Form::open(array('url' => $url, 'files'=>true)) !!}
    {!! csrf_field() !!}
<div class="box box-primary">
<div class="box-header">
  @if(session('information'))
          <div class="alert alert-success">
            {{session('information')}}
          </div>
@endif

<p class="box-title" style="text-transform: uppercase;"><i class="fa fa-tags"></i> @Lang('bills.addedittitle')</p>
</div>
<div class="box-body">
    <div class="row">
        <div class="col-sm-12">
          <div class="form-group" style="margin-right: 0px; margin-left: 0px">
            {!! Form::label('bills',trans('bills.bills'),['style'=>'font-weight:normal']) !!} </br>
            {!! Form::select('bills',array_merge(array('' => 'Vui lòng chọn loại hóa đơn') + $bills),null,['class'=>'form-control','id'=>'bills']) !!}                    
            @if($errors->has('bills'))
            <p style="color: red">
                {{$errors->first('bills')}}
            </p>
            @endif
          </div>
        </div>
         <div class="col-sm-12">
          <div class="form-group" style="margin-right: 0px; margin-left: 0px">
            {!! Form::label('taxs',trans('bills.tax'),['style'=>'font-weight:normal']) !!} </br>
            <div class="tax-box">
                {!! Form::select('tax',array_merge(array('' => 'Vụi lòng chọn mã hóa đơn') + $bill_tax),null,['class'=>'form-control tax-bill','id'=>'bills111']) !!} 
            </div>
          </div>
        </div>   
        <div class="col-sm-12">
            <div class="form-group" style="margin-right: 0px; margin-left: 0px">
            
            {!! Form::label('taxs',trans('bills.tax'),['style'=>'font-weight:normal']) !!} </br>
             {!! Form::file('image', ['class'=>'btn-white form-control', 'placeholder'=>'Enter image Url']) !!}
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
<script>
        $("#bills").change(function () {
            var bills = $(this).val();
            if(bills==0){
                $(".tax-bill").show();
                $(".tax-bill-1").hide();
            }else{
                $(".tax-bill").hide();
                $(".tax-bill-1").hide();
            var arr = [];
            var tax  = <?php echo json_encode($tax);?>;  
            $.each(tax, function(index, value){
                if(bills == value.bills){
                    arr.push({ 
                        ma: value.bills, 
                        name:  value.tax 
                });
            }
            });
            $(".tax-bill").hide();
            $(".tax-box").append("<select class='form-control tax-bill-1' id='bills111' name='tax'></select>" );
            $.each(arr, function(index, value){   
                $(".tax-bill-1").append('<option value="' + value.name + '">' + value.name + '</option>');
            })
            }
            }).keyup();
</script>
@endsection