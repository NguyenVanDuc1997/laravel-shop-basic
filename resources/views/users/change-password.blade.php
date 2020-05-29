@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            Change pass word user: {{ $user->name }}
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.changePassword',['id' => $user->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
