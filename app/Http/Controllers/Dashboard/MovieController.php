<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\MovieRequest;
use App\Jobs\StreamMovie;
use App\Movie;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    }//end of index

    public function data()
    {
        $movies = Movie::with('categories')->get();
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

        })->addColumn('categories',function ($movie){
            $result = '';
            foreach ($movie->categories as $category){
                $result .= "<h5 style='display: inline-block'><span class='badge badge-primary ml-1'>$category->name</span></h5>";
            }
            return $result;
        })->rawColumns(['action','user_count','categories'])->make(true);

    }


    public function create()
    {
        $categories = Category::all();
        $movie = Movie::create([]);
        return view('dashboard.movies.create', compact('movie','categories'));
    }

    public function store(Request $request)
    {

       $movie = Movie::FindorFail($request->movie_id);

       $movie->update([
           'name'=>$request->name,
           'path'=>$request->file('movie')->store('movies')
       ]);


        //encoding the vedio.........................

        $this->dispatch(new StreamMovie($movie));

       return $movie;

    }//end of store


    public function show(Movie $movie)
    {
        $categories = Category::all();
        return view('dashboard.movies.show',compact('movie','categories'));
    }


    public function processingShow(Movie $movie)
    {
        return $movie;
    }


    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('dashboard.movies.edit',compact('movie','categories'));
    }


    public function update(MovieRequest $request, Movie $movie)
    {

        $request_data = $request->except(['poster','image']);

        if ($request->poster){

            $this->removePrevious('poster',$movie);
           $poster = Image::make($request->poster)->resize('255','378')->encode('jpg');

            Storage::disk('local')->put('public/images/'.$request->poster->hashName(),(string)$poster,'public');

//           $request->merge(['poster'=>$request->poster->hashName()]);
            $request_data['poster']=$request->poster->hashName();


        } //end of if

        if ($request->image){

            $this->removePrevious('image',$movie);
            $image = Image::make($request->image)->encode('jpg',50);

            Storage::disk('local')->put('public/images/'.$request->image->hashName(),(string)$image,'public');

//            $request->merge(['image'=>$request->image->hashName()]);

            $request_data['image']=$request->image->hashName();

        } //end of if

//        dd($request_data);
        $movie->update($request_data);
        $movie->categories()->sync($request->categories);

        session()->flash('success','Data Edited Successfully');
        return redirect()->route('dashboard.movies.index');

    }


    public function destroy(Movie $movie)
    {
        Storage::disk('local')->delete('public/images/' . $movie->poster);
        Storage::disk('local')->delete('public/images/' . $movie->image);

        Storage::disk('local')->deleteDirectory('public/movies/' . $movie->id);
        Storage::disk('local')->delete($movie->path);

        $movie->delete();
        // session()->flash('success','Deleted Successfully');
        // return redirect()->route('dashboard.movies.index');

        return \response()->json(['status'=>true,'message'=>'Deleted Successfully']);
    }

    private function removePrevious($image_type,$movie){

        if ($image_type == 'poster'){
            if ($movie->poster != null) {
                Storage::disk('local')->delete('public/images/' . $movie->poster);
            }
        }else{
            if ($movie->image != null) {
                Storage::disk('local')->delete('public/images/' . $movie->image);
            }

        }

    }
}
