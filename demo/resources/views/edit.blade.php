@extends('master')

@section('content')

<div class="card">
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">User Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" 
                    value="{{ $user->name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">User Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control"
                        value="{{ $user->email }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">User Password</label>
                <div class="col-sm-10">
                    <input type="text" name="password" class="form-control"
                        value="{{ $user->password }}" />
                </div>
            </div>
           
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $user->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>


@endsection('content')