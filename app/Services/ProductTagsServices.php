<?php

namespace App\Services;

use App\VendorTags;
use App\Tags;
use App\ProizvodiTags;
use App\ProductTags;
use App\ProizvodKategorija;
use App\ProizvodiSlike as Slike;
use App\Vendors;

use DB;

class ProductTagsServices
{   
    public function allProductTags(){
        $product_tags = ProductTags::all();
        
        foreach($product_tags as $tag){
            $tag->{'count'} .= ProizvodiTags::where('tag_id', $tag->id)->count();
        }

        return $product_tags;
    }

    static function createTag($new_tag){
        $tag = new ProductTags();

        $tag->naziv = $new_tag;

        $tag->save();

        return $tag->id;
    }

    public function destroyProductTag($id){
        ProductTags::where('id', $id)->delete();
    }

    public function storeProductTags($tag_id, $product_id){
        $product_tags = new ProizvodiTags();
        $product_tags->proizvod_id = $product_id;
        $product_tags->tag_id = $tag_id;

        $product_tags->save();
    }

    public function productTags($id){
        $product_tags = ProizvodiTags::where('proizvod_id', $id)->get();

        return $product_tags;
    }

    static function deleteProductTags($id){
        ProizvodiTags::where('proizvod_id', $id)->delete();
    }

    public function getCategoryProductTags($category = 0){
        if($category == 0){
            $product_tags = ProductTags::all();

            foreach($product_tags as $tag){
                $tag->{'count'} .= ProizvodiTags::where('tag_id', $tag->id)->count();
            }

            return $product_tags;
        }else{
            $product_tags = ProductTags::all();

            foreach($product_tags as $tag){

                $tag_id = $tag->id;

                $tag->{'count'} .= DB::table('proizvod_kategorija')
                                        ->join('proizvodi_tags', function ($join) use ($category, $tag_id){
                                        $join->on('proizvodi_tags.proizvod_id', '=', 'proizvod_kategorija.id_proizvoda')
                                            ->where('proizvod_kategorija.id_kategorije', '=', $category)
                                            ->where('proizvodi_tags.tag_id', '=', $tag_id);
                                        })
                                        ->count();
            }
            
            return $product_tags;
        }
    }

    public function getProductsByTag($tag_id){
        $products = DB::table('proizvodi_tags')
                        ->join('proizvodi', function ($join) use ($tag_id){
                            $join->on('proizvodi_tags.proizvod_id', '=', 'proizvodi.id')
                                ->where('proizvodi_tags.tag_id', '=', $tag_id);
                            })
                        ->select('proizvodi.*')
                        ->get();

        foreach($products as $product){
            $slika = Slike::where('id_proizvoda', $product->id)->first();
            $vendor = Vendors::where('id', $product->vendor_id)->first();

            @$product->{"slika"} = $slika->slika;
            @$product->{"vendor"} = base64_decode($vendor->naziv);
            @$product->{"id_vendora"} = $vendor->id;
        }

        return $products;
    }

    public function getTag($id){
        return ProductTags::where('id', $id)->first();
    }
}