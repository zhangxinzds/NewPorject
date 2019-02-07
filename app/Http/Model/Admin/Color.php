<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';

    protected $primarykey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

    public function colorimg()
    {
        return $this->hasMany('App\Http\Model\Admin\ColorImg','cid','id');
    }
}
