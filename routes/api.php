<?php

use Zhiyi\Plus\Http\Middleware;

// IM相关接口
Route::prefix('api/v1/im')
    ->middleware('auth:api')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\Controllers')
    ->group(function () {
        Route::get('/users', 'ImController@getImAccount'); //获取聊天授权账号
        Route::post('/conversations', 'ImController@createConversations'); //创建聊天
        Route::get('/conversations/{cid}', 'ImController@getConversation'); //获取单个聊天信息
        Route::get('/conversations/list/all', 'ImController@getConversationList'); //获取某个用户聊天列表
        Route::patch('/users', 'ImController@refresh'); //刷新授权
        Route::delete('/conversations/{cid}', 'ImController@deleteConversation'); //删除对话
        Route::post('/conversations/members/limited/{cid}', 'ImController@disableLimited'); //对话成员限制
        Route::delete('/conversations/members/limited/{cid}/{uid}', 'ImController@enabledLimited'); //移除对话中限制的成员
        Route::delete('/conversations/members/{cid}', 'ImController@exitConversations'); //退出对话
        Route::delete('/conversations/members/{cid}/{uid}', 'ImController@deleteMembers'); //剔除指定成员
    });
