<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Course;
use App\Type;
use File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();

        return view('pages.backend.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::pluck('name','id');
        return view('pages.backend.courses.create', compact('types'));
    }

    public function checkSlug($slug)
    {
        return Course::where('slug', $slug)->exists();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        if ( ($this->checkSlug(str_slug($request->name))) ) {
            return redirect()->back()->withError('Course already exists!');
        }

        $request->request->add(['slug' => str_slug($request->name)]);

        $request->validate([
            'name'          =>  'required|min:2',
            'description'   =>  '',
            'image'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=25,max_width=500',
        ]);

        $image = $request->file('image')->store('gallery','public');

        $imageSquare = Image::make(public_path("storage/{$image}"))->fit(1200,1200);

        Course::create(array_merge(
            $request->except(['_token', 'type', 'image']),
            ['type_id'  => $request->type],
            ['image'    => $image]
        ));

        if ($request->get('action') == 'save') {
            return redirect()->route('courses.index')->withSuccess('Course Successfully created!');
        } elseif ($request->get('action') == 'continue') {
            return redirect()->route('courses.create')->withSuccess('Course Successfully created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('pages.backend.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $types = Type::pluck('name','id');
        return view('pages.backend.courses.edit', compact('course', 'types'));
    }

    public function checkImage($image)
    {
        return File::exists(storage_path('app/public/'.$image));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if ( ($this->checkSlug(str_slug($request->name))) ) {
            $request->request->add(['slug' => str_slug($request->name).str_random(5)]);
        }else {
            $request->request->add(['slug' => str_slug($request->name)]);
        }
        

        $request->validate([
            'name'          =>  'required|min:2',
            'description'   =>  '',
            'image'         =>  'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=25,max_width=500',
        ]);

        $img_arr = [];

        if( request()->has('image') ){
            if($this->checkImage($course->image)){
                File::delete(storage_path('app/public/'.$course->image));
            }
            $image = $request->file('image')->store('gallery','public');
            $imageSquare = Image::make(public_path("storage/{$image}"))->fit(1200,1200);
            
            array_push($img_arr, ['image' => $image]);
        }

        $course->update(array_merge(
            $request->except(['_token', 'type', 'image']),
            ['type_id'  => $request->type],
            $img_arr[0] ?? []
        ));
        if ($request->get('action') == 'save') {
            return redirect()->route('courses.index')->withSuccess('Course Successfully updated!');
        } elseif ($request->get('action') == 'continue') {
            return redirect()->route('courses.edit',$course->slug)->withSuccess('Course Successfully update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->withSuccess('Course Successfully deleted!');
    }
}
