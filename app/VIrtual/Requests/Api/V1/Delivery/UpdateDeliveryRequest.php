<?php

namespace App\VIrtual\Requests\Api\V1\Delivery;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Store Delivery request",
 *      description="Store Delivery request body data",
 *      type="object",
 *      required={"company_id", "weight", "price", "description"},
 *      @OA\Xml(
 *         name="CreateDeliveryRequest"
 *      )
 * )
 */

class UpdateDeliveryRequest
{
	/**
	 * @OA\Property(
	 *     title="company_id",
	 *     description="Company identify",
	 *     format="int64",
	 *     example=1
	 * )
	 *
	 * @var integer
	 */
	private int $company_id;

	/**
	 * @OA\Property(
	 *     title="weight",
	 *     description="Weight of package",
	 *     format="double(8, 2)",
	 *     example=65.8
	 * )
	 *
	 * @var float
	 */
	private float $weight;

	/**
	 * @OA\Property(
	 *     title="price",
	 *     description="Price of package",
	 *     format="double(8, 2)",
	 *     example=65.8
	 * )
	 *
	 * @var float
	 */
	private float $price;

	/**
	 * @OA\Property(
	 *      title="description",
	 *      description="Description of the new Delivery",
	 *      example="test delivery"
	 * )
	 *
	 * @var string
	 */
	private string $description;
}
