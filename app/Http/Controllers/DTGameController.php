<?php

namespace App\Http\Controllers;

use App\models\DTUsersResourcesConnections;
use App\models\DTUsersRolesConnections;
use Illuminate\Http\Request;
use App\models\DTResources;

class DTGameController extends Controller
{
    public function gameShow()
    {
//        $config["resources"] = DTResources::get()->toArray();
        return view('front-end.game');
    }

//    public function create()
//    {
////        $data = request()->all();
//
//
////        DTResourcesController::create([
//////            'mime_type' => $data['mime_type'],
////            'path' => $data['path'],
//////            'width' => $data['width'],
//////            'height' => $data['height'],
//////            'size' => $data['size'],
////        ]);
//
////        $config['auth']= (auth()->user());
////        return view('front-end.game', $config);
//
//    }

    protected function store(array $data = null )
    {
        $resource = request()->file('image');

        $uploadController = new DTResourcesController();
        $record = $uploadController->upload($resource);

        DTUsersResourcesConnections::create([
           "users_id"=>auth()->user()->id,
            "resources_id"=> $record->id
        ]);


    }


}
