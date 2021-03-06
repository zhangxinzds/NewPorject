<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Size extends Model
{
    protected $table = 'size';

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
