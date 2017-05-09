<?php

namespace App\Managers;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

abstract class Manager
{
    use DispatchesJobs;

    /**
     * Move an uploaded file a file.
     *
     * @param  string  $path
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $default
     * @return string|null
     */
    protected function uploadFile($path, UploadedFile $file = null, $default = '')
    {
        if ($file && $file->isValid()) {
            $fileName = time() . '.' . $file->extension();

            $file->move($path, $fileName);

            return $fileName;
        }

        return $default;
    }
}
