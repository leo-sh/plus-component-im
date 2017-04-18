<?php
namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Closure;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use Zhiyi\Plus\Models\CommonConfig;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function  Zhiyi\Component\ZhiyiPlus\PlusComponentIm\{
    base_path as component_base_path,
    includeFile
};

class Installer extends AbstractInstaller
{
    protected static $configNamespace = 'im';
    protected static $configName = 'serverurl';
    protected static $configDefaultServiceURL = '127.0.0.1:9900';

    public function getComponentInfo()
    {
        return new Info();
    }

	/**
	 * register routers
	 * @return [type] [description]
	 */
	public function router()
	{
		return dirname(__DIR__).'/router.php';
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
	 * component installer
	 * @param  Closure $next [description]
	 * @return [type]        [description]
	 */
	public function install(Closure $next)
	{

        $config = [
            'name' => 'serverurl',
            'namespace' => 'im',
            'value' => '192.168.2.222:9900',
        ];
        CommonConfig::create($config);

        $path = dirname(__DIR__);
        include_once $path.'/Database/im_conversations_table.php';
        include_once $path.'/Database/im_users_table.php';
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
        $next();
    }

    /**
     * uninstall component
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
     * setting static files
     * @return [type] [description]
     */
    public function resource()
    {
        return component_base_path('/resource');
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