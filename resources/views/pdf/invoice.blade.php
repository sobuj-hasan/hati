<!doctype html>
<html lang="en">
  <head>
    <title>Minishop - Invoice</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>
  <body>
    <div class="row mb-4">
      <div class="col-md-6 col-sm-12 col-12">
        <h2>To</h2>
        <p>Name: <span>Saiful Islam sobuj</span></p>
        <p>phone: <span>01302509877</span></p>
        <p>Email: <span>sobuj@gmail.com</span></p>
        <p>Shipping address: <span>Zigatola Dhanmondi Dhaka</span></p>
      </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">SI No.</th>
            <th scope="col">Phone:</th>
            <th scope="col">product Name</th>
            <th scope="col">image</th>
            <th scope="col">Discount</th>
            <th scope="col">amount</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($order_details as $order_detail)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <td>{{ $order_detail->rlsnwithorder->customer_phone }}</td>
              <td>{{ $order_detail->rlsnwithproduct->product_name }}</td>
              <td><img width="50px" src="image_uploads/product_image/{{ $order_detail->rlsnwithproduct->product_image }}" alt="photo"></td>
              <td>{{ $order_detail->rlsnwithorder->discount }}</td>
              <td>{{ $order_detail->rlsnwithorder->total }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>