@extends('layouts.dashboard.app')

@section('content')

<h2>Users</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active"> Edit User</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="tile mb-4">
    {!! Form::open(['route'=>['dashboard.users.update',$user->id],'id'=>'user_edit','method'=>'put']) !!}
    <input type="hidden" name="id" value="{{$user->id}}">
    @include('dashboard.partials._errors')
        {{-- name --}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}">
        </div>


        {{-- email --}}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">
        </div>



        {{-- role --}}
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control" >
                {{$user->roles->pluck('name')->toArray()[0]}}
                @foreach ($roles as $role)
                    <option {{$user->hasRole($role->name)?'selected':''}} value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
