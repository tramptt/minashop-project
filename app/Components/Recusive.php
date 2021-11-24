<?php 

namespace App\Components;
use App\Menu;
use App\Category;

class Recusive{

	private $arr_cate;
	private $arr_menu;
	public function __construct(){
		$this->arr_cate = []; 
	}

	//Đệ quy
	public function categoryRecusive($id=0,$text=''){
		$data = Category::get();
    	foreach ($data as $value) {
			if($value['parent_id'] == $id){
				$this->arr_cate[]= [
					'id'	=> $value['id'],
					'name'	=> $text.$value['name']
				];
				$this->categoryRecusive($value['id'],$text.'-');
			}
		}
		return $this->arr_cate;

    }

    //De quy 2
    public function menuRecusive($parent_id=0,$text=''){
    	$data = Menu::where('parent_id',$parent_id)->get();
    	foreach ($data as $value) {
			$this->arr_menu[]= [
				'id'	=> $value['id'],
				'name'	=> $text.$value['name']
			];
			$this->menuRecusive($value['id'],$text.'--');
		}
		return $this->arr_menu;

    }

}