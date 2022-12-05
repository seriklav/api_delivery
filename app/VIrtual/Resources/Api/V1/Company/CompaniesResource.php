<?php

namespace App\VIrtual\Resources\Api\V1\Company;

use App\Virtual\Models\Company;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="CompaniesResource",
 *     description="Companies resource",
 *     @OA\Xml(
 *         name="CompaniesResource"
 *     )
 * )
 */
class CompaniesResource
{
	/**
	 * @OA\Property(
	 *     title="Data",
	 *     description="Data wrapper"
	 * )
	 *
	 * @var Company[]
	 */
	private array $data;
}
