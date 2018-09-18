@extends('admin.admin')
@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('customers.customers')
  <!-- <small>@Lang('products.smalllist')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('customers.admin')</a></li>
  <li><a href="/admin/customers/list">@Lang('customers.customers')</a></li>
</ol>
@stop
@section('content')
<div class="box box-primary">

            <!-- /.box-header -->

            <div class="box-body">
            
            @if(session('information'))
            <div class="alert alert-success">
              {{session('information')}}
              </div>
          @endif

              {!! Form::open(array('url' => '/admin/customers/list', 'class' => 'form-horizontal')) !!}

                <div class="rows">

                   <div class="col-sm-3" style="padding-left: 0px;padding-right: 0px">
                    {!! Form::text('search','',array('style'=>'width:100%','class'=>'form-control', 'id'=>'search','placeholder'=>trans('customers.search'))) !!}
              </div>
              <div class="col-sm-9 pull-left" style="padding-right: 0px; padding-left: 0px;">
                 <a href="/admin/customers/add" >
                {!! Form::button( trans('customers.add'),array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-plus','id'=>'addproduct','style'=>'float:right;height:34px;margin-bottom:5px;margin-top:5px')) !!}
              </a>
              </div>
            
              </div>

            <!--  <div class="col-sm-3" style="padding-right: 0px;padding-left: 0px;">
               {!! Form::text('search',null,array('style'=>'float:right;height:30px;width:100%;margin-top:5px;margin-bottom:5px','class'=>'form-control pull-right', 'id'=>'search','placeholder'=>trans('members.searchtitle'))) !!}
              </div> -->
  <div  style="margin-top: 5px;">
    <div class="row" style="padding-top: 40px;">
      <div class="col-sm-12">
        <div id = "table_ajax"> 
        <table id="patrolteams_table" class="table table-bordered table-hover dataTable">
          <thead>
            <tr role="row">
                <th style="text-align: center; width:15% ">@Lang('customers.taxnumber')</th>
                      <th style=" text-align: center; width:15% ">@Lang('customers.nameofunit')</th>
                      <th style=" text-align: center; width:15% ">@Lang('customers.customername')</th>
                       <th style=" text-align: center; width:15% ">@Lang('customers.email')</th>
                        <th style=" text-align: center; width:15% ">@Lang('customers.address')</th>
                        <th style=" text-align: center; width:10% ">@Lang('customers.phone_number')</th>
                        <th style=" text-align: center; width:15% ">@Lang('customers.action')</th>
                    
            </tr>
          </thead>
          <tbody>
            @if(isset($customers))
              @foreach($customers as $customer)
          <tr role="row">
            <td style="text-align: left; width:15%;font-weight: normal;">{{$customer->tax_number}}</td>
            <td style=" text-align: left; width:15%; font-weight: normal;">{{$customer->name_of_unit}}</td>
            <td style=" text-align: left; width:15% ; font-weight: normal;">{{$customer->customer_name}}</td>
            <td style=" text-align: left; width:15% ; font-weight: normal;">{{$customer->email}}</td>
            <td style=" text-align: left; width:15% ; font-weight: normal;">{{$customer->address}}</td>
            <td style=" text-align: left; width:10% ; font-weight: normal;">{{$customer->phone_number}}</td>
            <td style=" text-align: center; width:15% ; font-weight: normal;">
              <a href="/admin/customers/edit/{{$customer->id}}" edit_id="{{$customer->id}}" class="edit" ><i class="glyphicon glyphicon-pencil"></i> @Lang('customers.edit')</a>
                          <a href="#"  style="margin-left: 2%" delete_id="{{$customer->id}}" class="simpleConfirm"><i class="glyphicon glyphicon-trash"></i> @Lang('customers.deleted')</a>
            </td>
          </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  </div>
</div>

@stop
@section('script')

<script>
   // delete
 $(document).on('click','.simpleConfirm', function(e){
  e.preventDefault();
      var id = $(this).attr('delete_id');
       var value = $('#search').val();
      $.ajax({
            method:"get",
            url:"{{route('customers.removedata')}}",
            data:{'id':id,
            'search':value,
          },
            success:function(data)
            {
              //$('#customer_table').DataTable().ajax.reload();
               $('#table_ajax').html(data);
            }
       })
});
</script>

<script type="text/javascript">
  $(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
</script>
 <script type="text/javascript">
  $('#search').on('keyup',function(){
  var value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('admin/customers/search')}}',
  data:{'search':value,
    },
  success:function(data){
  $('#table_ajax').html(data);
  }
  });
  })
  </script> 

 


  

@endsection