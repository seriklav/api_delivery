<?php

namespace App\Http\Resources\Api\V1\Delivery;

use App\Http\Resources\Api\V1\Company\CompanyResource;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		/** @var Delivery $this */

		if (empty($this->resource)) return [];

		return [
			'id'            => $this->id,
			"company"       => CompanyResource::make($this->company),
			"weight"        => $this->weight,
			"price"         => $this->price,
			"description"   => $this->description,
			"created_at"    => $this->created_at->format('d.m.Y H:i:s'),
			"updated_at"    => $this->updated_at->format('d.m.Y H:i:s'),
		];
	}
}
