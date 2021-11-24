<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;

class CategoryController extends Controller
{
    //
	private  $arr_cate;
	private  $category;
    public function __construct(Category $category){
    	$this->arr_cate = [];
    	$this->category = $category;
    }
    
    public function index(){
    	$data 			= $this->category->latest()->paginate(5);
    	$list_parent 	= []; 
    	foreach ($data as $key => $value) {
    		$list_parent[$value['id']]= $value['name'];
    	}
    	return view('category.index',['list_category'=>$data,'list_parent'=>$list_parent]);
    }
    public function create(){

    	$data 			= $this->category->all();
    	$recusive 		= new Recusive();
    	$list_category  = $recusive->categoryRecusive(0);
    	return view('category.add',['list_category'=> $list_category]);
    }
    public function store(Request $request){
    	$data = $this->category->create([
    		'name' 		=> $request['name'],
    		'parent_id'	=> $request['parent_id'],
    		'slug'		=> str_slug($request['name'])
    	]);
    	return redirect()->route('categories.index');

    }
    public function edit($id){
    	$recusive 		= new Recusive();
    	$list_category  = $recusive->categoryRecusive(0);
        $categories     = $this->category->find($id);

    	return view('category.edit',['list_category'=> $list_category,'categories'=> $categories]);
    }
    public function update($id,Request $request){
        $data = $this->category->find($id)->update([
            'name'      => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug'      => str_slug($request['name'])
        ]);
        return redirect()->route('categories.index');

    }
    public function delete($id){
        $data = $this->category->find($id)->delete();
        
        return redirect()->route('categories.index');

    }
}
