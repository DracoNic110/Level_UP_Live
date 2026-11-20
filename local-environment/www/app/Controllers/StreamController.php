<?php

namespace App\Controllers;

class StreamController extends BaseController
{
    public function index()
    {
        return view('streams/index', [
            'pageTitle' => 'Live Streams | Level Up Live'
        ]);
    }

    public function watch($id)
    {
        return view('streams/player', [
            'pageTitle' => 'Watch Stream | Level Up Live',
            'streamId' => $id
        ]);
    }
}
