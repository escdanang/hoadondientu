 <table id="patrolteams_table" class="table table-bordered table-hover dataTable">
          <thead>
            <tr role="row">
                <th style="text-align: center; width:15% ">@Lang('products.productcode')</th>
                      <th style=" text-align: center; width:20% ">@Lang('products.productname')</th>
                      <th style=" text-align: center; width:10% ">@Lang('products.price')</th>
                       <th style=" text-align: center; width:40% ">@Lang('products.descripsion')</th>
                        <th style=" text-align: center; width:10% ">@Lang('products.action')</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($products))
              @foreach($products as $product)
          <tr role="row">
            <td style="text-align: left; width:15%;font-weight: normal;">{{$product->product_code}}</td>
            <td style=" text-align: left; width:20%; font-weight: normal;">{{$product->product_name}}</td>
            <td style=" text-align: left; width:10% ; font-weight: normal;">{{$product->price}}/{{$product->unit_of_calculation}}</td>
            <td style=" text-align: left; width:40% ; font-weight: normal;">{{substr($product->product_description,0,20)}}<span class="tooltip02" fulltext="{{$product->product_description}}">...</span></td>
            <td style=" text-align: center; width:15% ; font-weight: normal;">
              <a href="/admin/products/edit/{{$product->id}}" edit_id="{{$product->id}}" class="edit" ><i class="glyphicon glyphicon-pencil"></i> @Lang('products.edit')</a>
                          <a href="#"  style="margin-left: 2%" delete_id="{{$product->id}}" class="simpleConfirm"><i class="glyphicon glyphicon-trash"></i> @Lang('products.deleted')</a>
            </td>
          </tr>
              @endforeach
            @endif
          </tbody>
        </table>