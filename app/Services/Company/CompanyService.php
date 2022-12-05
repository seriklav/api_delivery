<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Services\Delivery\Adapter\DhlDeliveryAdapter;
use App\Services\Delivery\Adapter\UpsDeliveryAdapter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class CompanyService
{
	public const COMPANIES = [
		'ups' => DhlDeliveryAdapter::class,
		'dhl' => UpsDeliveryAdapter::class
	];

	public function list(Collection $data): LengthAwarePaginator
	{
		return Company::filter($data);
	}

	public function create(array $data): Company
	{
		return Company::create($data);
	}

	public function update(Company $company, array $data): Company
	{
		$company->update($data);

		return $company;
	}

	public function destroy(Company $company): void
	{
		$company->delete();
	}
}
