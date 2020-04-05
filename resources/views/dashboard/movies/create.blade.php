@extends('layouts.dashboard.app')

@section('style')
<style>
    #upload {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 25vh;
        border: 1px solid black;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<h2>movies</h2>


<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
    <li class="breadcrumb-item active"> Add Movie</li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="" id="upload">
                <i class="fa fa-video-camera fa-2x"></i>
                <p>Click to upload</p>
            </div>

            <input type="file" name="" data-movie_id="{{$movie->id}}" data-url="{{route('dashboard.movies.store')}}"
                id="movie_file-input" style="display:none">

            {!!
            Form::open(['route'=>['dashboard.movies.update',$movie->id],'method'=>'post','id'=>'movie_properties','style'=>'display:none'])
            !!}

            @include('dashboard.partials._errors')

            {{-- progress --}}
            <div class="form-group">
                <label id="upload-status" for="">Uploading</label>
                <div class="progress">
                    <div class="progress-bar" id="upload-progress" role="progressbar" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            {{-- name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="movie_name" class="form-control" value="{{old('name')}}">
            </div>

            {{-- description --}}
            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" name="description" class="form-control" value="{{old('name')}}">
            </div>

            {{-- poster --}}
            <div class="form-group">
                <label for="name">Poster</label>
                <input type="file" name="name" class="form-control" value="{{old('name')}}">
            </div>

            {{-- image --}}
            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="name" class="form-control" value="{{old('name')}}">
            </div>

            {{-- year --}}
            <div class="form-group">
                <label for="name">Year</label>
                <input type="number" name="name" class="form-control" value="{{old('name')}}">
            </div>

            {{-- Rating --}}
            <div class="form-group">
                <label for="name">Rating</label>
                <input type="number" min="1" name="rating" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    jQuery(document).on('click','#upload',function(e){
            document.getElementById('movie_file-input').click();

             })

        $('#movie_file-input').on('change',function(){

                $('#movie_properties').css('display','block');
                $('#upload').css('display','none');

                let movie = this.files[0];
                let movieName = movie.name.split('.').slice(0,-1).join('.');
                let movie_id = $(this).data('movie_id')
                $('#movie_name').val(movieName);

                let url = $(this).data('url');

                let formData = new FormData();
                formData.append('movie_id',movie_id);
                formData.append('name',movieName);
                formData.append('movie',movie);

                axios({
                    url: url,
                    method:'POST',
                    data:formData,
                    onUploadProgress: function (progressEvent) {
                        let percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total ) + '%';
                        document.getElementById('upload-progress').style.width = percentCompleted;
                        document.getElementById('upload-progress').innerHTML = percentCompleted;

                        if (percentCompleted == '100%') {
                            document.getElementById('upload-status').innerText = 'Uploded'
                        }

                    }


                }).then(function(response) {  //return movie before processing

                    let interval = setInterval(function() {

                        axios({
                            url:`/dashboard/movie/processing-show/${response.data.id}`,
                            method:'GET'
                        }).then(function (response) {   //movie while processing

                            document.getElementById('upload-status').innerText = 'Processing';
                            document.getElementById('upload-progress').style.width = response.data.percent + "%";
                            document.getElementById('upload-progress').innerHTML = response.data.percent + '%';

                            if (response.data.percent == 100) {
                                clearInterval(interval);  //break interval
                                document.getElementById('upload-status').innerText = 'Processed';

                            }
                        })


                        },3000)

                    })
                }); //end of change event

</script>

@endsection
