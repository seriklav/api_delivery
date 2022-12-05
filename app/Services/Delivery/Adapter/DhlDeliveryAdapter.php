<?php

namespace App\Services\Delivery\Adapter;

use App\Services\Delivery\Interface\DeliveryAdapterInterface;

class DhlDeliveryAdapter implements DeliveryAdapterInterface
{
	private const PRICE = 0.33;

	public function calculate(float $weight): float
	{
		return round($weight) * self::PRICE;
	}
}
