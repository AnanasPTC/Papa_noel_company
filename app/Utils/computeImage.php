<?php

use Illuminate\Http\UploadedFile;

function computeFilename(UploadedFile $file): string
{
    $filenameWithExt = $file->getClientOriginalName();
    $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $filename = $filenameWithExt . '_' . time() . '.' . $extension;

    return $filename;
}
