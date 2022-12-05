<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Delivery\CreateDeliveryRequest;
use App\Http\Requests\Api\V1\Delivery\GetDeliveryRequest;
use App\Http\Requests\Api\V1\Delivery\UpdateDeliveryRequest;
use App\Http\Resources\Api\V1\Delivery\DeliveryResource;
use App\Http\Resources\Api\V1\Delivery\DeliveryResourceCollection;
use App\Models\Delivery;
use App\Services\Delivery\DeliveryService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeliveryController extends ApiController
{
	private DeliveryService $deliveryService;

	public function __construct(DeliveryService $deliveryService)
	{
		$this->deliveryService = $deliveryService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param GetDeliveryRequest $getDeliveryRequest
	 * @return DeliveryResourceCollection
	 */
	public function index(GetDeliveryRequest $getDeliveryRequest): DeliveryResourceCollection
	{
		return new DeliveryResourceCollection(
			$this->deliveryService->list($getDeliveryRequest->collect())
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateDeliveryRequest $createDeliveryRequest
	 * @return DeliveryResource
	 */
	public function store(CreateDeliveryRequest $createDeliveryRequest): DeliveryResource
	{
		return DeliveryResource::make(
			$this->deliveryService->create(
				$createDeliveryRequest->except('price') + ['price' => $createDeliveryRequest->getPrice()]
			)
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Delivery $delivery
	 * @return DeliveryResource
	 */
	public function show(Delivery $delivery): DeliveryResource
	{
		return DeliveryResource::make($delivery);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateDeliveryRequest $updateDeliveryRequest
	 * @param Delivery $delivery
	 * @return DeliveryResource
	 */
	public function update(UpdateDeliveryRequest $updateDeliveryRequest, Delivery $delivery): DeliveryResource
	{
		return DeliveryResource::make(
			$this->deliveryService->update(
				$delivery,
				$updateDeliveryRequest->except('price') + ['price' => $updateDeliveryRequest->getPrice()]
			)
		);
	}

	/**
	 * @param Delivery $delivery
	 * @return JsonResponse
	 */
	public function destroy(Delivery $delivery): JsonResponse
	{
		$this->deliveryService->destroy($delivery);

		return response()->json([], ResponseAlias::HTTP_NO_CONTENT);
	}
}
