<?php
namespace App\Action\Command;

use App\Entity\Cart;
use App\Entity\Product;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CartSaveCommand extends AbstractCommand implements CommandInterface
{
    private CartRepository $cartRepository;
    private ProductRepository $productRepository;

    public function __construct(EntityManagerInterface $entityManager, CartRepository $cartRepository, ProductRepository $productRepository) {

        parent::__construct($entityManager);

        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(Request $request): int
    {
        $session = $request->getSession();
        $session->start();

        $cart = new Cart();
        $cart->setSessionId($session->getId());
        $this->entityManager->persist($cart);
        foreach(json_decode($request->getContent(),true) as $product) {
            var_dump($this->productRepository->find($product[0]['id']));
            $x = $this->productRepository->find($product[0]['id']);
            $cart->addProduct($x);
            $this->entityManager->persist($x);
        }
        $this->entityManager->flush();
        return true;
    }
}
