<?php
namespace App\Action\Command;

use App\Action\AbstractAction;
use App\Entity\Cart;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class CartSaveCommand extends AbstractAction implements CommandInterface
{
    private EntityManagerInterface $entityManager;
    private CartRepository $cartRepository;
    private ProductRepository $productRepository;

    public function __construct(Request $request, EntityManagerInterface $entityManager, CartRepository $cartRepository, ProductRepository $productRepository) {

        parent::__construct( $request);

        $this->entityManager = $entityManager;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(array $products = null, int $sessionId = null): int
    {
        $cart = new Cart();
        $cart->setSessionId($this->session->getId());
        foreach($products as $product) {
            $cart->addProduct($product);
        }

        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        return true;
    }
}
