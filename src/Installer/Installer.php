<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Closure;
use Zhiyi\Plus\Models\CommonConfig;
use Illuminate\Support\Facades\Schema;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\includeFile;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\base_path as component_base_path;

class Installer extends AbstractInstaller
{
    /*
     |----------------------------------------------------------
     | The component config options.
     |----------------------------------------------------------
     |
     | "static::$configNamespace" is component config row namespace.
     | "static::$configName" is component config row name.
     | "static::$configDefaultServiceURL" is component config row "value" default value.
     |
     */
    protected static $configNamespace = 'im';
    protected static $configName = 'serverurl';
    protected static $configDefaultServiceURL = '127.0.0.1:9900';

    /**
     * Instance The component Info class.
     *
     * @return \Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer\Info
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getComponentInfo()
    {
        return app(Info::class);
    }

    /**
     * Get the component router.
     *
     * @return string Router filename
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function router()
    {
        return component_base_path('src/router.php');
    }

    /**
     * The component install hook.
     *
     * @param Closure $next call back function
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function install(Closure $next)
    {
        // Created IM config.
        $this->setDefaultConfig();

        // Created tables.
        includeFile(component_base_path('tables/im_conversations_table.php'));
        includeFile(component_base_path('tables/im_users_table.php'));

        // Run next.
        $next();

        // Tips output.
        $this->output->success('Installed the IM component successfully.');
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
        $next();
    }

    /**
     * uninstall component.
     * @param  Closure $next [description]
     * @return [type]        [description]
     */
    public function uninstall(Closure $next)
    {
        Schema::dropIfExists('im_users');
        Schema::dropIfExists('im_conversations');
        $next();
    }

    /**
     * setting static files.
     * @return [type] [description]
     */
    public function resource()
    {
        return component_base_path('resource');
    }

    /**
     * Setting default IM conging and created common config row.
     *
     * @throws \Exception
     *
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function setDefaultConfig()
    {
        $config = CommonConfig::byNamespace(static::$configNamespace)
            ->byName(static::$configName)
            ->get();

        if (! $config) {
            $config = new CommonConfig();
            $config->namespace = static::$configNamespace;
            $config->name = static::$configName;
            $config->value = static::$configDefaultServiceURL;
            if (! $config->save()) {
                throw new \Exception('Init IM config row fial.');
            }
        }
    }
}
