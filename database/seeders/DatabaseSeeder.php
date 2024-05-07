<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShoppingList;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $shoppingList1 = new ShoppingList();
        $shoppingList1->name = 'Grocery List';
        $shoppingList1->save();

        $shoppingList2 = new ShoppingList();
        $shoppingList2->name = 'Home Defense List';
        $shoppingList2->save();

        // Create and save items associated with shopping lists
        $item1 = new Item();
        $item1->name = 'Milk 1L';
        $item1->quantity = 2;
        $item1->shopping_list_id = $shoppingList1->id;
        $item1->save();

        $item1 = new Item();
        $item1->name = 'Kiwi 1kg';
        $item1->quantity = 1;
        $item1->shopping_list_id = $shoppingList1->id;
        $item1->save();

        $item3 = new Item();
        $item3->name = 'M1 Abrams';
        $item3->quantity = 1;
        $item3->shopping_list_id = $shoppingList2->id;
        $item3->save();
    }
}
