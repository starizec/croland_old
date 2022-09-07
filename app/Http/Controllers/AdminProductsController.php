<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\StoreServices;
use App\Services\ProductTagsServices;

use App\Vendors;
use App\ProizvodiKategorije;
use App\ProizvodKategorija;
use App\ProizvodiSlike;
use App\Proizvodi;

class AdminProductsController extends Controller
{
    public function displayAllProducts(){
        $products = new StoreServices();
        $products = $products->DisplayProducts(0);

        return view('admin.products')->with('products', $products);
    }

    public function editProduct($id){
        $product = new StoreServices();
        $product = $product->displayProduct($id);

        $tags = new ProductTagsServices();
        $all_tags = $tags->allProductTags();

        $product_tags = $tags->productTags($id);

        $vendors = Vendors::all();
        $categories = ProizvodiKategorije::all();

        return view('admin.product_edit')->with('product', $product)
                                         ->with('vendors', $vendors)
                                         ->with('categories', $categories)
                                         ->with('tags', $all_tags)
                                         ->with('product_tags', $product_tags);
    }

    public function updateProduct(request $request){
        $product = new Proizvodi();
        $product = $product->find($request->input('product_id'));

        $product->update([
            "naziv" => $request->input('naziv'),
            "opis" => $request->input('opis'),
            "cijena" => $request->input('cijena'),
            "cijena_popust" => $request->input('cijena_popust'),
            "vendor_id" => $request->input('vendor_id'),
        ]);
        
        if($request->hasfile('slike')){
            foreach($request->slike as $image){
                $slika = new ProizvodiSlike();

                $slika->id_proizvoda = $request->input('product_id');
                
                if($image){
                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $path = public_path().'/uploads/';
                    $file->move($path, $filename);
        
                    $slika->slika = $filename;

                    $slika->save();
                }
            }
        }

        if(!empty($request->input('kategorija'))){
            ProizvodKategorija::where('id_proizvoda', $request->input('product_id'))->delete();

            foreach($request->input('kategorija') as $cat){
                $product_category = new ProizvodKategorija(); 

                $product_category->id_proizvoda = $request->input('product_id');
                $product_category->id_kategorije = $cat;
                $product_category->save();
            }

        }

        if(!empty($request->input('oznake'))){
            $tags = new ProductTagsServices();
            $tags::deleteProductTags($request->input('product_id'));

            foreach($request->input('oznake') as $tag){
                $tags->storeProductTags($tag, $request->input('product_id'));
            }

        }

        return redirect("/".$request->input('return_path'));
    }

    public function deleteImage(request $request){
        ProizvodiSlike::where('id', $request->input('img_id'))->delete();

        return redirect("/".$request->input('return_path'));
    }
}
