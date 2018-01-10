<?php

namespace App;



class Cart
{

    public $items = null;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart)
    {
      if($oldCart){
        $this->items = $oldCart->items;
        $this->totalPrice = $oldCart->totalPrice;
        $this->totalQty = $oldCart->totalQty;
      }
    }

    public function add($dish, $id)
    {
      $storeItem = ['qty'=>0, 'price'=>$dish->price, 'item'=>$dish];
      if($this->items){
        //tikriname, ar jau yra tokia preke krepselyje
        if(array_key_exists($id, $this->items)){
          $storeItem = $this->items[$dish->id];
        }
      }
      $storeItem['qty']++;
      $storeItem['price'] = $storeItem['qty']*$dish->price;
      $this->items[$dish->id] = $storeItem;
      $this->totalQty++;
      $this->totalPrice += $dish->price;
    }



    public function deleteAll($id){
      $this->totalQty -= $this->items[$id]['qty'];
      $this->totalPrice -= $this->items[$id]['price'];
      unset($this->items[$id]);
    }
    public function deleteByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
          //unset isima is masyvo
        unset($this->items[$id]);
        }
    }


}
