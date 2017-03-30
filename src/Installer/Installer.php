<?php
namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Closure;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use Zhiyi\Plus\Models\CommonConfig;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function  Zhiyi\Component\ZhiyiPlus\PlusComponentIm\{
    asset_path,
    route_path,
    resource_path,
    base_path as component_base_path
};

class Installer extends AbstractInstaller
{   

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

}