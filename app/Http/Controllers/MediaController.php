<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{

    public function destroy(Media $media)
    {
        $media->delete();

        flash()->success("Anexo apagado.");

        return back();
    }

}
