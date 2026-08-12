<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminBannersController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "title";
			$this->limit = "20";
			$this->orderby = "updated_at,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "banners";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Judul Banner","name"=>"title"];
			$this->col[] = ["label"=>"Foto Banner","name"=>"image","image"=>true];
			$this->col[] = ["label"=>"Link Target","name"=>"link"];
			$this->col[] = ["label"=>"Tipe Banner","name"=>"type"];
			$this->col[] = ["label"=>"Aktif","name"=>"is_active"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Judul Banner','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Foto Banner','name'=>'image','type'=>'upload','validation'=>'required|image|max:3000','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP. Upload image size must be less than 3MB.'];
			$this->form[] = ['label'=>'Link Target','name'=>'link','type'=>'text','validation'=>'nullable|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tipe Banner','name'=>'type','type'=>'select','dataenum'=>'landscape;square','width'=>'col-sm-10','validation'=>'required'];
			$this->form[] = ['label'=>'Aktif','name'=>'is_active','type'=>'radio','dataenum'=>'1|Aktif;0|Nonaktif','width'=>'col-sm-10','validation'=>'required'];
			# END FORM DO NOT REMOVE THIS LINE
		}
	}
