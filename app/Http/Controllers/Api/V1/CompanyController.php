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
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CompanyController extends ApiController
{
	private CompanyService $companyService;

	public function __construct(CompanyService $companyService)
	{
		$this->companyService = $companyService;
	}

	/**
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
	 * @param Company $company
	 * @return JsonResponse
	 */
	public function destroy(Company $company): JsonResponse
	{
		$this->companyService->destroy($company);

		return response()->json([], ResponseAlias::HTTP_NO_CONTENT);
	}
}
