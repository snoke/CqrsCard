<?php
namespace App\Action\Command;

use App\Entity\Cart;
use App\Entity\CartProduct;
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
        echo '<pre>';
        var_dump(json_decode($requestStack->getCurrentRequest()->getContent(),true) );

        $sessionId = $requestStack->getSession()->get('sessionId');
        foreach($this->cartRepository->findBy(['sessionId' => $sessionId]) as $_cart) {
            $this->entityManager->remove($_cart);
        };

        $cart = new Cart();
        $cart->setSessionId($sessionId);
        $this->entityManager->persist($cart);

            foreach(json_decode($requestStack->getCurrentRequest()->getContent(),true) as $product) {
                $entity = $this->productRepository->find($product[0]['id']);
                $cartProduct = new CartProduct();
                $cartProduct->setCart($cart);
                $cartProduct->setProduct($entity);
                $this->entityManager->persist($cartProduct);
        }

        $this->entityManager->flush();
        return true;
    }
}
