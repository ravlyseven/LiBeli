<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//use App\model untuk connect ke model
use App\Event;
use UxWeb\SweetAlert\SweetAlert;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events/index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }
        elseif($request->content == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }
        elseif($request->penyelenggara == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }

        $data = new Event();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->penyelenggara = $request->penyelenggara;
        $data->link = $request->link;
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            
            $photo = $request->file('photo')->store('events', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Create Success', 'Create Events');
        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events/show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events/edit', compact('event'));
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
        if($request->title == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }
        elseif($request->content == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }
        elseif($request->penyelenggara == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }

        
        $data = Event::findOrFail($id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->penyelenggara = $request->penyelenggara;
        $data->link = $request->link;
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            
            if ($data->photo && file_exists(storage_path('app/public/'.$data->photo))) {
                Storage::delete('public', $data->photo);
            }
            $photo = $request->file('photo')->store('events', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Update Success', 'Update Events');
        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        alert()->success('Delete Success', 'Delete Events');
        return redirect('/events')->with('status', 'Data Berhasil Dihapus');
    }
}
