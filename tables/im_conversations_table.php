<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if (! Schema::hasTable('im_conversations', 'data')) {
    Schema::create('im_conversations', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('对话表表ID');
        $table->integer('user_id')->nullable()->default(0)->comment('创建对话用户UID');
        $table->bigInteger('cid')->index()->nullable()->default(0)->comment('对话id');
        $table->string('name')->nullable()->dafault(null)->comment('对话名称');
        $table->string('pwd')->nullable()->default(null)->comment('加入对话密码');
        $table->tinyInteger('is_disabled')->nullable()->default(0)->comment('是否被禁用,1:是 0:否');
        $table->tinyInteger('type')->nullable()->default(0)->comment('对话类型 0:私聊 1:群聊 2:聊天室');
        $table->text('uids')->nullable()->comment('已加入聊天的用户UID');
        $table->timestamps();
    });
}
