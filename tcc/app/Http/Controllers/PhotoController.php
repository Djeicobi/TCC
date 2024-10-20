<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Event;
use App\Http\Requests\StorePhotoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('page', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        $images = Storage::disk('public')->allFiles("album_{$photo -> event_id}");

        return (['images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
   }

