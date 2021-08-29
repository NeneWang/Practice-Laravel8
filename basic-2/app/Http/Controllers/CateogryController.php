<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateogryController extends Controller
{
    public function AllCat()
    {
        return view('admin.category.index');
    }

    public function AddCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:posts|max:255',
            'body' => 'required',
        ], [
            'category_name.required' => 'Please Input Category Name',
        ]);
    }
}
