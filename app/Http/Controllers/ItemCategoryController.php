<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use App\Http\Requests\ItemCategory as RequestsItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        $itemCategories = ItemCategory::all();

        return view('item.category.index', compact('itemCategories'));
    }

    public function create()
    {
        return view('item.category.create');
    }

    public function store(ItemCategory $itemCategory, RequestsItemCategory $request)
    {
        $itemCategory->create($request->all());

        $notification = array(
            'message' => 'Category successfully created',
            'alert-type' => 'success'
        );

        return $itemCategory->indexUrl($notification); 
    }

    public function edit(ItemCategory $itemCategory)
    {
        $category = $itemCategory->findOrFail(request()->id);
      
        return view('item.category.edit', compact('category'));
    }

    public function update(ItemCategory $itemCategory, RequestsItemCategory $request) {

        $itemCategory->findOrFail($request->id)
                    ->update($request->all());

        $notification = array(
            'message' => 'Category successfully updated',
            'alert-type' => 'info'
        );
        
        return $itemCategory->indexUrl($notification);
    }

    public function destroy(ItemCategory $itemCategory)
    {
        $category = $itemCategory->findOrFail(request('id'));
        
        $isDeleted = $category->delete();

        if (!$isDeleted) {
            return response()->json([
                'status' => 404,
                'message' => 'failed to delete data'
            ]);    
        }

        return response()->json([
            'status' => 200,
            'message' => $category->name.' deleted sucessfully'
        ]);
 
    }
}
