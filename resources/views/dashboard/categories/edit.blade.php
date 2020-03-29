@extends('layouts.dashboard.app')

@section('content')

<h2>Categories</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item active"> Edit Category</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="tile mb-4">
    {!! Form::open(['route'=>['dashboard.categories.update',$category->id],'id'=>'category_edit','method'=>'put']) !!}
    <input type="hidden" name="id" value="{{$category->id}}">
    @include('dashboard.partials._errors')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$category->name)}}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
