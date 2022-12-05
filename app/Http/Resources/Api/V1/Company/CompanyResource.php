<?php

namespace App\Http\Resources\Api\V1\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		/** @var Company $this */

		if (empty($this->resource)) return [];

		return [
			'id'            => $this->id,
			'name'          => $this->name,
			"code"          => $this->code,
			"created_at"    => $this->created_at->format('d.m.Y H:i:s'),
			"updated_at"    => $this->updated_at->format('d.m.Y H:i:s'),
		];
	}
}
