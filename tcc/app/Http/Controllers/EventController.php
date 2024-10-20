<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Http\Controllers\PhotoController;
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
    public function all()
    {
        $events = Event::all();

        return view('events.all', ['events' => $events]);
    }

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
        Storage::makeDirectory("public\album_{$event -> id}");

        return Redirect::route('events.index')->with('msg','Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with('photos')->findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function page($id)
    {
        $event = Event::findOrFail($id);
        return view('events.page', ['event' => $event]);
    }

    public function photo_store(StoreEventRequest $request, $id)
{
    $event = Event::find($id);

    if (!$event) {
        return Redirect::route('events.index')->with('error', 'Evento não encontrado!');
    }


    if ($request->hasFile('foto') && is_array($request->foto)) {
        foreach ($request->file('foto') as $foto) {

            if ($foto->isValid()) {
                $photo = new Photo;

                $photo->event_id = $event->id;
                $photo->created_at = now();

                // Upload de imagem
                $extension = $foto->extension();
                $fotoName = md5($foto->getClientOriginalName() . strtotime("now")) . "." . $extension;


                Storage::putFileAs("public\album_{$event -> id}", $foto, $fotoName);


                $photo->foto = $fotoName;


                $photo->save();
            }
        }
    }

    return Redirect::route('events.index')->with('msg', 'Fotos carregadas com sucesso!');
}

    public function list_photos($id, $event){

    $path = ("storage/app/album_{$event -> id}");

    if (File::exists($path)) {

        $files = File::files($path);

        return view('event.page', ['files' => $files, 'event_id' => $id]);
    } else {

        return redirect()->back()->with('error', 'Nenhuma foto encontrada para este evento.');
    }
}
public function listarImagens()
{
    $events = Event::with('fotos')->get();

    return view('events.listarImagens', compact('events'));
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
