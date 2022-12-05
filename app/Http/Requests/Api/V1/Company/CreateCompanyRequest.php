<?php

namespace App\Http\Requests\Api\V1\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateCompanyRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'name' => 'required|string',
			'code' => 'required|string|unique:companies,code',
		];
	}

	public function getName(): string
	{
		return (string)$this->get('name');
	}

	public function getCode(): string
	{
		return Str::lower($this->get('code'));
	}
}
