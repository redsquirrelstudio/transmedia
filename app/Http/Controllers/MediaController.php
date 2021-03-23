<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function save(Request $request): Response
    {
        $request->validate([
            'image' => 'required',
            'description' => 'required'
        ]);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = $request->file('image')->storeAs('uploads',   date("d_m_h").$filename);

        $media = new Media([
           'description' => $request->get('description'),
           'file_name' => $filename,
           'file_url' => url($path),
        ]);
        $media->save();

        return response([
           'media_id' => $media->id
        ]);
    }

    public function get(int $id): string
    {
        return Media::find($id)->file_url;
    }
}
