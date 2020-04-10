@extends('layouts.dashboard.app')

@section('content')

<h2>movies</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
        <li class="breadcrumb-item active"> Show Movie</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">

            {{-- name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="movie_name" class="form-control"
                       value="{{$movie->name}}" readonly>
            </div>

            {{-- description --}}
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{ $movie->description}}" readonly>
            </div>

            {{-- poster --}}
            <div class="form-group">
                <label for="poster">Poster</label>
                <img src="{{$movie->poster_path}}" style="margin-top:10px; width:255px; height:378px" alt="poster">
            </div>

            {{-- image --}}
            <div class="form-group">
                <label for="image">Image</label>
                <img src="{{$movie->image_path}}" style="margin-top:10px; width:300px; height:300px" alt="poster">

            </div>

            {{-- category --}}
            <div class="form-group">
                <label for="categories">Category</label>
                <select name="categories[]" class="form-control select2" style="width:100%" multiple disabled>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            {{in_array($category->id,$movie->categories->pluck('id')->toArray())?"selected":""}}>
                            {{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- year --}}
            <div class="form-group">
                <label for="name">Year</label>
                <input type="number" name="year" class="form-control" value="{{$movie->year}}" readonly>
            </div>

            {{-- Rating --}}
            <div class="form-group">
                <label for="name">Rating</label>
                <input type="number" min="1" name="rating" class="form-control"
                       value="{{ $movie->rating}}" readonly>
            </div>


        </div>
    </div>
</div>

@endsection
