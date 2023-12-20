<?php
namespace App\Action\Query;

use App\Action\AbstractAction;
use App\Repository\CartRepository;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AppGetCardQuery implements QueryInterface
{
    private CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function fetch(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $session->start();
        var_dump($session->getId());
        return new JsonResponse(AppGetProductsResource::get($this->cartRepository->findBy(['sessionId' => $session->getId()])));
    }
}
