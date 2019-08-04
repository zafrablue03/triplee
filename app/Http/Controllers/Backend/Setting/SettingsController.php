<?php

namespace App\Http\Controllers\Backend\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Type;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();

        return view('pages.backend.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::pluck('name','id');
        return view('pages.backend.setting.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkSlug($slug)
    {
        return Setting::where('slug', $slug)->exists();
    }
    public function checkDescription($description)
    {
        return Setting::where('description', $description)->exists();
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ( ($this->checkSlug(str_slug($request->name))) ) {
            return redirect()->back()->withError('Setting already exists!');
        }
        if( ($this->checkDescription($request->description)) ){
            return redirect()->back()->withError('Same description already exists!');
        }

        $request->request->add(['slug' => str_slug($request->name)]);

        $request->validate([
            'name'          =>  'required|min:3|unique:settings',
            'description'   =>  'sometimes|min:3',
            'price'         =>  'numeric|min:1'
        ]);

        Setting::create($request->except('_token'))->types()->attach($request->type);

        if ($request->get('action') == 'save') {
            return redirect()->route('settings.index')->withSuccess('Setting successfully created!');
        } elseif ($request->get('action') == 'continue') {
            return redirect()->route('settings.create')->withSuccess('Course Successfully created!');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('pages.backend.setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $types = Type::pluck('name','id');
        return view('pages.backend.setting.edit', compact('setting','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        if ( $this->checkSlug(str_slug($request->name)) ) {
            $request->request->add(['slug' => str_slug($request->name).' '.str_random(5)]);
        }else {
            $request->request->add(['slug' => str_slug($request->name)]);
        }

        $request->request->add(['slug' => str_slug($request->name)]);

        $request->validate([
            'name'          =>  'required|min:3',
            'description'   =>  'sometimes|min:3',
            'price'         =>  'numeric|min:1'
        ]);

        $setting->update($request->except('_token'));

        $setting->types()->sync($request->type);

        

        return redirect()->route('settings.index')->withSuccess('Setting successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route('settings.index')->withSuccess('Setting successfully deleted!');
    }
}
