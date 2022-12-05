<?php

namespace App\VIrtual\Models;

use Illuminate\Support\Carbon;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Company",
 *     description="Company model",
 *     @OA\Xml(
 *         name="Company"
 *     )
 * )
 */
class Company
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
	 *      title="name",
	 *      description="Name of the new company",
	 *      example="Dhl"
	 * )
	 *
	 * @var string
	 */
	private string $name;

	/**
	 * @OA\Property(
	 *      title="code",
	 *      description="Unique code of the company",
	 *      example="dhl"
	 * )
	 *
	 * @var string
	 */
	private string $code;

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
