@extends('admin.main')
@section('style')

@endsection
@section('content')
<div class="container-fluid">

<div class="row">
<div class="col">
<div class="card">
  <div class="card-body">
  <div class="container">
            @if (session('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                    @endif
        </div>

        <div class="container">
            @if (session('delete'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session('delete') }}</li>
                            </ul>
                        </div>
                    @endif
           </div>
    <h5 class="card-title mb-4 d-inline">Products</h5>
    <a  href="{{route('products.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">product</th>
          <th scope="col">price in $$</th>
          <th scope="col">expiration date</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($allProducts as $products )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th> <!-- This will add the counter -->
                <td>{{ $products->name }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->exp_date }}</td>
                <td><a href="{{ route('products.delete', $products->id) }}" class="btn btn-danger text-center">delete</a></td>
            </tr>
        @endforeach


      </tbody>
    </table>
  </div>
</div>
</div>
</div>



</div>

@endsection
