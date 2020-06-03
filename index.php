<?php

class Product {
    public int $id; # ID товара
    public string $name; # имя товара
    public int $cost; # цена товара

    public function __construct(int $id, string $name, int $cost) {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
    }
}

class ProductInfo extends Product {
    public string $description; # описание товара
    public array $images; # массив картинок товара
    public int $inStock; # количество товара в наличие

    public function __construct(int $id, string $name, int $cost, string $description, array $images, int $inStock) {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->$description = $description;
        $this->images = $images;
        $this->inStock = $inStock;
    }
}

class User {
    public int $id;
    public string $name;
    public string $password;
    public int $isAdmin;

    public function checkPassword(string $password) {
        if ($password == $this->password) {
            return true;
        } else {
            return false;
        }
    }

    public function __construct(int $id, string $name, string $password, int $isAdmin) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }
}

// 5 задание выведет 1, 2, 3, 4. Потому что статик считает в классе (не помню как правильно объясняется :( )
// 6 задание выведет 1, 1, 2, 2. По той же причине
// 7 задание ничем не отличается кроме скобок при создании объекта. Результат будет как в шестом.  

?>