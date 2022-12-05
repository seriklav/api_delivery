<?php

namespace App\VIrtual\Resources\Api\V1\Company;

use App\Virtual\Models\Company;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="CompanyResource",
 *     description="Company resource",
 *     @OA\Xml(
 *         name="CompanyResource"
 *     )
 * )
 */
class CompanyResource
{
	/**
	 * @OA\Property(
	 *     title="Data",
	 *     description="Data wrapper"
	 * )
	 *
	 * @var Company
	 */
	private Company $data;
}
