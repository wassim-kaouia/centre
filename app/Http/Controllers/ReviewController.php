<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'content' => 'required|string',
            'stars'   => 'numeric|between:1,5',
         ]);

        
         $review = new Review();

         $review->content = $request->content;
         $review->stars   = $request->stars;
         
         $review->course_id = $request->course_id;
         $review->user_id   = $request->user_id;

         $review->save();

         session()->flash('success','Votre commentaire est bien ajouté ! On vous remercie pour votre participation.');

         return redirect()->back();
    }

}
