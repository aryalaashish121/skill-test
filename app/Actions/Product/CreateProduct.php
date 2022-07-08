<?php

namespace App\Actions\Product;

use App\Models\Category;
use App\Models\Product;
use Faker\Core\Number;
use Illuminate\Http\UploadedFile;
use Mockery\Matcher\Any;
use phpDocumentor\Reflection\Types\Boolean;

class CreateProduct
{
    /**
     * Store a new category in storage.
     *
     * @param string $title
     * @param string $description
     * @param int category_id
     * @param int price
     * @param boolean in_stock
     * @param Any image
     * @return Product
     */
    public function execute(string $title, string $description, int $category_id, int $price,bool $in_stock,UploadedFile $file): Product
    {
        $product = Product::create([
            'title' => $title,
            'description' => $description,
            'price'=>$price,
            'category_id'=>$category_id,
            'price'=>$price,
            'image'=>'image',
            'in_stock'=>$in_stock
        ]);
dd($product);
        return $product;

    }
}
