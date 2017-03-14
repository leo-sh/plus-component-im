<?php
namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use Zhiyi\Component\Installer\PlusInstallPlugin\ComponentInfoInterface;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\{
    asset
};

class Info implements ComponentInfoInterface
{
	/**
	 * 应用名称
	 *  
	 * @author bs<414606094@qq.com>
	 * @return string
	 */
	public function getName(): string
	{
		return 'component-im';
	}

	/**
	 * 应用logo
	 * 
	 * @author bs<414606094@qq.com>
	 * @return string
	 */
	public function getLogo(): string
	{
		return asset('resource/logo.png');
	}

	/**
	 * 应用图标
	 *  
	 * @author bs<414606094@qq.com>
	 * @return string
	 */
	public function getIcon(): string
	{
		return asset('images/logo.png');
	}

	/**
	 * 后台入口
	 * 
	 * @author bs<414606094@qq.com>
	 * @return string
	 */
	public function getAdminEntry()
	{
		return 'http://www.baidu.com';
	}
}