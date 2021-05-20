<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create( [
            'id'=>1,
            'category'=>'Children',
            'name'=>'Book 1',
            'price'=>'500'
        ] );
         Book::create( [
            'id'=>2,
            'category'=>'Children',
            'name'=>'Book 2',
            'price'=>'500'
        ] );
          Book::create( [
            'id'=>3,
            'category'=>'Children',
            'name'=>'Book 3',
            'price'=>'500'
        ] );
           Book::create( [
            'id'=>4,
            'category'=>'Children',
            'name'=>'Book 4',
            'price'=>'500'
        ] );
            Book::create( [
            'id'=>5,
            'category'=>'Children',
            'name'=>'Book 5',
            'price'=>'500'
        ] );
             Book::create( [
            'id'=>6,
            'category'=>'Fiction',
            'name'=>'Book 6',
            'price'=>'500'
        ] );
              Book::create( [
            'id'=>7,
            'category'=>'Fiction',
            'name'=>'Book 7',
            'price'=>'500'
        ] );
               Book::create( [
            'id'=>8,
            'category'=>'Fiction',
            'name'=>'Book 8',
            'price'=>'500'
        ] );
                Book::create( [
            'id'=>9,
            'category'=>'Fiction',
            'name'=>'Book 9',
            'price'=>'500'
        ] );
                 Book::create( [
            'id'=>10,
            'category'=>'Fiction',
            'name'=>'Book 10',
            'price'=>'500'
        ] );

    }
}
