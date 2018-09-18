<table id="patrolteams_table" class="table table-bordered table-hover dataTable">
          <thead>
            <tr role="row">
              <th style="text-align: center; width:15% ">@Lang('companys.id')</th>
                <th style="text-align: center; width:15% ">@Lang('companys.companys')</th>
            <th style="text-align: center; width:15% ">@Lang('companys.representative')</th>

                        <th style=" text-align: center; width:10% ">@Lang('companys.action')</th>
            </tr>
          </thead>
          <tbody>
            <?php $STT=0?>
            @if(isset($Companys))
              @foreach($Companys as $company)
               <?php $STT= $STT+1?> 
          <tr role="row">
             <td style="text-align: center; width:15%;font-weight: normal;">{{$STT}}</td>
            <td style="text-align: center; width:15%;font-weight: normal;">{{$company->company_name}}</td>
            <td style=" text-align: center; width:20%; font-weight: normal;">{{$company->representative}}</td>
            <td><a href="/admin/companys/edit/{{$company->id}}" edit_id="{{$company->id}}" class="edit" ><i class="glyphicon glyphicon-pencil"></i> @Lang('companys.edit')</a>
                          <a href="#"  style="margin-left: 2%" delete_id="{{$company->id}}" class="simpleConfirm"><i class="glyphicon glyphicon-trash"></i> @Lang('companys.deleted')</a>
            </td>
          </tr>
              @endforeach
            @endif
          </tbody>
        </table>