<?php
namespace App\Action\Command;

use App\Entity\Cart;
use App\Entity\CartProduct;
use App\Repository\CartRepository;
use App\Repository\CartProductRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CartSaveCommand extends AbstractCommand implements CommandInterface
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;
    private ProductRepository $productRepository;

    public function __construct(EntityManagerInterface $entityManager, CartRepository $cartRepository, CartProductRepository $cartProductRepository, ProductRepository $productRepository) {

        parent::__construct($entityManager);

        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(RequestStack $requestStack): int
    {

        $sessionId = $requestStack->getSession()->get('sessionId');
        foreach($this->cartRepository->findBy(['sessionId' => $sessionId]) as $cart) {

            foreach($this->cartProductRepository->findBy(['cart' => $cart]) as $cartProduct) {

                $this->entityManager->remove($cartProduct);
                $this->entityManager->flush();
            };
            $this->entityManager->remove($cart);
            $this->entityManager->flush();
        };

        $cart = new Cart();
        $cart->setSessionId($sessionId);
        $this->entityManager->persist($cart);
        $this->entityManager->flush();

        foreach(json_decode($requestStack->getCurrentRequest()->getContent(),true)['cart'] as $product) {
            $entity = $this->productRepository->find($product['id']);
            $cartProduct = new CartProduct();
            $cartProduct->setCart($cart);
            $cartProduct->setProduct($entity);
            $this->entityManager->persist($cartProduct);
        }
        $this->entityManager->persist($cart);

        $this->entityManager->flush();
        return true;
    }
}
