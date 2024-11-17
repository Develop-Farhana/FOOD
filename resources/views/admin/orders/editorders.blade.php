@extends('admin.main')
@section('style')

@endsection
@section('content')
<div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Edit Categories</h5>
          <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <p> Cuurent Status <b>{{$order->status}}</b></p>
            <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Order Status</label>
                  <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option>--Select Order Status--</option>
                    <option value="Proccessing">Proccessing</option>
                    <option value="Deliverd">Deliverd</option>
                  </select>

              </div>
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
            </form>

          </div>
        </div>
      </div>
  </div>
@endsection
