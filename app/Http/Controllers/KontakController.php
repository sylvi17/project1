<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
     public function kontak(){
        $data=[
            'wasap'=>'085878579288',
            'ig'=>'syylvna',
            'git'=>'sylvianajelita',
            'title'=>'Kontak'
        ];
        return view ('kontak', $data);
    }
}
