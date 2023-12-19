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
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $cart = new Cart();
        $cart->setSessionId($this->session->getId());
        foreach($request->get('card') as $product) {
            $serializer->deserialize($product, Product::class, 'json');

            $cart->addProduct($product);
        }
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        return true;
    }
}
