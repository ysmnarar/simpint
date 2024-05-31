<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $like = new Like();
        $like->customer_id = auth()->id();
        $like->product_id = $request->product_id;
        $like->save();

        return response()->json(['success' => true]);
    }
}
