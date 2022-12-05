<?php

namespace App\Http\Requests\Api\V1\Delivery;

use App\Models\Delivery;
use App\Services\Delivery\DeliveryService;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class CreateDeliveryRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'company_id'    => 'required|integer|exists:companies,id',
			'weight'        => 'required|numeric',
			'price'         => 'required|numeric',
			'description'   => 'nullable|string',
		];
	}

	public function getCompanyId(): int
	{
		return (int)$this->get('company_id');
	}

	public function getWeight(): float
	{
		return floatval($this->get('weight'));
	}

	public function getPrice(): float
	{
		$delivery = new Delivery($this->all());
		/**
		 * @var DeliveryService $deliveryService
		 */
		$deliveryService = App::make(DeliveryService::class);

		try {
			return $deliveryService->calculate($delivery);
		} catch (Exception $e){
			return 0;
		}
	}

	public function getDescription(): string|null
	{
		return (string)$this->get('description');
	}
}
