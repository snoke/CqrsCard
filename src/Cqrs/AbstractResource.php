<?php
namespace App\Cqrs;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
class AbstractResource
{

    private Serializer $serializer;
    public function __construct() {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder(), new JsonEncoder()]);
    }
    protected function serialize($data,$format='json') {
        return $this->serializer->serialize($data,$format);
    }
}