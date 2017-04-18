<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if (!Schema::hasTable('im_users', 'data')) {
    Schema::create('im_users', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('表ID');
        $table->integer('user_id')->unique()->nullable()->default(0)->comment('用户ID');
        $table->string('im_password')->nullable()->default('')->comment('聊天用户登陆的密码');
        $table->tinyInteger('is_disabled')->nullable()->default(0)->comment('是否被禁用,1:是 0:否');
        $table->timestamps();
        $table->softDeletes();
    });
}
