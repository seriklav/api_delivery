<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Company\CreateCompanyRequest;
use App\Http\Requests\Api\V1\Company\GetCompanyRequest;
use App\Http\Requests\Api\V1\Company\UpdateCompanyRequest;
use App\Http\Resources\Api\V1\Company\CompanyResource;
use App\Http\Resources\Api\V1\Company\CompanyResourceCollection;
use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CompanyController extends ApiController
{
	private CompanyService $companyService;

	public function __construct(CompanyService $companyService)
	{
		$this->companyService = $companyService;
	}

	/**
	 * @OA\Get(
	 *      path="/api/v1/company",
	 *      operationId="getCompanyList",
	 *      tags={"Company"},
	 *      summary="Get list of company",
	 *      description="Returns list of compay",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/GetCompanyRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/CompaniesResource")
	 *       ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 *     )
	 *
	 * Display a listing of the resource.
	 *
	 * @param GetCompanyRequest $request
	 * @return CompanyResourceCollection
	 */
	public function index(GetCompanyRequest $request): CompanyResourceCollection
	{
		return new CompanyResourceCollection(
			$this->companyService->list($request->collect())
		);
	}

	/**
	 * @OA\Post(
	 *      path="/api/v1/company",
	 *      operationId="storeCompany",
	 *      tags={"Company"},
	 *      summary="Store new company",
	 *      description="Returns company data",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/CreateCompanyRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=201,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
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
	 * @param CreateCompanyRequest $createCompanyRequest
	 * @return CompanyResource
	 */
	public function store(CreateCompanyRequest $createCompanyRequest): CompanyResource
	{
		return CompanyResource::make(
			$this->companyService->create(
				$createCompanyRequest->except('code') + ['code' => $createCompanyRequest->getCode()]
			)
		);
	}

	/**
	 *
	 * @OA\Get(
	 *      path="/api/v1/company/1",
	 *      operationId="getOneCompany",
	 *      tags={"Company"},
	 *      summary="Get one company",
	 *      description="Returns one compay",
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
	 *       ),
	 *      @OA\Response(
	 *          response=403,
	 *          description="Forbidden"
	 *      )
	 *     )
	 *
	 * Display the specified resource.
	 *
	 * @param Company $company
	 * @return CompanyResource
	 */
	public function show(Company $company): CompanyResource
	{
		return CompanyResource::make($company);
	}

	/**
	 *
	 * @OA\Put(
	 *      path="/api/v1/company/1",
	 *      operationId="updateCompany",
	 *      tags={"Company"},
	 *      summary="Update company",
	 *      description="Returns company data",
	 *      @OA\RequestBody(
	 *          required=true,
	 *          @OA\JsonContent(ref="#/components/schemas/UpdateCompanyRequest")
	 *      ),
	 *      @OA\Response(
	 *          response=201,
	 *          description="Successful operation",
	 *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
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
	 * @param UpdateCompanyRequest $updateCompanyRequest
	 * @param Company $company
	 * @return CompanyResource
	 */
	public function update(UpdateCompanyRequest $updateCompanyRequest, Company $company): CompanyResource
	{
		return CompanyResource::make(
			$this->companyService->update(
				$company,
				$updateCompanyRequest->except('code') + ['code' => $updateCompanyRequest->getCode()]
			)
		);
	}

	/**
	 *
	 * @OA\Delete(
	 *      path="/api/v1/company/1",
	 *      operationId="deleteCompany",
	 *      tags={"Company"},
	 *      summary="Delete company",
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
	 * @param Company $company
	 * @return JsonResponse
	 */
	public function destroy(Company $company): JsonResponse
	{
		$this->companyService->destroy($company);

		return response()->json([], ResponseAlias::HTTP_NO_CONTENT);
	}
}
