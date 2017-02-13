<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Closure;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use Illuminate\Support\Facades\Schema;

class Installer extends AbstractInstaller
{
    const APP_NAME = 'component-im';

    /**
     * Get plus-name.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-10T15:48:31+080
     *
     * @version  1.0
     *
     * @return string 名称
     */
    public function getName(): string
    {
        return static::APP_NAME;
    }

    /**
     * 获取版本.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:54:28+080
     *
     * @version  1.0
     *
     * @return string 版本号
     */
    public function getVersion(): string
    {
        return '1.0.0';
    }

    /**
     * Get the component logo.
     *
     * @return string
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function getLogo(): string
    {
        return '';
    }

    /**
     * 获取作者信息.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:55:09+080
     *
     * @version  1.0
     *
     * @return array 包含的作者信息
     */
    public function getAuthor(): array
    {
        return [
            'name' => 'martinsun',
            'email' => 'syh@sunyonghong.com',
            'homepage' => 'https://github.com/zhiyicx/plus-component-im',
        ];
    }

    /**
     * 安装方法.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:57:35+080
     *
     * @version  1.0
     *
     * @param Closure $next
     */
    public function install(Closure $next)
    {
        $path = dirname(__FILE__);
        include_once $path.'/Database/im_conversations_table.php';
        include_once $path.'/src/Database/im_users_table.php';
        $next();
    }

    /**
     * 卸载方法.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:58:03+080
     *
     * @version  1.0
     *
     * @param Closure $next
     */
    public function uninstall(Closure $next)
    {
        Schema::dropIfExists('im_users');
        Schema::dropIfExists('im_conversations');
        $next();
    }
}
