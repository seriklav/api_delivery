<?php

namespace App\VIrtual\Models;

use Illuminate\Support\Carbon;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Delivery",
 *     description="Delivery model",
 *     @OA\Xml(
 *         name="Delivery"
 *     )
 * )
 */
class Delivery
{
	/**
	 * @OA\Property(
	 *     title="id",
	 *     description="ID",
	 *     format="int64",
	 *     example=1
	 * )
	 *
	 * @var integer
	 */
	private int $id;

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

	/**
	 * @OA\Property(
	 *      title="created_at",
	 *      description="Created At date of the company",
	 *      example="2022-12-05 12:22:42"
	 * )
	 *
	 * @var Carbon
	 */
	private Carbon $created_at;

	/**
	 * @OA\Property(
	 *      title="updated_at",
	 *      description="Updated At date of the company",
	 *      example="2022-12-05 12:22:42"
	 * )
	 *
	 * @var Carbon
	 */
	private Carbon $updated_at;
}
