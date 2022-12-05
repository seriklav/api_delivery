<?php

namespace App\VIrtual\Requests\Api\V1\Delivery;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Get Delivery request",
 *      description="Get Delivery request body data",
 *      type="object",
 *      @OA\Xml(
 *         name="GetDeliveryRequest"
 *      )
 * )
 */

class GetDeliveryRequest
{
	/**
	 * @OA\Property(
	 *      title="company_id",
	 *      description="optional field for search by company_id",
	 *      example="1"
	 * )
	 *
	 * @var int
	 */
	private int $company_id;

	/**
	 * @OA\Property(
	 *      title="weight",
	 *      description="optional field for search by weight",
	 *      example="1"
	 * )
	 *
	 * @var float
	 */
	private float $weight;

	/**
	 * @OA\Property(
	 *      title="price",
	 *      description="optional field for search by price",
	 *      example="1"
	 * )
	 *
	 * @var float
	 */
	private float $price;

	/**
	 * @OA\Property(
	 *      title="column",
	 *      description="column for sorting ('id', 'name', 'created_at', 'updated_at')",
	 *      example="id"
	 * )
	 *
	 * @var string
	 */
	private string $column;

	/**
	 * @OA\Property(
	 *      title="order_by",
	 *      description="Sorting type ('asc', 'desc')",
	 *      example="asc"
	 * )
	 *
	 * @var string
	 */
	private string $order_by;
}
