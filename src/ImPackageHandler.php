<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm;

use Zhiyi\Plus\Support\PackageHandler;

class ImPackageHandler extends PackageHandler
{
    /**
     * Install handle.
     *
     * @param [type] $command
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function installHandle($command)
    {
        include dirname(__DIR__).'/database/up.php';
        $command->info('Installed the IM component successfully.');
    }

    /**
     * remove handle.
     *
     * @param [type] $command
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function removeHandle($command)
    {
        include dirname(__DIR__).'/database/down.php';
        $command->info('success.');
    }
}
