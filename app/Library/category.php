<?php 
	function category($id){
		$rs = DB::table('type')->where('id',$id)->first();
		if($id=='0'){
			return '顶级分类';
		}else{
			return $rs->name;
		}
	}
?>