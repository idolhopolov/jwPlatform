<?php

declare(strict_types=1);

namespace App\UserInterface\Product\Http\Rest;

use App\Application\Common\DTO\Response as ApiResponse;
use App\Application\Product\Command\CreateProduct\CreateResourceCommand;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;
use App\UserInterface\Common\Http\Rest\CommonController;
use App\UserInterface\Http\Rest\Controller\Product\OA;
use App\UserInterface\Http\Rest\Controller\Product\Throwable;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/v1', name: 'xxx')]
#[OA\Tag(name: 'xxx / xxx')]
class CreateProductController extends CommonController
{

    #[OA\Response(
        response: Response::HTTP_CREATED,
        description: 'Create video metadata',
        content: new Model(type: ApiResponse::class)
    )]
    #[OA\RequestBody(content: new Model(type: CreateProductPayload::class))]
    #[Route('/xxx', methods: [Request::METHOD_POST])]
    #[Security(name: 'Bearer')]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            /** @var CreateProductPayload $payload */
            $payload = $this->getPayloadInputAsObject($request, CreateProductPayload::class);

            $this->commandBus->handle(new CreateResourceCommand($payload));

            return $this->getResponse(content: Response::$statusTexts[Response::HTTP_CREATED], code: Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            return $this->getErrorResponse($exception);
        }
    }
}