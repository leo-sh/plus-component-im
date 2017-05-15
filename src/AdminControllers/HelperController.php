<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\AdminControllers;

use Zhiyi\Plus\Models\CommonConfig;
use Zhiyi\Plus\Http\Controllers\Controller;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\view;
use Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Request\StoreHelperPost;

class HelperController extends Controller
{
    /**
     * 助手设置页面.
     *
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function show()
    {
        return view('helper', [
            'helpers' => $this->helpers(),
        ]);
    }

    /**
     * 添加助手.
     *
     * @param \Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Request\StoreHelperPost $request
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function store(StoreHelperPost $request)
    {
        $uid = $request->input('uid');
        $url = $request->input('url');

        $helpers = $this->helpers();

        if (($response = $this->repeat($request, $uid, $helpers)) === true) {
            array_push($helpers, [
                'uid' => $uid,
                'url' => $url,
            ]);

            CommonConfig::byNamespace('common')->byName('im:helper')
                ->update(['value' => json_encode($helpers)]);

            return redirect()->back()
                ->with('message', '添加成功');
        }

        return $response;
    }

    /**
     * 删除助手.
     *
     * @param string|int $uid
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function delete($uid)
    {
        $helpers = $this->helpers();

        foreach ($helpers as $key => $helper) {
            if ($helper['uid'] == $uid) {
                unset($helpers[$key]);
            }
        }

        $helpers = array_values($helpers);

        CommonConfig::byNamespace('common')->byName('im:helper')
                ->update(['value' => json_encode($helpers)]);

        return redirect()->back()
            ->with('message', '删除成功');
    }

    /**
     * 去重，判断助手是否已经存在.
     *
     * @param \Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Request\StoreHelperPost $request
     * @param int|string $uid
     * @param array $helpers
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function repeat(StoreHelperPost $request, $uid, array $helpers = [])
    {
        foreach ($helpers as $helper) {
            if ($helper['uid'] == $uid) {
                return redirect()->back()
                    ->withInput($request->only(['uid', 'url']))
                    ->withErrors(['uid' => '添加的用户已经存在']);
            }
        }

        return true;
    }

    /**
     * 获取助手列表.
     *
     * @return array
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function helpers()
    {
        $config = CommonConfig::byNamespace('common')->byName('im:helper')
            ->select('value')
            ->first();

        if (! $config) {
            $config = new CommonConfig();
            $config->namespace = 'common';
            $config->name = 'im:helper';
            $config->value = json_encode([]);
            $config->save();
        }

        return array_values(
            json_decode($config->value, true) ?: []
        );
    }
}
