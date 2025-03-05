<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Arr;
use Stripe\Product;
use Stripe\Stripe;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('cashier.secret'));
    }

    public function createProduct(array $data)
    {
        try {
            return Product::create([
                'name' => Arr::get($data, 'name'),
                'description' => Arr::get($data, 'description'),
                'type' => 'service',
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
