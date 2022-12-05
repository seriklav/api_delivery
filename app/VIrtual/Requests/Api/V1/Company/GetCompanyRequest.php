<?php

namespace App\VIrtual\Requests\Api\V1\Company;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Get Company request",
 *      description="Get Company request body data",
 *      type="object",
 *      @OA\Xml(
 *         name="GetCompanyRequest"
 *      )
 * )
 */

class GetCompanyRequest
{
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
