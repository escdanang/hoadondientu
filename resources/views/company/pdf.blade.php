<html>
    <head>
        <title>Cấu trúc trang HTML</title>
        <meta charset="UTF-8">
    </head>
    <body>
      <div  style="margin-top: 5px;">
    <div class="row" style="padding-top: 40px;">
      <div class="col-sm-12">
        <div id = "table_ajax"> 
        <table id="patrolteams_table" class="table table-bordered table-hover dataTable">
          <thead>
            <tr role="row">
              <th style="text-align: center; width:15% ">@Lang('companys.id')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.companys')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.representative')</th>
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
            <td style=" text-align: center; width:20%; font-weight: normal;">{{$company->representative}}</td>
          </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
  </div>
</div>
    </body>
</html> 
  