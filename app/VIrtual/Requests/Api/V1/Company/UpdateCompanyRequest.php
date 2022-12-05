<?php

namespace App\VIrtual\Requests\Api\V1\Company;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Update Company request",
 *      description="Store Company request body data",
 *      type="object",
 *      required={"name", "code"},
 *      @OA\Xml(
 *         name="UpdateCompanyRequest"
 *      )
 * )
 */

class UpdateCompanyRequest
{
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
}
