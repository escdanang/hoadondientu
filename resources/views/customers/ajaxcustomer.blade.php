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