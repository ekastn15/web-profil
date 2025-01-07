<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;


class VideoController extends Controller{

    public function index()
    {
        return view('video.index',[
            'video'=>Video::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function add()
    {
        return view('video.insert');

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'judul_video'=>'required',
            'embed_video'=>'required',
        ]);

        Video::create
        ([
            'judul_video'=>$request->judul_video,
            'embed_video'=>$request->embed_video,
        ]);
        return redirect()->route('video')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_video)
    {
        $video = Video::findOrFail($id_video);
        return view('video.edit', compact('video'));
    }

    // Method untuk memperbarui data 
    public function update(Request $request, $id_video) 
    {
        $request->validate
        ([
            'judul_video'=>'required',
            'embed_video'=>'required',
        ]);

        $video = Video::findOrFail($id_video);
        $video->update([
            'judul_video'=>$request->judul_video,
            'embed_video'=>$request->embed_video,
        ]);

        return redirect()->route('video')->with('message', 'Data Berhasil Diperbarui');
    }
}