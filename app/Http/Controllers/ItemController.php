<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Validator;

class ItemController extends Controller
{
    public function getItems()
    {
        $Item = Item::all();
        return view('mobAdmin.items.showAll', compact('Item'));
    }

    public function insertItem(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'item_name' => 'required ',
            'item_id' => 'required|unique:items',
            'item_number' => 'required|unique:items',
            'item_company' => 'required',
            'item_summary' => 'required',
            'item_image_link' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->back()->WithErrors($validator->errors()->all())->withInput();
        else {

            $Item = new Item;
            $Item->item_name = $request->item_name;
            $Item->item_id = $request->item_id;
            $Item->item_number = $request->item_number;
            $Item->item_company = $request->item_company;
            $Item->item_summary = $request->item_summary;
            $Item->item_description = $request->item_description;
            $Item->item_image_link = $request->item_image_link;
            $Item->save();
            return redirect('/dashboard/items');
        }
    }

    public function deleteItem($id)
    {
        $Item = Item::find($id);
        $Item->delete();
        return redirect('/dashboard/items');
    }

    public function updateItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required ',
            'item_id' => 'required',
            'item_number' => 'required',
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
            $Item->item_company = $request->item_company;
            $Item->item_summary = $request->item_summary;
            $Item->item_description = $request->item_description;
            $Item->item_image_link = $request->item_image_link;
            $Item->save();
            return redirect('/dashboard/items');
        }
    }

    public function updateItemPage($id)
    {
        $Item = Item::find($id);
        return view('mobAdmin.items.updateItem', compact('Item'));
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $searchResults = Item::where('item_name', 'like', '%' . $search . '%')
            ->get();
        $Item = Item::all();
        return view('mobAdmin.items.showAll', compact('searchResults', 'Item'));
    }
}
