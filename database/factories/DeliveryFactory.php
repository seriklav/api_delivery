<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Delivery;
use App\Services\Delivery\DeliveryService;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends Factory<Delivery>
 */
class DeliveryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$company = Company::inRandomOrder()->first();

		$weight = fake()->randomFloat(2, 0.33, 100);

		/**
		 * @var DeliveryService $deliveryService
		 */
		$deliveryService = App::make(DeliveryService::class);

		$data = [
			'company_id' => $company->id,
			'weight' => $weight,
			'price' => 0,
			'description' => fake()->text,
		];

		$delivery = new Delivery($data);

		try {
			$data['price'] = $deliveryService->calculate($delivery);
		} catch (Exception $e){}

		return $data;
	}
}
