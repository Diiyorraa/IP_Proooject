<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $item = Item::findOrFail($id);
        $areSame = $item->name == $name;
        if ($this->ValidateName($name, $item->shopping_list_id, $areSame) && $this->ValidateQuantity($request->quantity)) {
            $item->name = $request->input('name');
            $item->quantity = $request->input('quantity');
            $item->save();
        }

        return redirect()->route('shoppingList.show', ['id' => $item->shopping_list_id]);
    }

    public function create($id)
    {
        return view('item.create', ['id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $name = $request->name;
        $shoppingListId = $id;
        if ($this->ValidateName($name, $shoppingListId, false) && $this->ValidateQuantity($request->quantity)) {
            $item = new Item();
            $item->name = $name;
            $item->quantity = $request->input('quantity');
            $item->shopping_list_id = $shoppingListId;
            $item->save();
        }

        return redirect()->route('shoppingList.show', ['id' => $shoppingListId]);
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('shoppingList.show', ['id' => $item->shopping_list_id]);
    }

    function ValidateName($name, $shopListId, $areSame)
    {
        if (preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $name))
            if ($areSame || Item::where('shopping_list_id', $shopListId)->where('name', $name)->count() == 0)
                return true;

        return false;
    }

    function ValidateQuantity($quantity)
    {
        if (preg_match('/^[0-9]{1,2}$/', $quantity) && $quantity > 0 && $quantity < 50)
            return true;

        return false;
    }
}
