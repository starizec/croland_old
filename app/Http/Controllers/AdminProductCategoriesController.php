<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProizvodiKategorije;

class AdminProductCategoriesController extends Controller
{
    public function allCategories(){
        $categories = ProizvodiKategorije::all();

        return view('admin.product_categories')->with('categories', $categories);
    }

    public function storeNewProductCategory(request $request){
        $new_category = new ProizvodiKategorije();

        $new_category->naziv = $request->input('naziv');

        if($request->hasFile('category_image')){
            $file = $request->file('category_image');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/images/';
            $file->move($path, $filename);

            $new_category->image = $filename;
        }else{
            $new_category->image = 'default.jpg';
        }

        $new_category->save();

        return redirect('/admin/proizvod/kategorije/sve');
    }
}
