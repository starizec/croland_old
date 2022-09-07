<?php

namespace App\Services;

use App\Proizvodi;
use App\ProizvodiSlike as Slike;
use App\Vendors;
use App\ProizvodKategorija;
use App\ProizvodiKategorije;

class StoreServices
{
    public function DisplayProducts($category_id, $sort_by = 'id'){
        if($category_id == 0){

            if($sort_by == "najskuplje"){
                $proizvodi = Proizvodi::all()->sortByDesc("cijena");
            }elseif($sort_by == "najjeftinije"){
                $proizvodi = Proizvodi::all()->sortBy("cijena");
            }else{
                $proizvodi = Proizvodi::all()->sortByDesc("id");
            }
            

            foreach($proizvodi as $proizvod){
                @$slika = Slike::where('id_proizvoda', $proizvod->id)->first();
                @$vendor = Vendors::where('id', $proizvod->vendor_id)->first();

                @$proizvod->{"slika"} .= $slika->slika;
                @$proizvod->{"vendor"} .= base64_decode($vendor->naziv);
                @$proizvod->{"id_vendora"} .= $vendor->id;
            }

            return $proizvodi;
            
        }else{
            $categories = ProizvodKategorija::where('id_kategorije', $category_id)->get();
            $products = [];

            foreach($categories as $cat){
                $products[] = Proizvodi::where('id', $cat->id_proizvoda)->first();
            }

            foreach($products as $product){
                @$slika = Slike::where('id_proizvoda', $product->id)->first();
                @$vendor = Vendors::where('id', $product->vendor_id)->first();

                @$product->{"slika"} = $slika->slika;
                @$product->{"vendor"} = base64_decode($vendor->naziv);
                @$product->{"id_vendora"} = $vendor->id;
            }
            
            if($sort_by == "najskuplje"){

                usort($products, function ($a, $b) {
                    if ($b["cijena"] == $a["cijena"]) return 0;
                    return $b["cijena"] < $a["cijena"] ? -1 : 1;
                });

                return $products;

            }elseif($sort_by == "najjeftinije"){
                usort($products, function ($a, $b) {
                    if ($b["cijena"] == $a["cijena"]) return 0;
                    return $b["cijena"] > $a["cijena"] ? -1 : 1;
                });

                return $products;
            }else{
                return $products;
            }
        }
    }

    public function displaySellersProducts($seller_id){
        $proizvodi = Proizvodi::where('vendor_id', $seller_id)->get();

        foreach($proizvodi as $proizvod){
            $slika = Slike::where('id_proizvoda', $proizvod->id)->first();
            $vendor = Vendors::where('id', $proizvod->vendor_id)->first();

            @$proizvod->{"slika"} = $slika->slika;
            @$proizvod->{"vendor"} = base64_decode($vendor->naziv);
            @$proizvod->{"id_vendora"} = $vendor->id;
        }

        return $proizvodi;
    }

    public function categoryName($category_id){
        $category_name = ProizvodiKategorije::where('id', $category_id)->first();

        return $category_name;
    }

    public function allCategories(){
        return ProizvodiKategorije::all();
    }

    public function displayProduct($id){
        $product = Proizvodi::where('id', $id)->first();

        $product_categories = ProizvodKategorija::where('id_proizvoda', $id)->get();
        $product->{"categories"} = $product_categories;

        $product_images = Slike::where('id_proizvoda', $id)->get();
        $product->{"images"} = $product_images;

        $product_vendor = Vendors::where('id', $product->vendor_id)->first();
        $product->{"vendor"} = $product_vendor;

        return $product;
    }

    public function updateProductVendor($old_vendor_id, $new_vendor_id){
        $product = new Proizvodi();
        $product = $product->find($old_vendor_id);

        $product->update([
            "vendor_id" => $new_vendor_id
        ]);
    }

    public function getCartProducts($products_ids){
        $products_ids = array_keys($products_ids);

        foreach($products_ids as $product_id){
            $products[] = Proizvodi::where('id', $product_id)->first();
        }

        $vendors = [];

        foreach($products as $product){
            if(array_key_exists($product->vendor_id, $vendors)){
                $vendors[$product->vendor_id][] = $product;
            }else{
                $vendors[$product->vendor_id][] = json_decode(json_encode($product), true);
            }
        }

        $products_by_vendor = [];

        foreach($vendors as $vendor_id => $products){
            $products_by_vendor[$vendor_id]['vendor'] = Vendors::where('id', $vendor_id)->first();
            $products_by_vendor[$vendor_id]['products'] = $products; 
        }

        foreach($products_by_vendor as $vendor){
            foreach($vendor['products'] as $product){
                $product_image = Slike::where('id_proizvoda', $product['id'])->first();
                $product['image'] = $product_image->slika;
            }
        }

        return $products_by_vendor;
    }
}