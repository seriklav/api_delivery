<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\Delivery\Interface\DeliveryAdapterInterface;

abstract class ApiController extends Controller
{
	protected DeliveryAdapterInterface $serviceDelivery;
}
