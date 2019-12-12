<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['id' => 1 , 'description' => 'GNC', 'price' => 22.99, 'discount' => 10],
            ['id' => 2 , 'description' => 'Aceite', 'price' => 160, 'discount' => 0],
            ['id' => 3 , 'description' => 'Agua destilada x 1lts', 'price' => 40, 'discount' => 0],
            ['id' => 4 , 'description' => 'Agua destilada x 5lts', 'price' => 140, 'discount' => 0],
            ['id' => 5 , 'description' => 'Refrigerante x 1lts', 'price' => 45, 'discount' => 0],
            ['id' => 6 , 'description' => 'Refrigerante x 5lts', 'price' => 120, 'discount' => 0],
            ['id' => 7 , 'description' => 'Liquido de Frenos', 'price' => 60, 'discount' => 0],
            ['id' => 8 , 'description' => 'Hielo x 5kg', 'price' => 80, 'discount' => 0],
            ['id' => 9 , 'description' => 'Hielo x 13kg', 'price' => 140, 'discount' => 0],
        ]);
    }
}
