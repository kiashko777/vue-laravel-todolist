<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;

class ItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return void
   */
  public function index()
  {
    return Item::orderBy('created_at', 'DESC')->get();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return void
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return void
   */
  public function store(Request $request)
  {
    $newItem = new Item;
    $newItem->name = $request->item['name'];
    $newItem->save();
    return $newItem;
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return void
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return void
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return void
   */
  public function update(Request $request, $id)
  {
    $existingItem = Item::find($id);

    if ($existingItem) {
      $existingItem->completed = $request->item['completed'] ? true : false;
      $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
      $existingItem->save();
      return $existingItem;
    }

    return "Item not found!";
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return void
   */
  public function destroy($id)
  {
    $existingItem = Item::find($id);
    if ($existingItem) {
      $existingItem->delete();
      return "Item deleted!";
    }

    return "Item not found!";


  }
}
