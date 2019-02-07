<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ColorImg extends Model
{
    protected $table = 'color_img';

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
}
