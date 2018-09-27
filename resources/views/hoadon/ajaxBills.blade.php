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