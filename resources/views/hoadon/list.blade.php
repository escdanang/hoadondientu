@extends('admin.admin')
@section('content_Header')
<h1 style="text-transform: uppercase;">
 @Lang('bills.bill')
  <!-- <small>@Lang('products.smalllist')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('bills.admin')</a></li>
  <li><a href="/admin/products/list">@Lang('bills.bill')</a></li>
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

              {!! Form::open(array('url' => '/admin/products/list', 'class' => 'form-horizontal')) !!}

                <div class="rows">

                   <div class="col-sm-3" style="padding-left: 0px;padding-right: 0px">
                    {!! Form::text('search','',array('style'=>'width:100%','class'=>'form-control', 'id'=>'search','placeholder'=>trans('bills.search'))) !!}
              </div
            
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
                <th style="text-align: center; width:15% ">@Lang('bills.tax')</th>
                      <th style=" text-align: center; width:20% ">@Lang('bills.bills')</th>
                      <th style=" text-align: center; width:10% ">@Lang('bills.action')</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($bills))
              @foreach($bills as $bill)
          <tr role="row">
            <td style="text-align: center; width:15%;font-weight: normal;">{{$bill->tax}}</td>
            <td style=" text-align: center; width:20%; font-weight: normal;">{{$bill->bills}}</td>
             <td style=" text-align: center; width:10% ; font-weight: normal;">
            @if($bill->image=="null")
           <a href="{{$bill->url}}">
                
                <img alt="{{ $bill->url }}" src="{{asset('/bills/images/Icon_View_24.png')}}" style="cursor: zoom-in;" width="24px" hight="24px"/>
              </a>
             @endif
             @if($bill->url=="null")
                <img alt="{{ $bill->url }}" src="{{asset('/bills/images/Icon_View_24.png')}}" style="cursor: zoom-in;" width="24px" hight="24px"/>
              </a>
              @endif
              <a href="#"  style="margin-left: 2%" delete_id="{{$bill->id}}" class="simpleConfirm"><i class="glyphicon glyphicon-trash"></i> @Lang('companys.deleted')</a>
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
      $.ajax({
            method:"get",
            url:"{{route('bills.removedata')}}",
            data:{'id':id},
            success:function(data)
            {
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
  alert(value);
  })
  </script> 

 


  

@endsection