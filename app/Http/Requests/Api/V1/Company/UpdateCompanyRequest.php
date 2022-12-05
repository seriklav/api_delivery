<?php

namespace App\Http\Requests\Api\V1\Company;

use App\Models\Company;

class UpdateCompanyRequest extends CreateCompanyRequest
{
	public function rules(): array
	{
		$company_id = null;

		if ($this->route('company')) {
			$company_id = (int)$this->route('company')->id;
		}

		$uniqueCodeRule = sprintf('unique:companies,code,%d', $company_id);

		$parent_rules = parent::rules();

		$parent_rules['code'] = ["required", "string", $uniqueCodeRule];

		return $parent_rules;
	}
}
