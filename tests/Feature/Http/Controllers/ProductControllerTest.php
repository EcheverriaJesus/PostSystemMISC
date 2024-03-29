<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
final class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk();
        $response->assertViewIs('product.index');
        $response->assertViewHas('products');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product.create'));

        $response->assertOk();
        $response->assertViewIs('product.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\ProductStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $code = $this->faker->word();
        $name = $this->faker->name();
        $description = $this->faker->text();
        $price = $this->faker->randomFloat(/** double_attributes **/);
        $stock = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('product.store'), [
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
        ]);

        $products = Product::query()
            ->where('code', $code)
            ->where('name', $name)
            ->where('description', $description)
            ->where('price', $price)
            ->where('stock', $stock)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product));

        $response->assertOk();
        $response->assertViewIs('product.show');
        $response->assertViewHas('product');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product));

        $response->assertOk();
        $response->assertViewIs('product.edit');
        $response->assertViewHas('product');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'update',
            \App\Http\Requests\ProductUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $product = Product::factory()->create();
        $code = $this->faker->word();
        $name = $this->faker->name();
        $description = $this->faker->text();
        $price = $this->faker->randomFloat(/** double_attributes **/);
        $stock = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('product.update', $product), [
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
        ]);

        $product->refresh();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);

        $this->assertEquals($code, $product->code);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
        $this->assertEquals($stock, $product->stock);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('product.index'));

        $this->assertModelMissing($product);
    }
}
