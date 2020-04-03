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

<div class="tile mb-4">

    @include('dashboard.partials._errors')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$movie->name}}" readonly>
    </div>

    <div class="form-group">
        <label for="name">User Count</label>
        <input type="text" name="count" class="form-control" value="{{$movie->users->count()}}" readonly>
    </div>

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
                        <select name="permissions[]" class="form-control select2" multiple disabled>
                            @foreach ($permissoin_maps as $permoission_map)
                            <option value="{{$permoission_map .'_' .$model}}"
                            {{($movie->hasPermission($permoission_map .'_' .$model))?'selected':''}}
                            >{{$permoission_map}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>

@endsection
