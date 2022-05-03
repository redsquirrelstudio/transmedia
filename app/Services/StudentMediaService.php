<?php

namespace App\Services;

use App\Models\StudentMedia;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class StudentMediaService
{
    public function save(UploadedFile $file, string $description)
    {
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads',   date("d_m_h").$filename);
        Storage::setVisibility($path, 'public');
        $media = new StudentMedia([
            'description' => $description,
            'file_name' => $filename,
            'file_url' => Storage::url($path),
        ]);
        $media->save();
        return $media->id;
    }

    public function delete(int $media_id)
    {
        $media = StudentMedia::find($media_id);
        if (Storage::exists(str_replace(env('APP_URL').'/', '', $media->file_url))){
            Storage::delete(str_replace(env('APP_URL').'/', '', $media->file_url));
        }
        $media->delete();
    }
}
