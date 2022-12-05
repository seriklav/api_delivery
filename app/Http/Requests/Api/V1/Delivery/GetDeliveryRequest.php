<?php

namespace App\Http\Requests\Api\V1\Delivery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetDeliveryRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'company_id'    => 'sometimes|exists:companies,id',
			'weight'        => 'sometimes|numeric',
			'price'         => 'sometimes|numeric',
			'column'        => ['string', Rule::in(['id', 'company_id', 'price', 'created_at', 'updated_at'])],
			'order_by'      => ['string', Rule::in(['desc', 'asc'])],
		];
	}

	public function getCompanyId(): string
	{
		return (int)$this->get('company_id');
	}

	public function getWeight(): float
	{
		return (float)$this->get('weight');
	}

	public function getPrice(): float
	{
		return (float)$this->get('price');
	}

	public function getColumn(): string
	{
		return (string)$this->get('column', 'created_at');
	}

	public function getOrderBy(): string
	{
		return (string)$this->get('order_by', 'asc');
	}
}
