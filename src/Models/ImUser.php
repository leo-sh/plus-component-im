<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Models;

use Illuminate\Database\Eloquent\Model;

class ImUser extends Model
{
    /**
     * 定义表名.
     *
     * @var string
     */
    protected $table = 'im_users';

    /**
     * 定义允许更新的字段.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'username', 'im_password', 'is_disabled'];

    /**
     * 定义隐藏的字段.
     *
     * @var array
     */
    protected $hidden = ['id', 'is_disabled', 'deleted_at', 'username', 'created_at', 'updated_at'];

    /**
     * 将字段调整为日期属性.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
