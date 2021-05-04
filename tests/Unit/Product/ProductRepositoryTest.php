<?php

namespace Tests\Unit\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositores\Eloquent\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_delete_the_product()
    {
        $product = Product::factory()->create();

        $productRepo = new ProductRepository($product);
        $delete = $productRepo->destroy($product->id);

        $this->assertInstanceOf(Product::class, $delete);
    }

    /** @test */
    public function it_can_update_the_product()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => $this->faker->word,
            'quantity' => 1,
            'category_id' => $product->category_id,
        ];

        $productRepo = new ProductRepository($product);
        $update = $productRepo->update($data, $product->id);

        $expectedQuantity = $product->quantity !== $data['quantity'] ? $product->quantity + $data['quantity'] : $product->quantity;

        $this->assertInstanceOf(Product::class, $update);
        $this->assertEquals($data['name'], $update->name);
        $this->assertEquals($expectedQuantity, $update->quantity);
        $this->assertEquals($data['category_id'], $update->category_id);
    }

    /** @test */
    public function it_can_show_the_product()
    {
        $product = Product::factory()->create();
        $productRepo = new ProductRepository(new Product);
        $found = $productRepo->show($product->id);

        $this->assertInstanceOf(Product::class, $found);
        $this->assertEquals($found->name, $product->name);
        $this->assertEquals($found->quantity, $product->quantity);
        $this->assertEquals($found->category_id, $product->category_id);
    }

    /** @test */
    public function it_can_make_a_product()
    {
        $data = [
            'name' => $this->faker->word,
            'quantity' => 1,
            'category_id' => Category::factory()->create()->id,
        ];

        $productRepo = new ProductRepository(new Product());
        $product = $productRepo->store($data);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['quantity'], $product->quantity);
        $this->assertEquals($data['category_id'], $product->category_id);
    }


    // negative tests

    /** @test */
    public function it_should_throw_update_error_exception_when_the_poroduct_has_failed_to_update()
    {
        $this->expectException(QueryException::class);

        $product = Product::factory()->create();
        $productRepo = new ProductRepository($product);

        $data = ['name' => null];
        $productRepo->update($data, $product->id);
    }

     /** @test */
     public function it_should_throw_not_found_error_exception_when_the_product_is_not_found()
     {
        $this->expectException(ModelNotFoundException::class);

        $productRepo = new ProductRepository(new product);
        $productRepo->show(999);

        $this->assertTrue(false);
     }

     /** @test */
     public function it_should_throw_an_error_when_the_required_columns_are_not_filled()
     {
        $this->expectException(QueryException::class);

         $productRepo = new ProductRepository(new product);
         $productRepo->store([]);
     }
}
