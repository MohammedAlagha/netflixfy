@extends('layouts.dashboard.app')

@section('content')

<div class="">

    <h2>movies</h2>
</div>


<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
    <li class="breadcrumb-item active"> Edit Movie</li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
             {!! Form::open(['route'=>['dashboard.movies.update',$movie->id],'method'=>'PUT','id'=>'movie_properties','files'=>'yes']) !!}


                <input type="hidden" name="id" value="{{$movie->id}}">

                <input type="hidden" name="type" value="update">   {{--for choose store or update and validation --}}

                @include('dashboard.partials._errors')

                {{-- name --}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="movie_name" class="form-control"
                           value="{{old('name', $movie->name)}}">
                </div>

                {{-- description --}}
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control"
                           value="{{old('description', $movie->description)}}">
                </div>

                {{-- poster --}}
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" name="poster" class="form-control">
                    <img src="{{$movie->poster_path}}" style="margin-top:10px; width:255px; height:378px" alt="poster">
                </div>

                {{-- image --}}
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{$movie->image_path}}" style="margin-top:10px; width:300px; height:300px" alt="poster">

                </div>

                {{-- category --}}
                <div class="form-group">
                    <label for="categories">Category</label>
                    <select name="categories[]" class="form-control select2" style="width:100%" multiple>
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
                    <input type="number" name="year" class="form-control" value="{{old('year', $movie->year)}}">
                </div>

                {{-- Rating --}}
                <div class="form-group">
                    <label for="name">Rating</label>
                    <input type="number" min="1" max="7" name="rating" class="form-control"
                           value="{{old('rating', $movie->rating)}}">
                </div>

                <div class="form-group">
                    <button type="submit" id="submit-btn" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
                </div>
                 {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection
