@extends('layouts.dashboard.app')

@section('content')

<h2>Setting</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="">Settings</a></li>
        <li class="breadcrumb-item active">Social Login</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="tile mb-4">
    {!! Form::open(['route'=>'dashboard.settings.store','method'=>'post']) !!}

    @include('dashboard.partials._errors')


    @php
    $social_sites = ['facebook','google']
    @endphp

    @foreach ($social_sites as $social_site)

    {{-- client id --}}
    <div class="form-group">
        <label for="name" class="text-capitalize">{{$social_site}} client id</label>
    <input type="text" name="{{$social_site}}_client_id" class="form-control" value="{{setting($social_site . '_client_id')}}">
    </div>

    {{-- client secret --}}
    <div class="form-group">
        <label for="name" class="text-capitalize">{{$social_site}} client secret</label>
        <input type="text" name="{{$social_site}}_client_secret" class="form-control" value="{{setting($social_site . '_client_secret')}}">

    </div>

    {{-- redirect url --}}
    <div class="form-group">
        <label for="name" class="text-capitalize">{{$social_site}} redirect ulr</label>
    <input type="text" name="{{$social_site}}_redirect_url" class="form-control" value="{{setting($social_site .'_redirect_url')}}">
    </div>
    @endforeach





    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
