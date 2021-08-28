<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUpload
{
    /**
     * Upload file from temporary storage
     *
     * @param array $files
     * @param string $name
     * @param string $location
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    protected function saveFile(array $files, string $name, string $location, Model $model)
    {
        foreach ($files as $file) {
            $name = Str::slug($name);
            $format = Str::afterLast($file, '.');

            $storage = Storage::putFile(
                "public/{$location}/{$name}",
                storage_path('app/' . $file)
            );

            $path = Storage::url($storage);

            $nama = new File();
            $nama->fill([
                'name'      => $name,
                'mime_type' => Storage::mimeType($storage),
                'format'    => $format,
                'size'      => Storage::size($storage),
                'path'      => $path,
                'url'       => asset($path),
            ]);

            $nama->fileable()->associate($model);
            $nama->save();

            Storage::disk('local')->delete($file);
        }
    }
}
