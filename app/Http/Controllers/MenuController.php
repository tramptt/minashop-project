<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Components\Recusive;

class MenuController extends Controller
{
    //

    public function __construct(Menu $menu){
    	$this->menu = $menu;
    }
    public function index(){
    	$list_menu = $this->menu->paginate(3);
    	return view('menus.index', ['list_menu'=>$list_menu]);
    }
    public function create(){
    	$menu_recusive 	= new Recusive();
    	$list_menu 		= $menu_recusive->menuRecusive();
    	return view('menus.add',['list_menu'=>$list_menu]);
    }
    public function store(Request $request){
    	$data = $this->menu->create([
    		'name'		=> $request['name'],
    		'parent_id' => $request['parent_id'],
    		'slug'		=> str_slug($request['name'])
    	]);
    	return redirect()->route('menus.index');

    }
    public function edit($id){
    	$menu_recusive 	= new Recusive();
    	$list_menu 		= $menu_recusive->menuRecusive();
    	$menus     		= $this->menu->find($id);
    	return view('menus.edit',['list_menu'=>$list_menu,'menus'=> $menus]);
    }
    public function delete(){
    	$menu_recusive 	= new Recusive();
    	$list_menu 		= $menu_recusive->menuRecusive();
    	return view('menus.add',['list_menu'=>$list_menu]);
    }
}
