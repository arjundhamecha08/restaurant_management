<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function show(){
        return view("admin-dashboard.add-menu");
    }
    public function index(){
        $menus = Menu::paginate(10);
        return view("admin-dashboard.manage-menu",compact("menus"));
    }
    public function create(Request $request){
        $request->validate( [
            "name"=> "required",
            "category"=> "nullable",
            "price"=>"required|numeric",
            "status"=>"required",
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->category = $request->category;
        $menu->price = $request->price;
        if($menu->save()){
            return redirect(route("menu-display"))->with("success","Item Added SuccessFully");
    }
    return redirect(route("menu-display"))->with("error","Item cannot Added");
    }

    public function delete(Request $request,$id){
        $menu = Menu::find($id);
        if($menu){
            $menu->delete();
            return redirect()->back()->with("success", "Item removed successfully.");
        }
        return redirect()->back()->with("error", "item not found.");
    }
}