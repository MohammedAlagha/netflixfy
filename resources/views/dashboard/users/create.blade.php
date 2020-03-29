@extends('layouts.dashboard.app')

@section('content')

<h2>Users</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active"> Add User</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="tile mb-4">
    {!! Form::open(['route'=>'dashboard.users.store','method'=>'post']) !!}

    @include('dashboard.partials._errors')

    {{-- name --}}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
    </div>


    {{-- email --}}

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
    </div>

    {{-- password --}}

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value="{{old('password')}}">
    </div>

    {{-- password confirmation --}}

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
    </div>

    {{-- role --}}
    <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" class="form-control" >
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
