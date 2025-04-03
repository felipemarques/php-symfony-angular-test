<?php

namespace App\Controller;

use App\Service\InMemoryProductStorage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController
{
    #[Route('/api/products', name: 'get_products', methods: ['GET'])]
    public function getCollection(): JsonResponse
    {
        $products = InMemoryProductStorage::getAll();
        return new JsonResponse($products);
    }

    #[Route('/api/products/{id}', name: 'get_product', methods: ['GET'])]
    public function getItem(int $id): JsonResponse
    {
        $product = InMemoryProductStorage::get($id);
        if (!$product) {
            return new JsonResponse(['error' => 'Produto não encontrado'], 404);
        }
        return new JsonResponse($product);
    }

    #[Route('/api/products', name: 'create_product', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $product = InMemoryProductStorage::add($data);
        return new JsonResponse($product, 201);
    }

    #[Route('/api/products/{id}', name: 'update_product', methods: ['PUT'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $product = InMemoryProductStorage::update($id, $data);
        if (!$product) {
            return new JsonResponse(['error' => 'Produto não encontrado'], 404);
        }
        return new JsonResponse($product);
    }

    #[Route('/api/products/{id}', name: 'delete_product', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $deleted = InMemoryProductStorage::delete($id);
        if (!$deleted) {
            return new JsonResponse(['error' => 'Produto não encontrado'], 404);
        }
        return new JsonResponse(null, 204);
    }
}
