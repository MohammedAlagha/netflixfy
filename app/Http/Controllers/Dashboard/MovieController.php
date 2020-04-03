<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\MovieRequest;
use App\Movie;
use DataTables;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['read','show']);
        $this->middleware('permission:create_movies')->only(['create','store']);
        $this->middleware('permission:update_movies')->only(['edit','update']);
        $this->middleware('permission:delete_movies')->only(['destroy']);
    }


    public function index()
    {
        return view('dashboard.movies.index');

    }//end f index

    public function data()
    {
        $movies = Movie::all();
        return DataTables::of($movies)->addColumn('action',function($movie){

            if (auth()->user()->can(['update_movies','delete_movies'],true)) {
                return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.movies.edit', $movie->id) . "' data-value = '" . $movie->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$movie->id' data-url='" . route('dashboard.movies.destroy', $movie->id) . "'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.movies.show',$movie->id) ."'><i class='fa fa-eye'></i></a>";

            }elseif(auth()->user()->can('update_movies')){
                return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.movies.edit', $movie->id) . "' data-value = '" . $movie->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.movies.show',$movie->id) ."'><i class='fa fa-eye'></i></a>";
            }elseif(auth()->user()->can('delete_movies')){
                return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$movie->id' data-url='" . route('dashboard.movies.destroy', $movie->id) . "'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.movies.show',$movie->id) ."'><i class='fa fa-eye'></i></a>";
            }else {
                return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.movies.show',$movie->id) ."'><i class='fa fa-eye'></i></a>";
            }

        })->rawColumns(['action','user_count'])->make(true);

    }


    public function create()
    {
        $movie = Movie::create([]);
        return view('dashboard.movies.create', compact('movie'));
    }

    public function store(MovieRequest $request)
    {

       $movie = Movie::FindorFail($request->movie_id);

       $movie->update([
           'name'=>$request->name,
           'path'=>$request->file('movie')->store('movies')
       ]);

       return $movie;
    }//end of store


    public function show(Movie $movie)
    {
        return view('dashboard.movies.show',compact('movie'));
    }


    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit',compact('movie'));
    }


    public function update(MovieRequest $request, Movie $movie)
    {

        $movie->update($request->all());


        session()->flash('success','Edited Successfully');
        return redirect()->route('dashboard.movies.index');

    }


    public function destroy(Movie $movie)
    {

        $movie->delete();
        // session()->flash('success','Deleted Successfully');
        // return redirect()->route('dashboard.movies.index');

        return \response()->json(['status'=>true,'message'=>'Deleted Successfully']);

    }
}
