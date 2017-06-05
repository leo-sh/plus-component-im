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
        // database up.
        include dirname(__DIR__).'/database/up.php';

        // publish asstes.
        $command->call('vendor:publish', [
            '--provider' => ImServiceProvider::class,
            '--tag' => 'public',
            '--force' => true,
        ]);

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
