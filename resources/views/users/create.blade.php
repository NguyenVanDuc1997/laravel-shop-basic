@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Edit user</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users</a></li>
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
            <div class="card-body">
                <form method="post" action="">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" value="" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" value="" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">

                            <option selected
                                    value="{{\App\Http\Controllers\RoleConstant::ADMIN}}">Admin
                            </option>
                            <option value="{{\App\Http\Controllers\RoleConstant::USER}}">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="{{ route('users.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
