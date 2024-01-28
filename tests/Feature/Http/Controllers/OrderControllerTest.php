<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderController
 */
final class OrderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('order.index'));

        $response->assertOk();
        $response->assertViewIs('order.index');
        $response->assertViewHas('orders');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('order.create'));

        $response->assertOk();
        $response->assertViewIs('order.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'store',
            \App\Http\Requests\OrderStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $customer_name = $this->faker->word();
        $direction = $this->faker->word();
        $number_phone = $this->faker->word();
        $delivery_date = $this->faker->date();
        $leave = $this->faker->randomFloat(/** float_attributes **/);
        $subtract = $this->faker->randomFloat(/** float_attributes **/);
        $description = $this->faker->text();
        $total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->post(route('order.store'), [
            'customer_name' => $customer_name,
            'direction' => $direction,
            'number_phone' => $number_phone,
            'delivery_date' => $delivery_date,
            'leave' => $leave,
            'subtract' => $subtract,
            'description' => $description,
            'total' => $total,
        ]);

        $orders = Order::query()
            ->where('customer_name', $customer_name)
            ->where('direction', $direction)
            ->where('number_phone', $number_phone)
            ->where('delivery_date', $delivery_date)
            ->where('leave', $leave)
            ->where('subtract', $subtract)
            ->where('description', $description)
            ->where('total', $total)
            ->get();
        $this->assertCount(1, $orders);
        $order = $orders->first();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.show', $order));

        $response->assertOk();
        $response->assertViewIs('order.show');
        $response->assertViewHas('order');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.edit', $order));

        $response->assertOk();
        $response->assertViewIs('order.edit');
        $response->assertViewHas('order');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'update',
            \App\Http\Requests\OrderUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $order = Order::factory()->create();
        $customer_name = $this->faker->word();
        $direction = $this->faker->word();
        $number_phone = $this->faker->word();
        $delivery_date = $this->faker->date();
        $leave = $this->faker->randomFloat(/** float_attributes **/);
        $subtract = $this->faker->randomFloat(/** float_attributes **/);
        $description = $this->faker->text();
        $total = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->put(route('order.update', $order), [
            'customer_name' => $customer_name,
            'direction' => $direction,
            'number_phone' => $number_phone,
            'delivery_date' => $delivery_date,
            'leave' => $leave,
            'subtract' => $subtract,
            'description' => $description,
            'total' => $total,
        ]);

        $order->refresh();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);

        $this->assertEquals($customer_name, $order->customer_name);
        $this->assertEquals($direction, $order->direction);
        $this->assertEquals($number_phone, $order->number_phone);
        $this->assertEquals(Carbon::parse($delivery_date), $order->delivery_date);
        $this->assertEquals($leave, $order->leave);
        $this->assertEquals($subtract, $order->subtract);
        $this->assertEquals($description, $order->description);
        $this->assertEquals($total, $order->total);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $order = Order::factory()->create();

        $response = $this->delete(route('order.destroy', $order));

        $response->assertRedirect(route('order.index'));

        $this->assertModelMissing($order);
    }
}
