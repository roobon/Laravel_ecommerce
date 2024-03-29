@extends('admin.layouts.default')
@section('admincontent')
       @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif 

      <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Shipping Address</th>
                  <th>Shipping Telephone</th>
                  <th>Shipping E-Mail</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>   
              <tbody>
                @foreach($allShipping as $shipping)
                
              <tr>
                <td class="center">{{$shipping->shipping_first_name}}</td>
                <td class="center">{{$shipping->shipping_last_name}}</td>
                <td class="center">{{$shipping->shipping_address}}</td>
                <td class="center">{{$shipping->shipping_telephone}}</td>
                <td class="center">{{$shipping->shipping_email}}</td>
                <td class="center">{{$shipping->created_at}}</td>
                <td class="center">
                  {{-- <a class="btn btn-danger" href="{{url('shipping.destroy')}}">
                    <i class="halflings-icon white trash"></i> 
                  </a> --}}
                    <form action="{{action('ShippingController@destroy', $shipping['shipping_id'])}}" method="post">
                      <a class="btn btn-success" href="#">
                        <i class="halflings-icon white zoom-in"></i>  
                      </a>
                      <a class="btn btn-info" href="{{action('ShippingController@edit', $shipping['shipping_id'])}}">
                        <i class="halflings-icon white edit"></i>  
                      </a>
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
                    </form>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>            
      </div>
@stop