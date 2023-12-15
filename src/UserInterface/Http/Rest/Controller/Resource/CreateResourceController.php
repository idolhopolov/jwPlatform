<?php

namespace App\UserInterface\Http\Rest\Controller\Resource;

use App\Application\Command\Resource\CreateResource\CreateResourceCommand;
use App\Application\Command\Resource\ResourcePayload;
use App\UserInterface\Http\Rest\Controller\CommonController;

class CreateResourceController extends CommonController
{
    public function __invoke(Request $request): Response
    {
        try {

            /** @var ResourcePayload $payload */
            $payload = $this->getPayloadAsObject($request, ResourcePayload::class);

            $this->exec(new CreateResourceCommand($payload));

            return $this->getJson(
                $this->translator->trans('tickets.created'),
                [],
                Response::HTTP_CREATED
            );
        } catch (Throwable $exception) {
            return $this->errorResponse($exception);
        }
    }
}