<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use App\Services\ProductTagsServices;
use App\ProizvodiKategorije;

class TagsController extends Controller
{
    public function index(){
        $oznake = new Tags();
        $oznake = $oznake->all();

        return view('admin.vendor_oznake')->with('oznake', $oznake);
    }

    public function storeTag(request $request){
        $oznaka = new Tags();
        $oznaka->naziv = $request->input('naziv');
        $oznaka->save();

        return redirect('/admin/vendor/oznake');
    }

    public function deleteTag($id){
        $oznaka = new Tags();
        $oznaka = $oznaka->where('id', $id)->delete();

        return redirect('/admin/vendor/oznake');
    }

    public function displayProductsByTag($id){
        $tags = new ProductTagsServices();
        $products = $tags->getProductsByTag($id);

        $all_tags = $tags->allProductTags();

        $tag_name = $tags->getTag($id);
        $tag_name = 'Proizvodi s oznakom: <span style="color: #fb6107">'.$tag_name->naziv.'</span>';

        $all_categories = ProizvodiKategorije::all();

        return view('frontend.shop')->with('products', $products)
                                    ->with('categories', $all_categories)
                                    ->with('tags', $all_tags)
                                    ->with('category_name', $tag_name);
    }
}
