<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
      /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'manager';

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

    public function role()
    {
        return $this->belongsToMany('App\Http\Model\Admin\Role', 'user_role', 'user_id', 'role_id');
    }
}
