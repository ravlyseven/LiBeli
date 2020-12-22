<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Update;
use UxWeb\SweetAlert\SweetAlert;

class UpdatesController extends Controller
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
        $updates = Update::all();
        return view('updates/index', ['updates' => $updates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('updates/create');
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
        elseif($request->sumber == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return redirect()->back();
        }

        $data = new Update();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->sumber = $request->sumber;
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);

            $photo = $request->file('photo')->store('news', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Create Success', 'Create News');
        return redirect('/updates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        return view('updates/show', compact('update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        return view('updates/edit', compact('update'));
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
        else
        {
            $data = Update::findOrFail($id);
            $data->title = $request->title;
            $data->content = $request->content;
            $data->sumber = $request->sumber;
            if($request->hasFile('photo'))
            {
                $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);

                if ($data->photo && file_exists(storage_path('app/public/'.$data->photo))) {
                    Storage::delete('public', $data->photo);
                }
                $photo = $request->file('photo')->store('news', 'public');
                $data->photo = $photo;
            }
            $data->save();
            alert()->success('Update Success', 'Update News');
            return redirect('updates');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Update $update)
    {
        Update::destroy($update->id);
        alert()->success('Delete Success', 'Delete News');
        return redirect('/updates')->with('status', 'Data Berhasil Dihapus');
    }
}
