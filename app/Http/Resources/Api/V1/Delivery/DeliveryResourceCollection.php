<?php

namespace App\Http\Resources\Api\V1\Delivery;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DeliveryResourceCollection extends ResourceCollection
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'data' => $this->collection,
			'links' => [
				'self' => 'link-value',
			],
		];
	}
}
