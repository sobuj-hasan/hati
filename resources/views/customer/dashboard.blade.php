<h4 class="text-dark">My Orders:</h4>
<div class="card bg-white mb-3">
  <div class="card-body">
    <div class="row">
        <div class="col-md-1">
            <h6 class="mt-2">Show:</h6>
        </div>
        <div class="col-md-11">
            <div class="input-group">
                <select class="custom-select" id="">
                    <option selected>Last 5 days</option>
                    <option value="1">Last 15 days</option>
                    <option value="2">Last 30 days</option>
                    <option value="3">Last 6 months</option>
                    <option value="3">All Orders</option>
                </select>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
      <div style="border-bottom: 1px solid rgb(112, 101, 101);" class="row">
          <div class="col-md-6 col-sm-12 col-12">
            <span class="text-info">Order</span> #4347503948564385
            <p>Placed on 22 jun 2021</p>
          </div>
          <div class="col-md-6 col-sm-12 col-12 text-right">
            <a href="#">MANAGE</a>
          </div>
      </div>
  </div>
  <table class="table bg-white">
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td><img src="images" alt="product image"></td>
                    <td>{{ $order->customer_name }}</td>
                    <td><span>Qty: </span>{{ $order->customer_phone }}</td>
                    <td><span class="badge badge-success p-2"></span></td>
                    <td>12-02-2021</td>
                    <td><a target="_blank" href="{{ url('download/invoice') }}/{{ $order->id }}"><i class="fa fa-download"></i> Invoice</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
