<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Closure;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use Illuminate\Support\Facades\Schema;

class Im extends AbstractInstaller
{
    const APP_NAME = 'component-im';

    /**
     * Get plus-name.
     *
     * @author martinsun <syh@sunyonghong.com>
     * @datetime 2017-02-10T15:48:31+080
     *
     * @version  [version]
     *
     * @return string [description]
     */
    public function getName(): string
    {
        return static::APP_NAME;
    }

    /**
     * Get the component version.
     *
     * @return string
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function getVersion(): string
    {
        return '1.0.0';
    }

    /**
     * Get The component developer author info.
     *
     * @return array
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function getAuthor(): array
    {
        return [
            'name' => 'martinsun',
            'email' => 'syh@sunyonghong.com',
            'homepage' => 'https://github.com/MartinsunPHP',
        ];
    }

    /**
     * Get the component route file.
     *
     * @return string
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function router()
    {
        return route_path();
    }

    /**
     * Get the component resource dir.
     *
     * @return string
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function resource()
    {
        return resource_path();
    }

    /**
     * Do run the cpmponent install.
     *
     * @param Closure $next
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function install(Closure $next)
    {
        $path = dirname(__FILE__);
        include_once $path.'/Database/im_conversations_table.php';
        include_once $path.'/src/Database/im_users_table.php';
        $next();
    }

    /**
     * Do run update the compoent.
     *
     * @param Closure $next
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function update(Closure $next)
    {
        include component_base_path('/src/table_column.php');
        $next();
    }

    public function uninstall(Closure $next)
    {
        Schema::dropIfExists('component_example');
        $next();
    }
}
