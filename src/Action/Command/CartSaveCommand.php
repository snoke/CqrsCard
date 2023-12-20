<?php
namespace App\Action\Command;

use App\Entity\Cart;
use App\Entity\Product;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CartSaveCommand extends AbstractCommand implements CommandInterface
{
    private CartRepository $cartRepository;
    private ProductRepository $productRepository;

    public function __construct(EntityManagerInterface $entityManager, CartRepository $cartRepository, ProductRepository $productRepository) {

        parent::__construct($entityManager);

        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(RequestStack $requestStack): int
    {

        $session = $requestStack->getSession();
        if (!$session->isStarted()) {
            $session->start();
        }

        foreach($this->cartRepository->findBy(['sessionId' => $session->getId()]) as $cart) {
            $this->entityManager->remove($cart);
            $this->entityManager->flush();
        };

        $cart = new Cart();
        $cart->setSessionId($session->getId());
        $this->entityManager->persist($cart);

        foreach(json_decode($requestStack->getCurrentRequest()->getContent(),true) as $product) {
            $entity = $this->productRepository->find($product[0]['id']);
            $cart->addProduct($entity);
            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();
        return true;
    }
}
