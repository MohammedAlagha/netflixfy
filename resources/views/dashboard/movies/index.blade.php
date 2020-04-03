@extends('layouts.dashboard.app')

@section('style')
<link href="{{asset('dashboard_files/css/jquery.datatables.css')}}" rel="stylesheet">

@endsection

@section('content')

<h2>movies</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Home</a></li>
        <li class="breadcrumb-item active">movies</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>

<div class="tile mb-4">

    <div class="row">
        <div class="col-12 mb-4">

            @if (auth()->user()->hasPermission('create_movies'))
                <a href="{{route('dashboard.movies.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
            @else
                 <a href="#" class="btn btn-primary disabled" disabled=""><i class="fa fa-plus"></i>Add</a>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" id="table1">

                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>updated_at</th>
                                <th>created_at</th>
                                <th style="width:28%">options</th>
                            </tr>
                        </thead>
                    </table>
                </div><!-- table-responsive -->
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')

<!-- DataTables -->
<script src="{{asset('dashboard_files/js/jquery.datatables.min.js')}}"></script>
<script>
    jQuery(document).ready(function() {
    "use strict";
    var table = jQuery('#table1').DataTable({     //For making the table and I give it name to call it
              serverSide: true,
              processing: true,
              ajax: {
                  "url": "{{route('dashboard.movies.data')}}",
              },
              columns: [
                  {data: 'id'},
                  {data: 'name'},
                  {data: 'updated_at'},
                  {data: 'created_at'},
                  {data: 'action', orderable: false, searchable: false},
               ]
              });

            })

            $(document).on('click','.delete',function(e){
                e.preventDefault();
                let url = $(this).data('url');
                let n =  new Noty({

                        type:'alert',

                        layout:'topRight',

                        text:"Confirm deleting record",

                        killer:true,
                        buttons:[
                            Noty.button('Yes','btn btn-success mr-2 mt-2', function(){

                            axios({
                                    method: 'delete',
                                    url: url,
                                    data: {
                                        _token:'{{csrf_token()}}'
                                    },
                                    dataType: 'json',
                                    }).then(function(response){
                                        n.close();
                                        new Noty({
                                            type:'success',
                                            layout:'topRight',
                                            text:response.data.message,
                                        }).show();
                                        jQuery('#table1').DataTable().ajax.reload(null, false);
                                    });
                            }),
                            Noty.button('No','btn btn-danger mt-2', function(){
                                n.close();
                            })

                        ]
                    })
                    n.show();

            })
</script>
@endsection
