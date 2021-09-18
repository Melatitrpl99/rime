<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUpload
{
    /**
     * Upload file from temporary storage.
     *
     * @param array $files
     * @param string $name
     * @param string $location
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    protected function saveFile($files, string $name, string $location, Model $model)
    {
        foreach ($files as $f) {
            $n = Str::slug($name);
            $format = Str::afterLast($f, '.');

            $storage = Storage::putFile(
                "public/{$location}/{$name}",
                storage_path('app/' . $f)
            );

            $path = Storage::url($storage);

            $file = new File();
            $file->fill([
                'name'      => $name,
                'mime_type' => Storage::mimeType($storage),
                'format'    => $format,
                'size'      => Storage::size($storage),
                'path'      => $path,
                'url'       => asset($path),
            ]);

            $file->fileable()->associate($model);
            $file->save();

            Storage::disk('local')->delete($f);
        }
    }
}
