<?php

namespace App\VIrtual\Resources\Api\V1\Delivery;

use App\VIrtual\Models\Delivery;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="DeliveriesResource",
 *     description="Deliveries resource",
 *     @OA\Xml(
 *         name="DeliveriesResource"
 *     )
 * )
 */
class DeliveriesResource
{
	/**
	 * @OA\Property(
	 *     title="Data",
	 *     description="Data wrapper"
	 * )
	 *
	 * @var Delivery[]
	 */
	private array $data;
}
