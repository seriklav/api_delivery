<?php

namespace App\Services\Delivery;

use App\Models\Delivery;
use App\Services\Company\CompanyService;
use App\Services\Delivery\Interface\DeliveryAdapterInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class DeliveryService
{
	public function list(Collection $data): LengthAwarePaginator
	{
		return Delivery::filter($data);
	}

	public function create(array $data): Delivery
	{
		return Delivery::create($data);
	}

	public function update(Delivery $delivery, array $data): Delivery
	{
		$delivery->update($data);

		return $delivery;
	}

	public function destroy(Delivery $delivery): void
	{
		$delivery->delete();
	}

	/**
	 * @throws Exception
	 */
	public function calculate(Delivery $delivery): float
	{
		/**
		 * @var DeliveryAdapterInterface $instance
		 */
		$instance = CompanyService::COMPANIES[$delivery->company->code] ?? null;

		if (!$instance) throw new Exception('Delivery Adapter is not defined');

		return (new $instance)->calculate($delivery->weight);
	}
}
