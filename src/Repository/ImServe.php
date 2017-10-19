<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Repository;

use Zhiyi\Plus\Models\CommonConfig;
use Illuminate\Contracts\Cache\Repository as ContractsCacheRepository;

class ImServe
{
    /**
     * Cache store.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create the im serve reposttory instance.
     *
     * @param \Illuminate\Contracts\Cache\Repository $cache
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function __construct(ContractsCacheRepository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the im serve.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function get(): array
    {
        if ($this->cache->has($this->cacheKey())) {
            return $this->cache->get($this->cacheKey());
        }

        $serve = CommonConfig::firstOrCreate(
            ['name' => 'im:serve', 'namespace' => 'common'],
            ['value' => 'ws://127.0.0.1:9900']
        );

        $api = CommonConfig::firstOrCreate(
            ['name' => 'im:api', 'namespace' => 'common'],
            ['value' => 'http://127.0.0.1:9900']
        );

        $data = [
            'serve' => strval($serve->value),
            'api' => strval($api->value),
        ];

        $this->cache->forever($this->cacheKey(), $data);

        return $data;
    }

    /**
     * Save the im serve.
     *
     * @param string $serve
     * @return void|null
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function store(string $serve, string $api)
    {
        CommonConfig::updateOrCreate(
            ['name' => 'im:serve', 'namespace' => 'common'],
            ['value' => $serve]
        );

        CommonConfig::updateOrCreate(
            ['name' => 'im:api', 'namespace' => 'common'],
            ['value' => $api]
        );

        $data = [
            'serve' => strval($serve),
            'api' => strval($api),
        ];

        $this->flush();
        $this->cache->forever($this->cacheKey(), $data);
    }

    /**
     * Get the config cache key.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function cacheKey(): string
    {
        return 'im:serve';
    }

    /**
     * Flush all cache.
     *
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function flush()
    {
        $keys = [
            $this->cacheKey(),
            'bootstrappers',
        ];

        foreach ($keys as $key) {
            $this->cache->forget($key);
        }
    }
}
