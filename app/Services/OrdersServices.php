<?php

namespace App\Services;
use App\Orders;
use App\Proizvodi;

class OrdersServices
{
    public $order_id;
    
    public function Makeorder($buyer, $products){
        $order = new Orders();

        $order->ime = $buyer->input('ime_kupca');
        $order->prezime = $buyer->input('prezime_kupca');
        $order->email = $buyer->input('email_kupca');
        $order->telefon = $buyer->input('telefon_kupca');
        $order->adresa = $buyer->input('adresa_kupca');
        $order->postanski_broj = $buyer->input('pp_kupca');
        $order->mjesto = $buyer->input('mjesto_kupca');
        $order->proizvodi_ids = $products;
        $order->napomene = $buyer->input('napomena_kupca');
        $order->status_id = 1;

        $order->save();

        $this->order_id = $order->id;
    }

    public function getOrder($id){
        $order = Orders::where('id', $id)->get();

        return $order;
    }

    public function allOrders(){
        $orders = Orders::all();

        return $orders;
    }

    static function changeStatus($order_id, $status_id){
        $order = Orders::where('id', $order_id);

        $order->update([
            'status_id' => $status_id,
        ]);
    }

    public function getProducts($ids){
        $products = [];

        foreach(array_keys($ids) as $key => $id){
            $products[] = Proizvodi::where('id', $id)->get();
        }

        return $products;
    }

    static function deleteOrder($id){
        $order = Orders::where('id', $id)->delete();
    }
}