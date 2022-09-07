<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proizvodi;
use App\ProizvodiSlike;
use App\ProizvodiKategorije;
use App\ProizvodKategorija;
use App\Vendors;

use App\Mail\OrderReceivedSeller;
use App\Mail\OrderReceivedBuyer;
use Mail;

use App\Services\StoreServices;
use App\Services\OrdersServices;
use App\Services\ProductTagsServices;

class TrgovinaController extends Controller
{   
    //admin
    public function dodajNoviProizvod($id_vendora){
        $kategorije_proizvoda = new ProizvodiKategorije();
        $kategorije_proizvoda = $kategorije_proizvoda->all();

        $tags = new ProductTagsServices();
        $tags = $tags->allProductTags();

        $vendori = new Vendors();
        $vendori = $vendori->all();

        return view('admin.proizvod')->with('kategorije', $kategorije_proizvoda)
                                     ->with('id_vendora', $id_vendora)
                                     ->with('vendori', $vendori)
                                     ->with('tags', $tags);
    }

    public function storeProizvod(request $request){
        $proizvod = new Proizvodi();

        $proizvod->naziv = $request->input('naziv');
        $proizvod->cijena = (float)$request->input('cijena');
        $proizvod->cijena_popust = (float)$request->input('cijena_popust');

        $proizvod->opis = $request->input('opis');

        $proizvod->vendor_id = $request->input('vendor_id');

        $proizvod->crated_by_id = 1;
        $proizvod->status_id = 1;

        $proizvod->save();

        $this->storeGallery($request->file('slike'), $proizvod->id);

        if(!empty($request->input('nova_kategorija'))){
            $this->storeProizvodiKategorije($request->input('nova_kategorija'), $proizvod->id);
        }else{
            $this->storeProizvodiKategorijeCheckmark($request->input('kategorija'), $proizvod->id);
        }

        if(!empty($request->input('new_tag'))){
            $tags = new ProductTagsServices();
            $tag = $tags->createTag($request->input('new_tag'));
            
            $tags->storeProductTags($tag, $proizvod->id);
        }else{
            foreach($request->input('oznake') as $oznaka){
                $tags = new ProductTagsServices();
                $tags->storeProductTags($oznaka, $proizvod->id);
            }
        }


        return redirect("/admin/proizvod/$request->input('vendor_id')");
    }

