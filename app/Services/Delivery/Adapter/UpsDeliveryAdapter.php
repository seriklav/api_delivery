<?php

namespace App\Services\Delivery\Adapter;

use App\Services\Delivery\Interface\DeliveryAdapterInterface;

class UpsDeliveryAdapter implements DeliveryAdapterInterface
{
	private const SPECIAL_MIN_WEIGHT_CONDITIONAL = 4.5;
	private const SPECIAL_MIN_PRICE_CONDITIONAL = 2;

	private const PRICE = 3;

	public function calculate(float $weight): float
	{
		$price = self::PRICE;

		if($weight <= self::SPECIAL_MIN_WEIGHT_CONDITIONAL){
			$price = self::SPECIAL_MIN_PRICE_CONDITIONAL;
		}

		return (float)$price;
	}
}
