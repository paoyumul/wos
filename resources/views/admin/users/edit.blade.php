@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
