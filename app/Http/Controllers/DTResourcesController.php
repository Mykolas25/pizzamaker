<?php

namespace App\Http\Controllers;

use App\models\DTResources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DTResourcesController extends Controller
{

    public function upload (UploadedFile $file)
    {
        $data =
        [
            "size" => $file->getSize(),
            "mime_type" => $file->getMimeType()
        ];

        $path = 'upload/' . date("Y/m/d");
        $filename =Carbon::now()->timestamp . '_' .$file->getClientOriginalName();

        $file->move(public_path($path),$filename);

        $data['path'] = $path . $filename;

       return DTResources::create($data);
    }

}
