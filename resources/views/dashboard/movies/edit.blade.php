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
            {!! Form::open(['route'=>['dashboard.movies.update',$movie->id],'id'=>'movie_edit','method'=>'put']) !!}
            <input type="hidden" name="id" value="{{$movie->id}}">
            @include('dashboard.partials._errors')

            {{-- name --}}
            <div class="form-group">

                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$movie->name)}}">
            </div>

            {{-- permission --}}

            <div class="form-group">
                <h4 style="font-weight:400">Permissions</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:15%">Model</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $models=['categories','users','movies','movies','settings']
                        @endphp

                        @foreach ($models as $index=>$model)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$model}}</td>
                            <td>
                                @php
                                $permissoin_maps=['create','read','update','delete'];
                                @endphp

                                @if ($model == 'settings')
                                    @php
                                    $permissoin_maps=['create','read'];
                                    @endphp
                                @endif

                                <select name="permissions[]" class="form-control select2" multiple>
                                    @foreach ($permissoin_maps as $permoission_map)
                                    <option value="{{$permoission_map .'_' .$model}}"
                                        {{($movie->hasPermission($permoission_map .'_' .$model))?'selected':''}}>
                                        {{$permoission_map}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection
