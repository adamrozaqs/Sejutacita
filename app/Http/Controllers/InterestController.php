<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    
    public function index()
    {
        $interests = Interest::all();
        return view('pages.interests.index')->with([
            'interests' => $interests
        ]);
    }

    public function create()
    {
        return view('pages.interests.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Interest::create($data);
        return redirect()->route('interest.index');
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();

        return redirect()->route('interest.index');
    }
}
