<?php
namespace App\Action\Query;

use App\Action\AbstractAction;
use App\Repository\CartRepository;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetCardQuery implements QueryInterface
{
    private CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function fetch(RequestStack $requestStack): JsonResponse
    {

        $session = $requestStack->getSession();
        if (!$session->isStarted()) {
            $session->start();
        }
        return new JsonResponse(AppGetProductsResource::get($this->cartRepository->findBy(['sessionId' => $session->getId()])));
    }
}
