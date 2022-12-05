<?php

namespace App\VIrtual\Resources\Api\V1\Delivery;

use App\VIrtual\Models\Delivery;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="DeliveryResource",
 *     description="Company resource",
 *     @OA\Xml(
 *         name="DeliveryResource"
 *     )
 * )
 */
class DeliveryResource
{
	/**
	 * @OA\Property(
	 *     title="Data",
	 *     description="Data wrapper"
	 * )
	 *
	 * @var Delivery
	 */
	private Delivery $data;
}
