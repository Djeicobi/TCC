<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('events.list', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = new Event;

        $event->id;
        $event->name = $request->name;
        $event->photo_price = $request->photo_price;
        $event->created_at;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $event->save();

        return Redirect::route('events.index')->with('msg','Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show');
    }

    public function page($id)
    {
        $event = Event::findOrFail($id);
        return view('events.page', ['event' => $event] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(UpdateEventRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);

        return Redirect::route('events.index')->with('msg','Evento editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return Redirect::route('events.index')->with('msg','Evento deletado com sucesso!');
    }

}
