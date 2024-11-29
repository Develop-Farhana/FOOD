@extends('admin.main')
@section('style')

@endsection
@section('content')

<div class="container-fluid">

<div class="row">
<div class="col">
<div class="card">
  <div class="card-body">
  @if (session('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
    <h5 class="card-title mb-4 d-inline">Admins</h5>
   <a  href="{{route('admins.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">username</th>
          <th scope="col">email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $allAdmins as  $admin)
        <tr>
        <th scope="row">{{ $loop->iteration }}</th>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
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
