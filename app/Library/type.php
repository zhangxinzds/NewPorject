<?php 
    use App\Http\Model\Admin\Type;
     //无限级分类
    function getCategoryMessage($pid)
    {

        $cate = Type::where('pid',$pid)->get();
        
        $type = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=getCategoryMessage($v->id);

                $type[]=$v;
            }
        }
        return $type;
    }
