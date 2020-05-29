<?php

use Illuminate\Database\Seeder;

class ProductsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product();
        $product->name = "product -1";
        $product->desc = "product -1";
        $product->content = "product -1";
        $product->price = "20000";
        $product->image = "image";
        $product->category_id = 1;
        $product->save();

        $product = new \App\Product();
        $product->name = "product -1";
        $product->desc = "product -1";
        $product->content = "product -1";
        $product->price = "20000";
        $product->image = "image";
        $product->category_id = 1;
        $product->save();

        $product = new \App\Product();
        $product->name = "product -4";
        $product->desc = "product -4";
        $product->content = "product -1";
        $product->price = "20000";
        $product->image = "image";
        $product->category_id = 2;
        $product->save();

        $product = new \App\Product();
        $product->name = "product -1";
        $product->desc = "product -1";
        $product->content = "product -1";
        $product->price = "20000";
        $product->image = "image";
        $product->category_id = 3;
        $product->save();

    }
}
