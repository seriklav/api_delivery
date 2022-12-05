<?php

namespace App\Services\Delivery\Interface;

interface DeliveryAdapterInterface
{
	public function calculate(float $weight): float;
}
