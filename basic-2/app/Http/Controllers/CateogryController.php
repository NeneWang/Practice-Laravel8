<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CateogryController extends Controller
{
    public function AllCat()
    {
        return view('admin.category.index');
    }

    public function AddCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'body' => 'required',
        ], [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less than 255 chars'
        ]);

        Category::insert([
            'category_name'=> $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);

    }
}
