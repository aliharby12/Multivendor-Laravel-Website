<?php

namespace App\Observers;

use App\Mail\ShopMail;
use App\Shop;
use Illuminate\Support\Facades\Mail;

class ShopObserver
{

    public function created(Shop $shop)
    {
        //
    }


    public function updated(Shop $shop)
    {

        // check the status of the shop ( active or not active )
        if ($shop->getOriginal('active') == false && $shop->active == true) {

            // send mail to the seller
            Mail::to($shop->user)->send(new ShopMail($shop));

            // give him the vendor role
            $shop->user->setRole('vendor');

        } else {
            dd('shop not activated');
        }
    }


    public function deleted(Shop $shop)
    {
        //
    }


    public function restored(Shop $shop)
    {
        //
    }


    public function forceDeleted(Shop $shop)
    {
        //
    }
}
