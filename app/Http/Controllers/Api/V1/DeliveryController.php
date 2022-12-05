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
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeliveryController extends ApiController
{
	private DeliveryService $deliveryService;

	public function __construct(DeliveryService $deliveryService)
	{
		$this->deliveryService = $deliveryService;
	}

	/**
	 *
	 * @OA\Get(
	 *      path="/api/v1/delivery",
	 *      operationId="getDeliveryList",
	 *      tags={"Delivery"},
	 *      summary="Get delivery of company",
	 *      description="Returns list of delivery",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/GetDeliveryRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/DeliveriesResource")
	 *       ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 * )
	 *
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
	 * @OA\Post(
	 *      path="/api/v1/delivery",
	 *      operationId="storeDelivery",
	 *      tags={"Delivery"},
	 *      summary="Store new delivery",
	 *      description="Returns delivery data",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/CreateDeliveryRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=201,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/DeliveryResource")
	 *       ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request"
	 *      ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 * )
	 *
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
	 *
	 * @OA\Get(
	 *      path="/api/v1/delivery/1",
	 *      operationId="getOneDelivery",
	 *      tags={"Delivery"},
	 *      summary="Get one delivery",
	 *      description="Returns one delivery",
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/DeliveryResource")
	 *       ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 *     )
	 *
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
	 *
	 * @OA\Put(
	 *      path="/api/v1/delivery/1",
	 *      operationId="updateDelivery",
	 *      tags={"Delivery"},
	 *      summary="Update delivery",
	 *      description="Returns delivery data",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/UpdateDeliveryRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=201,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/DeliveryResource")
	 *       ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request"
	 *      ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 * )
	 *
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
	 *
	 * @OA\Delete(
	 *      path="/api/v1/delivery/1",
	 *      operationId="deleteDelivery",
	 *      tags={"Delivery"},
	 *      summary="Delete delivery",
	 *      description="Returns null",
	 *      @OA\Response(
	 *          response=204,
	 *          description="HTTP NO CONTENT",
	 *       ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request"
	 *      ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 * )
	 *
	 * @param Delivery $delivery
	 * @return JsonResponse
	 */
	public function destroy(Delivery $delivery): JsonResponse
	{
		$this->deliveryService->destroy($delivery);

		return response()->json([], ResponseAlias::HTTP_NO_CONTENT);
	}
}
