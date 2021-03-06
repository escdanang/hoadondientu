@extends('admin.admin')
@section('content_Header')
<h1 style="text-transform: uppercase;">
@Lang('companys.company')
  <!-- <small>@Lang('companys.smalllist')</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-home"></i> @Lang('companys.admin')</a></li>
  <li><a href="/admin/products/list">@Lang('companys.company')</a></li>
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

              {!! Form::open(array('url' => '/admin/companys/list', 'class' => 'form-horizontal')) !!}

                <div class="rows">

                   <div class="col-sm-3" style="padding-left: 0px;padding-right: 0px">
                    {!! Form::text('search','',array('style'=>'width:100%','class'=>'form-control', 'id'=>'search','placeholder'=>trans('companys.search'))) !!}
              </div>
              <div class="col-sm-9 pull-left" style="padding-right: 0px; padding-left: 0px;">
                 <a href="/admin/companys/add" >
                {!! Form::button( trans('companys.add'),array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-plus','id'=>'addproduct','style'=>'float:right;height:34px;margin-bottom:5px;margin-top:5px')) !!}
              </a>
                <a href="/admin/companys/pdf" >
                {!! Form::button( trans('companys.pdf'),array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-plus','id'=>'addproduct','style'=>'float:right;margin-right:10px;height:34px;margin-bottom:5px;margin-top:5px')) !!}
              </a>
                   <a href="/admin/companys/word" >
                {!! Form::button( trans('companys.word'),array('class' => 'btn btn-primary bnt-sm pull-right; fa fa-plus','id'=>'addproduct','style'=>'float:right;margin-right:10px;height:34px;margin-bottom:5px;margin-top:5px')) !!}
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
                <th style="text-align: center; width:15% ">@Lang('companys.id')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.companys')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.taxnumber')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.representative')</th><th style=" text-align: center; width:10% ">@Lang('companys.action')</th>
            </tr>
          </thead>
          <tbody>
            <?php $STT=0?>
            @if(isset($companys))
              @foreach($companys as $company)
               <?php $STT= $STT+1?> 
          <tr role="row">
             <td style="text-align: center; width:15%;font-weight: normal;">{{$STT}}</td>
            <td style="text-align: center; width:15%;font-weight: normal;">{{$company->company_name}}</td>
            <td style="text-align: center; width:15%;font-weight: normal;">{{$company->tax_number}}</td>
            <td style=" text-align: center; width:20%; font-weight: normal;">{{$company->representative}}</td>
            <td><a href="/admin/companys/edit/{{$company->id}}" edit_id="{{$company->id}}" class="edit" ><i class="glyphicon glyphicon-pencil"></i> @Lang('companys.edit')</a>
                          <a href="#"  style="margin-left: 2%" delete_id="{{$company->id}}" class="simpleConfirm"><i class="glyphicon glyphicon-trash"></i> @Lang('companys.deleted')</a>
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
            url:"{{route('companys.removedata')}}",
            data:{'id':id,'search':value},
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
  $.ajax({
  type : 'get',
  url : '{{URL::to('admin/companys/search')}}',
  data:{'search':value,
    },
  success:function(data){
  $('#table_ajax').html(data);
  }
  });
  })
  </script> 

 


  

@endsection