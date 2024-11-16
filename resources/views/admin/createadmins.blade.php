@extends('admin.main')

@section('style')
<!-- Add any custom styles if necessary -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">


                    <div class="container mt-5">
                        <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                        <form method="POST" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Email input -->
                            <div class="form-outline mb-4 mt-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary mb-4">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
