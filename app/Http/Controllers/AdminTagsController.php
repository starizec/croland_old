<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProductTagsServices;

class AdminTagsController extends Controller
{
    public function index(){
        $tags = new ProductTagsServices();
        $tags = $tags->allProductTags();

        return view('admin.product_tags')->with('tags', $tags);
    }

    public function store(request $request){   
        ProductTagsServices::createTag($request->naziv);

        return redirect('/admin/proizvod/oznake');
    }

    public function destroy($id){
        $tag = new ProductTagsServices();

        $tag->destroyProductTag($id);

        return redirect('/admin/proizvod/oznake');
    }
}
