<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDeliveryMethod;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count = User::all()->count();
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'delivery_method_id' => OrderDeliveryMethod::query()->inRandomOrder()->first(),
            'status_id' => OrderStatus::query()->inRandomOrder()->first()
        ];
    }
}
