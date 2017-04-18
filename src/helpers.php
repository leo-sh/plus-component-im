<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm;

use function asset as plus_asset;
use function array_get;

/**
 * Generate an asset path for the application.
 *
 * @param string $path
 * @param bool $secure
 * @return string
 * @author Seven Du <shiweidu@outlook.com>
 * @homepage http://medz.cn
 */
function asset($path, $secure = null)
{
    $path = asset_path($path);
    return plus_asset($path, $secure);
}

/**
 * Get The component resource asset path.
 *
 * @param string $path
 * @return string
 * @author Seven Du <shiweidu@outlook.com>
 * @homepage http://medz.cn
 */
function asset_path($path)
{
    return component_name().'/'.$path;
}

/**
 * Get the component base path.
 *
 * @param string $path
 * @return string
 * @author Seven Du <shiweidu@outlook.com>
 * @homepage http://medz.cn
 */
function base_path($path = '')
{
    return dirname(__DIR__).'/'.$path;
}

/**
 * Get the component name.
 *
 * @return string
 * @author Seven Du <shiweidu@outlook.com>
 * @homepage http://medz.cn
 */
function component_name()
{
    return 'zhiyicx/plus-component-im';
}

/**
 * Include file.
 *
 * @param string $filename file path
 * @return bool
 * @throws \Exception
 * 
 * @author Seven Du <shiweidu@outlook.com>
 */
function includeFile($filename): bool
{
    static $included = [];

    if (! file_exists($filename)) {
        throw new \Exception('The "%s" does not exist.', 1);
        
    }

    if (array_get($included, $filename, false) === false) {
        include $filename;
        $included[$filename] = true;
    }

    return true;
}
