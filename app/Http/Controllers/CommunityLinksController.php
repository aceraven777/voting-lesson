<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use Illuminate\Http\Request;

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // channel
            'title' => 'required',
            'link' => 'required|active_url',
        ]);

        CommunityLink::from(auth()-> user())
            ->contribute($request->all());

        return back();
    }
}
