<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use OpenApi\Annotations\Contact;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;
use OpenApi\Annotations\Server;


/**
 *
 * @Info(
 *     version="1.0.0",
 *     title="Test Delivery laravel",
 *     description="This is documentation for Testing Delivery work with laravel",
 *     @Contact(
 *         email="lavrinyuk.serik@gmail.comm",
 *         name="Sergey Lavrinyuk"
 *     )
 * )
 *
 * @Server(
 *     url="http://localhost/",
 *     description="development environment",
 * )
 *
 * @Server(
 *     url="https://yellow-media-lumen.herokuapp.com/",
 *     description="heroku environment"
 * )
 *
 * @Schema(
 *     schema="ApiResponse",
 *     type="object",
 *     description="Response entity, response result uses this structure uniformly",
 *     @Property(
 *         property="code",
 *         type="string",
 *         description="response code"
 *     ),
 *      @Property (property = "message", type = "string", description="response result prompt")
 * )
 *
 *
 * @package App\Http\Controllers\Site
 */

class SwaggerController extends Controller
{}