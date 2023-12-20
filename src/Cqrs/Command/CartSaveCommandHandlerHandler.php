<?php
namespace App\Cqrs\Command;

use App\Cqrs\AbstractCommandHandler;
use App\Cqrs\CommandHandlerInterface;
use App\Entity\Cart;
use App\Entity\CartProduct;
use App\Entity\Command;
use App\Repository\CartRepository;
use App\Repository\CartProductRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CartSaveCommandHandlerHandler extends AbstractCommandHandler implements CommandHandlerInterface
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

    public function saveCommand(Command $command): void
    {

    }
    public function execute(RequestStack $requestStack,CartSaveCommand $command): int
    {
        foreach($this->cartRepository->findBy(['sessionId' => $command->getSessionId()]) as $cart) {

            foreach($this->cartProductRepository->findBy(['cart' => $cart]) as $cartProduct) {
                $this->entityManager->remove($cartProduct);
            };

            $this->entityManager->remove($cart);
        };

        $cart = new Cart();
        $cart->setSessionId($command->getSessionId());
        $this->entityManager->persist($cart);

        foreach($command->getProducts() as $product) {
            $entity = $this->productRepository->find($product['id']);
            $cartProduct = new CartProduct();
            $cartProduct->setCart($cart);
            $cartProduct->setProduct($entity);
            $this->entityManager->persist($cartProduct);
        }
        //$this->entityManager->persist($command);
        $this->entityManager->persist(new Command($command::class,$command->getSessionId(),json_encode($command->getProducts())));
        $this->entityManager->flush();
        return true;
    }
}
