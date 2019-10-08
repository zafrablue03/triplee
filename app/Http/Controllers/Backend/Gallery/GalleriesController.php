<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Service;
use App\ImageUpload;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();

        return view('pages.backend.gallery.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = Service::find($request->service);

        $request->validate([
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=50,max_width=2000, min_height=50, max_height=2000',
        ]);

        $image = $request->file('image')->store('events','public');
        $thumbnail = $request->file('image')->store('events/thumbnail','public');
        $thumbnailImage = Image::make(public_path("storage/{$thumbnail}"))->fit(200,200);
        $thumbnailImage->save();

        $service->images()->create([
            'url'       =>  $image,
            'thumbnail' =>  $thumbnail
        ]);

        return redirect()->route('gallery.index')->withSuccess('Uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageUpload $image)
    {
        $image->delete();

        return redirect()->route('gallery.index');
    }
}
