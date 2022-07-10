<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function test_product_validation()
     {
        $response = $this->post(route('categories.store'),[]);
        $response->assertStatus(302);
        $this->assertDatabaseCount('products',0);
     }


    public function test_that_you_can_create_a_product():void
    {

        $categoryPayload = [
            'title' => 'This is a test title',
            'description' => 'This is a test description'
        ];
        $response = $this->post(route('categories.store'),$categoryPayload);
        $this->assertDatabaseCount('categories',1);

        $productPayload = [
            'title'=>'product 10',
            'description'=>'This is test product description',
            'price'=>20,
            'category_id'=>1,
            'in_stock'=>true
        ];
        $this->assertDatabaseCount('products', 0);
        $productResponse = $this->post(route('products.store'),$productPayload);
        $productResponse->assertRedirect(route('products.edit',1));

        $this->assertDatabaseHas('products',$productPayload);

    }

    public function test_that_you_can_create_a_product_with_image():void
    {

        Storage::fake('avatars');

        $categoryPayload = [
            'title' => 'This is a test title',
            'description' => 'This is a test description'
        ];
        $response = $this->post(route('categories.store'),$categoryPayload);
        $this->assertDatabaseCount('categories',1);

        $file = UploadedFile::fake()->image('avatar.jpg');

        $productPayload = [
            'title'=>'product 10',
            'description'=>'This is test product description',
            'price'=>20,
            'category_id'=>1,
            'in_stock'=>true,
            'image'=>$file
        ];
        $this->assertDatabaseCount('products', 0);
        $productResponse = $this->post(route('products.store'),$productPayload);
        $productResponse->assertRedirect(route('products.edit',1));

        // dd($productResponse);
        $prouctImage = Product::first()->image;
        Storage::disk('public')->assertExists($prouctImage);
        $productPayload['image']= $prouctImage;
        $this->assertDatabaseHas('products',$productPayload);

    }


    public function test_that_you_can_update_product() {
        $categoryPayload = [
            'title' => 'This is a test title',
            'description' => 'This is a test description'
        ];
        $response = $this->post(route('categories.store'),$categoryPayload);
        $this->assertDatabaseCount('categories',1);

        $productPayload = [
            'title'=>'product 10',
            'description'=>'This is test product description',
            'price'=>20,
            'category_id'=>1,
            'in_stock'=>true
        ];
        $this->assertDatabaseCount('products', 0);
        $productResponse = $this->post(route('products.store'),$productPayload);

        $this->assertDatabaseCount('products',1);

        $updatePayload = [
            'title'=>'Updated product',
            'description'=>'This is updated product',
            'price'=>20,
            'category_id'=>1,
            'in_stock'=>true
        ];

        $updateResponse = $this->post(route('products.update',1),$updatePayload);

        $this->assertDatabaseCount('products',1);

        $this->assertDatabaseHas('products',$updatePayload);

        $updateResponse->assertStatus(302);

        $updateResponse->assertRedirect(route('products.edit',1));
    }

    public function test_you_can_delete_product()
    {
        $categoryPayload = [
            'title' => 'This is a test title',
            'description' => 'This is a test description'
        ];
        $response = $this->post(route('categories.store'),$categoryPayload);
        $this->assertDatabaseCount('categories',1);

        $productPayload = [
            'title'=>'product 10',
            'description'=>'This is test product description',
            'price'=>20,
            'category_id'=>1,
            'in_stock'=>true
        ];
        $this->assertDatabaseCount('products', 0);
        $productResponse = $this->post(route('products.store'),$productPayload);

        $this->assertDatabaseCount('products',1);

        $deleteResponse = $this->delete(route('products.destroy',1));
        $this->assertDatabaseCount('products',0);
        $deleteResponse->assertStatus(302);
        $deleteResponse->assertRedirect(route('products.index'));
    }
}
