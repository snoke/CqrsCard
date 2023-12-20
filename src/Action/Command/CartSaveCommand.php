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
        echo '<pre>';
        var_dump(json_decode($requestStack->getCurrentRequest()->getContent(),true) );

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

        foreach(json_decode($requestStack->getCurrentRequest()->getContent(),true) as $product) {
            var_dump($product);die;
            $entity = $this->productRepository->find($product[0]['id']);

            /**
            $cartProduct = new CartProduct();
            $cartProduct->setCart($cart);
            $cartProduct->setProduct($entity);
            $this->entityManager->persist($cartProduct);
             * **/
        }
        die;
        $this->entityManager->persist($cart);

        $this->entityManager->flush();
        return true;
    }
}
