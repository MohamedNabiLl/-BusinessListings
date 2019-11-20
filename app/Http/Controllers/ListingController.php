<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' =>'email',
        ]);
        $listing = new Listing;
        $listing->name = $request->input('name');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->website = $request->input('website');
        $listing->address = $request->input('address');
       $listing->user_id = auth()->user()->id;
       $listing->save();
       return redirect('/dashboard')->with('success' , 'listing Added');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('editlisting')->with('listing' , $listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' =>'email',
        ]);
        $listing = Listing::find($id);
        $listing->name = $request->input('name');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->website = $request->input('website');
        $listing->address = $request->input('address');
        $listing->user_id = auth()->user()->id;
        $listing->save();
        return redirect('/dashboard')->with('success' , 'listing Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();
        return redirect('/dashboard')->with('success', 'the listing removed successfully');
    }
}
