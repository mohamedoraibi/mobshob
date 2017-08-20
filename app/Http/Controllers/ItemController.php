<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Item;
use Illuminate\Http\Request;
use Validator;

class ItemController extends Controller
{
    // go to items page in dashboard
    public function getItems()
    {
        $Item = Item::all();
        $Categories = Categories::all();
        return view('mobAdmin.items.showAll', compact('Item','Categories'));
    }
// insert new item with make validation to it in dashboard
    public function insertItem(Request $request)
    {
// make validation to item information
        $validator = Validator::make($request->all(), [
            'item_name' => 'required ',
            'item_id' => 'required|unique:items',
            'item_number' => 'required|unique:items',
            'item_price' => 'required',
            'item_company' => 'required',
            'item_summary' => 'required',
            'item_image_link' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {
// get item information & save it in database from dashboard
            $Item = new Item;
            $Item->item_name = $request->item_name;
            $Item->item_id = $request->item_id;
            $Item->item_number = $request->item_number;
            $Item->item_price = $request->item_price;
            $Item->item_company = $request->item_company;
            $Item->item_summary = $request->item_summary;
            $Item->item_description = $request->item_description;
            $Item->item_image_link = $request->item_image_link;
            $Item->save();
            return redirect('/dashboard/items');
        }
    }
// delete item from dashboard
    public function deleteItem($id)
    {
        $Item = Item::find($id);
        $Item->delete();
        return redirect('/dashboard/items');
    }
// edit item information & make validation from dashboard
    public function updateItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required ',
            'item_id' => 'required',
            'item_number' => 'required',
            'item_price' => 'required',
            'item_company' => 'required',
            'item_summary' => 'required',
            'item_description' => 'required',
            'item_image_link' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {
            $Item = Item::find($request->item_id_edit);
            $Item->item_name = $request->item_name;
            $Item->item_id = $request->item_id;
            $Item->item_number = $request->item_number;
            $Item->item_price = $request->item_price;
            $Item->item_company = $request->item_company;
            $Item->item_summary = $request->item_summary;
            $Item->item_description = $request->item_description;
            $Item->item_image_link = $request->item_image_link;
            $Item->save();
            return redirect('/dashboard/items');
        }
    }

    // go to update page in dashboard
    public function updateItemPage($id)
    {
        $Item = Item::find($id);
        return view('mobAdmin.items.updateItem', compact('Item'));
    }
// search item in dashboard page
    public function index(Request $request)
    {
        $search = $request->search;
        $searchResults = Item::where('item_name', 'like', '%' . $search . '%')
            ->get();
        $Item = Item::all();
        return view('mobAdmin.items.showAll', compact('searchResults', 'Item'));
    }
}
