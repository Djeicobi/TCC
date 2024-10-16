<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Storage;
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

        // Folder creation
        Storage::makeDirectory("album_{$event -> id}");

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

    public function photo_store(StoreEventRequest $request, $id)
    {
        //implementar forEach??
        $event = Event::find($id);
        //$event_id = $id;

        if (!$event) {
            return Redirect::route('events.index')->with('error', 'Evento não encontrado!');
        }

        $photo = new Photo;

        $photo->event_id = $event->id;
        $photo->created_at = now();

        // Image Upload
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestFoto = $request->foto;

            $extension = $requestFoto->extension();

            $fotoName = md5($requestFoto->getClientOriginalName() . strtotime("now")) . "." .$extension;

            Storage::putFileAs("album_{$event -> id}", $requestFoto, $fotoName);
            //$request->foto->move("\storage\app\album_{$event->id}", $fotoName);

            $photo->foto = $fotoName;
        }

    $photo->save();

        return Redirect::route('events.index')->with('msg','Evento criado com sucesso!');


    }
    public function list_photos($id, $event){

    $path = ("storage/app/album_" . $id);

    if (File::exists($path)) {

        $files = File::files($path);

        return view('event.page', ['files' => $files, 'event_id' => $id]);
    } else {

        return redirect()->back()->with('error', 'Nenhuma foto encontrada para este evento.');
    }
}

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function add($id)
    {
        $event = Event::findOrFail($id);
        return view('events.add', ['event' => $event]);
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
        Storage::deleteDirectory("album_{$id}");

        return Redirect::route('events.index')->with('msg','Evento deletado com sucesso!');
    }

}
