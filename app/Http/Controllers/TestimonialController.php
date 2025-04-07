<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Testimonial;


class TestimonialController extends Controller
{
    /**
     * Check if current user is admin.
     *
     * @return Boolean true/false
     */
    private function GetIsAdmin()
    {
        return Auth::check() && Auth::user()->usertype === "admin";
    }
    

    /**
     * Display a listing of the testimonial entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = testimonial::all();
        $user = Auth::id() ? Auth::user() : null;
        $isAdmin = $this->GetIsAdmin();
        return view("admin.pages.review.review", compact("data", "isAdmin", "user"));
    }

    /**
     * Show the form for creating a new testimonial entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::id() ? Auth::user() : null;
        $isAdmin = $this->GetIsAdmin();
        return view("admin.pages.review.createreview", compact("user", "isAdmin"));
    }

    /**
     * Store a newly created testimonial entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isAdmin = $this->GetIsAdmin();
        if ($isAdmin === false) { // Only admins can create
            $data = new Testimonial;
    
            // Handle image upload
            $image = $request->reviewimage;
            $imagename = time() . "." . $image->getClientOriginalExtension();
            $imagepath = 'assets/images/testimonialimage';
            $request->reviewimage->move($imagepath, $imagename);
            $data->img = $imagepath . "/" . $imagename;
    
            // Save testimonial details
            $data->name = $request->reviewname;
            $data->bio = $request->reviewbio;
            $data->review = $request->reviewtext;
            $data->rating = $request->reviewrating;
    
            $data->save();
    
            return redirect()->route('testimonial.index')->with('msg', 'New testimonial entry created');
        }
    
        // Redirect if the user is not an admin
        return redirect()->route('testimonial.index')->with('msg', "Only admins can create testimonials.");
    }
    

    /**
     * Display the specified testimonial entry.
     *
     * @param  $testimonial->id
     * @return \Illuminate\Http\Response
     */
    public function show($testimonial)
    {
        //
    }
    
    /**
     * Show the form for editing the specified testimonial entry.
     *
     * @param  $testimonial->id
     * @return \Illuminate\Http\Response
     */
    public function edit($testimonial)
    {
        $data = testimonial::findOrFail($testimonial);
        $user = Auth::id() ? Auth::user() : null;
        $isAdmin = $this->GetIsAdmin();
        return view("admin.pages.review.editreview", compact("data", "user", "isAdmin"));
    }

    /**
     * Update the specified testimonial entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $testimonial->id
     * @return \Illuminate\Http\Response
     */
    public function update($testimonial, Request $request)
    {
        $isAdmin = $this->GetIsAdmin();
        if ($isAdmin === true) {
            $data = testimonial::findOrFail($testimonial);
    
            $image = $request->reviewimage;
            if ($image) {
                $imagename = time() . "." . $image->getClientOriginalExtension();
                $imagepath = 'assets/images/testimonialimage';
                $request->reviewimage->move($imagepath, $imagename);
                $data->img = $imagepath . "/" . $imagename;
            }
    
            $data->name = $request->reviewname;
            $data->bio = $request->reviewbio;
            $data->review = $request->reviewtext;
            $data->rating = $request->reviewrating;
    
            $data->save();
    
            return redirect()->route('testimonial.index')->with('msg', 'Testimonial entry edited');
        }
        return redirect()->route('testimonial.index')->with('msg', "Can't edit testimonial");
    }
    

    /**
     * Remove the specified testimonial entry from storage.
     *
     * @param  $testimonial->id
     * @return \Illuminate\Http\Response
     */
    public function destroy($testimonial)
    {
        $isAdmin = $this->GetIsAdmin();
        if ($isAdmin === true) {
            $data = testimonial::findOrFail($testimonial);
            $data->delete();
            return redirect()->back()->with('msg', 'Testimonial entry deleted successfully');
        }
        return redirect()->route('testimonial.index')->with('msg', "Can't delete testimonial entry");
    }    
}
