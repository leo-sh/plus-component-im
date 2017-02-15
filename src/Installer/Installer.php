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
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:54:28+080
     *
     * @version  1.0
     *
     * @return string
     */
    public function getLogo(): string
    {
        return 'zhiyicx/plus-component-im/logo.png';
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
     * 指定资源目录.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:55:09+080
     *
     * @version  1.0
     */
    public function resource()
    {
        return $this->base_path('/resource');
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
        $path = dirname(__DIR__);
        include_once $path.'/Database/im_conversations_table.php';
        include_once $path.'/Database/im_users_table.php';
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

    /**
     * 注册路由.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T16:29:18+080
     *
     * @version  1.0
     *
     * @return
     */
    public function router()
    {
        return $this->base_path('/routes/api.php');
    }

    /**
     * update.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T13:58:03+080
     *
     * @version  1.0
     *
     * @param Closure $next
     */
    public function update(Closure $next)
    {
        $next();
    }

    /**
     * 拼接应用根路径方法.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-13T16:46:37+080
     *
     * @version  1.0
     *
     * @param string $path 拼接的路径
     *
     * @return string 包含应用根路径的目录
     */
    private function base_path($path = ''): string
    {
        return dirname(dirname(__DIR__)).$path;
    }
}
