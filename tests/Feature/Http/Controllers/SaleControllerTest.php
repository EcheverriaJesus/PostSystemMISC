<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SaleController
 */
final class SaleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $sales = Sale::factory()->count(3)->create();

        $response = $this->get(route('sale.index'));

        $response->assertOk();
        $response->assertViewIs('sale.index');
        $response->assertViewHas('sales');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('sale.create'));

        $response->assertOk();
        $response->assertViewIs('sale.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaleController::class,
            'store',
            \App\Http\Requests\SaleStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $user_name = $this->faker->userName();
        $total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->post(route('sale.store'), [
            'user_name' => $user_name,
            'total' => $total,
        ]);

        $sales = Sale::query()
            ->where('user_name', $user_name)
            ->where('total', $total)
            ->get();
        $this->assertCount(1, $sales);
        $sale = $sales->first();

        $response->assertRedirect(route('sale.index'));
        $response->assertSessionHas('sale.id', $sale->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $sale = Sale::factory()->create();

        $response = $this->get(route('sale.show', $sale));

        $response->assertOk();
        $response->assertViewIs('sale.show');
        $response->assertViewHas('sale');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $sale = Sale::factory()->create();

        $response = $this->get(route('sale.edit', $sale));

        $response->assertOk();
        $response->assertViewIs('sale.edit');
        $response->assertViewHas('sale');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaleController::class,
            'update',
            \App\Http\Requests\SaleUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $sale = Sale::factory()->create();
        $user_name = $this->faker->userName();
        $total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->put(route('sale.update', $sale), [
            'user_name' => $user_name,
            'total' => $total,
        ]);

        $sale->refresh();

        $response->assertRedirect(route('sale.index'));
        $response->assertSessionHas('sale.id', $sale->id);

        $this->assertEquals($user_name, $sale->user_name);
        $this->assertEquals($total, $sale->total);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $sale = Sale::factory()->create();

        $response = $this->delete(route('sale.destroy', $sale));

        $response->assertRedirect(route('sale.index'));

        $this->assertModelMissing($sale);
    }
}
