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
        //
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

         $current_url =  $_SERVER['HTTP_REFERER'];
         dd($_SERVER['HTTP_REFERER']);

         $partes = explode('/', $current_url);

        $event_id = end($partes);

        //$event = Event::find($request->input ("event_id"));  $_server['HTTP_REFFER']
        //$event = Event::find($id);
        dd($event_id);
        $photo = new Photo;

        $photo->id;

        session_start();
        //$event_id = $_SESSION['id_album'];
        $photo->$event_id;
        $photo->photo_price = $request->photo_price;
        $photo->created_at;

        dd($event_id,);

        // Image Upload
        $file = $request->file("fotos");
        Storage::putFile("album_{$event_id -> id}", $file );

        $photo->save();
        return Redirect::route('events.index', ['event_id' => $event_id])->with('msg','Evento criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
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

