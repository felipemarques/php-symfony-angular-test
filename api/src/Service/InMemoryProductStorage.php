<?php

namespace App\Service;

class InMemoryProductStorage
{
    private static array $products = [
        1  => ['id' => 1,  'name' => 'Laptop HP Pavilion 15',           'description' => 'HP Pavilion 15 com processador Intel Core i5, 8GB RAM e SSD de 256GB.',                        'price' => 699.99],
        2  => ['id' => 2,  'name' => 'Dell Inspiron 15 5000',            'description' => 'Dell Inspiron 15 com processador Intel Core i7, 16GB RAM e SSD de 512GB.',                       'price' => 899.99],
        3  => ['id' => 3,  'name' => 'Lenovo ThinkPad E14',              'description' => 'Lenovo ThinkPad E14, ideal para negócios com segurança aprimorada.',                             'price' => 849.00],
        4  => ['id' => 4,  'name' => 'Apple MacBook Air 13',             'description' => 'Apple MacBook Air 13 com chip M1, desempenho e autonomia excepcionais.',                         'price' => 999.99],
        5  => ['id' => 5,  'name' => 'Asus ZenBook 14',                  'description' => 'Asus ZenBook 14 ultrafino, com display NanoEdge e bateria de longa duração.',                    'price' => 799.99],
        6  => ['id' => 6,  'name' => 'Acer Swift 3',                     'description' => 'Acer Swift 3 leve e portátil, com performance para tarefas diárias.',                           'price' => 649.99],
        7  => ['id' => 7,  'name' => 'Microsoft Surface Laptop 4',       'description' => 'Microsoft Surface Laptop 4 com design premium e excelente performance.',                        'price' => 1199.99],
        8  => ['id' => 8,  'name' => 'Dell XPS 13',                      'description' => 'Dell XPS 13 com display InfinityEdge, ideal para profissionais.',                               'price' => 1099.99],
        9  => ['id' => 9,  'name' => 'HP Envy 13',                       'description' => 'HP Envy 13 com design elegante e performance robusta.',                                          'price' => 949.99],
        10 => ['id' => 10, 'name' => 'Lenovo Yoga C740',                 'description' => 'Lenovo Yoga C740 conversível, perfeito para trabalho e entretenimento.',]
    ];

    public static function getAll(): array
    {
        return array_values(self::$products);
    }

    public static function get(int $id): ?array
    {
        return self::$products[$id] ?? null;
    }

    public static function add(array $product): array
    {
        // Gere um novo ID (simplesmente incrementando a contagem)
        $id = count(self::$products) + 1;
        $product['id'] = $id;
        self::$products[$id] = $product;
        return $product;
    }

    public static function update(int $id, array $product): ?array
    {
        if (!isset(self::$products[$id])) {
            return null;
        }
        $product['id'] = $id;
        self::$products[$id] = $product;
        return $product;
    }

    public static function delete(int $id): bool
    {
        if (!isset(self::$products[$id])) {
            return false;
        }
        unset(self::$products[$id]);
        return true;
    }
}
