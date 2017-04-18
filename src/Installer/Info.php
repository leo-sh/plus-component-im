<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer;

use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\{
    asset
};
use Zhiyi\Component\Installer\PlusInstallPlugin\ComponentInfoInterface;

class Info implements ComponentInfoInterface
{
    /**
     * The component display name.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getName(): string
    {
        return '即时通讯';
    }

    /**
     * The component logo.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getLogo(): string
    {
        return asset('logo.png');
    }

    /**
     * The component Admin manage row icon.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getIcon(): string
    {
        return asset('logo.png');
    }

    /**
     * The component manage entry.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getAdminEntry()
    {
    }
}
