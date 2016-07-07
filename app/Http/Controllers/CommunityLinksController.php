<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use App\Http\Requests;

class CommunityLinksController extends Controller
{
    /**
     * Display Community Links
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $links = CommunityLink::paginate(25);

        return view('community.index', compact('links'));
    }
}
