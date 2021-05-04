<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        if($product->isDirty('quantity')){

            $currentQuantity = $product->getOriginal('quantity');
            $product->quantity = $currentQuantity + $product->quantity;
        }

    }
}