    public function storeGallery($images, $id_proizvoda){
        
        foreach($images as $image){
            $slika = new ProizvodiSlike();

            $slika->id_proizvoda = $id_proizvoda;
            
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

    public function storeProizvodiKategorije($kategorije, $id_proizvoda){
        $kategorija = explode(',', $kategorije);

        foreach($kategorija as $kat){
            $kategorije_proizvoda = new ProizvodiKategorije();
            $kategorija_proizvoda = new ProizvodKategorija();

            $kategorije_proizvoda->naziv = $kat;
            $kategorije_proizvoda->save();

            $kategorija_proizvoda->id_proizvoda = $id_proizvoda;
            $kategorija_proizvoda->id_kategorije = $kategorije_proizvoda->id;
            $kategorija_proizvoda->save();
        }
    }

    public function storeProizvodiKategorijeCheckmark($checkmark, $id_proizvoda){
        foreach($checkmark as $check){
            $kategorija_proizvoda = new ProizvodKategorija();

            $kategorija_proizvoda->id_proizvoda = $id_proizvoda;
            $kategorija_proizvoda->id_kategorije = $check;
            $kategorija_proizvoda->save();
        }
    }


    //frontend
    public function showProizvod($id){
        $proizvod = new Proizvodi();
        $proizvod = $proizvod->where('id', $id)->get();

        $galerija = new ProizvodiSlike();
        $galerija = $galerija->where('id_proizvoda', $id)->get();

        $kategorija = new ProizvodKategorija();
        $kategorija = $kategorija->where('id_proizvoda', $id)->get();

        $kategorije = new ProizvodiKategorije();
        $kategorije = $kategorije->all();

        $prodaje = new Vendors();
        $prodaje = $prodaje->where('id', $proizvod[0]->vendor_id)->get();

        $products_ser = new StoreServices();

        $display_products = $products_ser->DisplayProducts($kategorija[0]->id_kategorije, 'zadano');

        $display_seller_products = $products_ser->displaySellersProducts($prodaje[0]->id);

        return view('frontend.proizvod')->with('proizvod', $proizvod[0])
                                        ->with('galerija', $galerija)
                                        ->with('kategorija', $kategorija)
                                        ->with('kategorije', $kategorije)
                                        ->with('prodaje', $prodaje[0])
                                        ->with('products', $display_products)
                                        ->with('seller_products', $display_seller_products);
    }

    public function addToCart(request $request){
        $kolicina = $request->input('kolicina');
        $id_proizvoda = $request->input('id_proizvoda');

        $novi_proizvod = array($id_proizvoda => $kolicina);

        if(empty(session()->get('kosarica'))){
            $kosarica = array($id_proizvoda => $kolicina);

            session()->put('kosarica', $kosarica);
        }else{
            $stara_kosarica = session()->get('kosarica');

            if(array_key_exists($id_proizvoda, $stara_kosarica)){
                $nova_kolicina = $stara_kosarica[$id_proizvoda] + $kolicina;
                $zamjena = array($id_proizvoda => $nova_kolicina);
                $nova_kosarica = array_replace($stara_kosarica, $zamjena);

                session()->forget('kosarica');

                session()->put('kosarica', $nova_kosarica);
            }else{
                $novi_proizvod = array($id_proizvoda => $kolicina);

                $nova_kosarica = $novi_proizvod + $stara_kosarica;

                session()->forget('kosarica');

                session()->put('kosarica', $nova_kosarica);
            }
        }

        return redirect($request->input('return_url'));
    }

    public function updateCart(){

    }

    public function deleteKosarica(){
        session()->forget('kosarica');

        return redirect('/');
    }

    public function showKosarica(){
        $ids = array_keys(session()->get('kosarica'));

        $proizvodi       = [];
        $slike_proizvoda = [];

        foreach($ids as $key => $id){
            $proizvod = Proizvodi::where('id', $id)->get();
            $proizvodi[] = $proizvod;

            $slike_proizvoda = ProizvodiSlike::where('id_proizvoda', $id)->get();

            $slika_proizvoda[] = $slike_proizvoda;
        }

        return view('frontend.kosarica')->with('proizvodi', $proizvodi)
                                        ->with('kosarica', session()->get('kosarica'))
                                        ->with('slike_proizvoda', $slika_proizvoda);
    }

    public function showPlacanje(){
        $ids = array_keys(session()->get('kosarica'));

        $proizvodi       = [];
        $slike_proizvoda = [];

        foreach($ids as $key => $id){
            $proizvod = Proizvodi::where('id', $id)->get();
            $proizvodi[] = $proizvod;

            $slike_proizvoda = ProizvodiSlike::where('id', $id)->get();;
            $slika_proizvoda[] = $slike_proizvoda;
        }
        
        return view('frontend.placanje')->with('proizvodi', $proizvodi)
                                        ->with('kosarica', session()->get('kosarica'))
                                        ->with('slike_proizvoda', $slika_proizvoda);
    }

    public function shop($id_kategorije, $sort_by = 'zadano'){
        $display_products = new StoreServices();
        $display_products = $display_products->DisplayProducts($id_kategorije, $sort_by);

        $tags = new ProductTagsServices();
        $all_tags = $tags->getCategoryProductTags($id_kategorije);

        if($id_kategorije == 0){
            $category_name = 'Svi proizvodi';
        }elseif($id_kategorije != 0){
            $category = new StoreServices();
            $category = $category->categoryName($id_kategorije);

            $category_name = 'Proizvodi iz kategorije: <span style="color: #fb6107">'.$category->naziv.'</span>';
        }

        $all_categories = ProizvodiKategorije::orderBy('updated_at')->get();

        return view('frontend.shop')->with('products', $display_products)
                                    ->with('category_name', $category_name)
                                    ->with('category_id', $id_kategorije)
                                    ->with('categories', $all_categories)
                                    ->with('tags', $all_tags);
    }

    public function order(request $request){
        $cart = serialize(session()->get('kosarica'));
        $buyer = $request;

        $order = new OrdersServices();
        $order->makeOrder($buyer, $cart);

        $this->deleteKosarica();
        
        
        return redirect("/narudjba-zaprimljena/$order->order_id");
    }

    public function orderReceived($id){
        $order = new OrdersServices();
        $order = $order->getOrder($id);
        $order = $order[0];

        $order_products = new StoreServices();
        $order_products = $order_products->getCartProducts(unserialize($order->proizvodi_ids));

        //send email to sellers
        foreach($order_products as $vendor){
            Mail::to($vendor['vendor']->email)->send(new OrderReceivedSeller($order, $vendor));
        }

        $buyer_email[] = $order->email;
        $buyer_email[] = 'info@croland.hr';

        //send email to buyer
        foreach($buyer_email as $email){
            Mail::to($email)->send(new OrderReceivedBuyer($order, $order_products));
        }

        return view('frontend.order-received')->with('order', $order)
                                              ->with('vendor', $order_products);
    }

    public function getProducts($ids){
        $products = [];

        foreach(array_keys($ids) as $key => $id){
            $products[] = Proizvodi::where('id', $id)->get();
        }

        return $products;
    }

    public function test(){
        $cart = new StoreServices();

        return $cart->getCartProducts(session()->get('kosarica'));
    }
}
