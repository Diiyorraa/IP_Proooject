<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;
use App\Models\Item;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::all();
        return view('shoppingList.index', compact('shoppingLists'));
    }

    public function show($id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        $items = $shoppingList->items;
        return view('shoppingList.show', compact('shoppingList', 'items'));
    }

    public function create($id)
    {
        return view('shoppingList.create');
    }

    public function store(Request $request)
    {
        if ($request->has('name')) {
            if ($this->ValidateName($request->input('name'))) {
                $shoppingList = new ShoppingList();
                $shoppingList->name = $request->input('name');
                $shoppingList->save();
            }
        }
        return redirect()->route('shoppingList.index');
    }


    public function edit($id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        return view('shoppingList.edit', compact('shoppingList'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('name')) {
            if ($this->ValidateName($request->input('name'))) {
                $shoppingList = ShoppingList::findOrFail($id);
                $shoppingList->name = $request->input('name');
                $shoppingList->save();
            }
        }
        return redirect()->route('shoppingList.show', ['id' => $id]);
    }

    public function delete($id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        $shoppingList->delete();
        return redirect()->route('shoppingList.index');
    }

    function ValidateName($name)
    {
        if (preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $name))
            if (ShoppingList::where('name', $name)->count() == 0)
                return true;

        return false;
    }
}
