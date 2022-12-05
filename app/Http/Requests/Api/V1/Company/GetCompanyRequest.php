<?php

namespace App\Http\Requests\Api\V1\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetCompanyRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'column' => ['string', Rule::in(['id', 'name', 'created_at', 'updated_at'])],
			'order_by' => ['string', Rule::in(['desc', 'asc'])],
		];
	}

	public function getColumn(): string
	{
		return (string)$this->get('column');
	}

	public function getOrderBy(): string
	{
		return (string)$this->get('order_by');
	}
}
