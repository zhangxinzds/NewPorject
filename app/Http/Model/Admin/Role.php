<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

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

    public function per()
    {
        return $this->belongsToMany('App\Http\Model\Admin\Permission', 'role_permission', 'role_id', 'per_id');
    }
}
