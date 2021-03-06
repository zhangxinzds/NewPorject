<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

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

	public function info()
    {
        return $this->hasMany('App\Http\Model\Admin\OrderInfo','oid','id');
    }
}
