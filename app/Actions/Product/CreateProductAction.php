<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Mockery\Matcher\Any;

class CreateProductAction
{
    /**
     * Store a new category in storage.
     *
     * @param string $title
     * @param string $description
     * @param int category_id
     * @param int price
     * @param bool in_stock
     * @param string image
     * @return Product
     */
    public function execute(string $title, string $description, int $category_id, int $price,bool $in_stock,string $image): Product
    {
        $product = Product::create([
            'title' => $title,
            'description' => $description,
            'price'=>$price,
            'category_id'=>$category_id,
            'price'=>$price,
            'image'=>$image,
            'in_stock'=>$in_stock
        ]);
        return $product;

    }
}
