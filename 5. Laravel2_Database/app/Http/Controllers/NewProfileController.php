<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if(Auth::check()) {
        $myName = "Putri Deswicyntari Islami"; 
        $myBirthdate = date('2003-12-12', strtotime("12 Desember 2003"));
       
        $myAddress = "Surabaya"; 

        $myProfile = Profile::where('user_id', Auth::user()->id)->first();

        if(!$myProfile){
            $myProfile = new Profile();
            $myProfile->name = $myName; 
            $myProfile->birthdate = $myBirthdate; 
            $myProfile->birthplace = 'Surabaya';
            $myProfile->address = $myAddress;
            $myProfile->user_id = Auth::user()->id;
            $myProfile->save(); 
        }

        return view('myprofile', compact('myProfile')); 
    } else {
        return redirect()->route('login');
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
