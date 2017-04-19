<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\AdminControllers;

use Illuminate\Http\Request;
use Zhiyi\Plus\Models\CommonConfig;
use Zhiyi\Plus\Http\Controllers\Controller;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\view;
use Zhiyi\Component\ZhiyiPlus\PlusComponentIm\Installer\Installer;

class HomeController extends Controller
{
    /**
     * The component manage entry.
     *
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function show(Request $request)
    {
        if (! $request->user()) {
            return redirect(route('admin'), 302);
        }

        return view('admin', ['server' => $this->serverStore()->value]);
    }

    /**
     * 更新服务地址接口.
     *
     * @param Request $request
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function update(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->reset($request, $this->serverStore());

        return $response === true
            ? $this->sendResetResponse()
            : $this->sendResetFailedResponse($request);
    }

    protected function sendResetResponse()
    {
        return redirect()->back()
            ->with('message', '更新成功');
    }

    protected function sendResetFailedResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('server'))
            ->withErrors(['server' => '更新失败']);
    }

    /**
     * reset the config row value.
     *
     * @param Request $request
     * @param CommonConfig $store
     * @return bool
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function reset(Request $request, CommonConfig $store)
    {
        $server = $request->input('server');

        $status = $store->newQuery()
            ->byNamespace(Installer::$configNamespace)
            ->byName(Installer::$configName)
            ->update(['value' => $server]);

        return (bool) $status;
    }

    /**
     * Get the server validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'server' => 'required',
        ];
    }

    /**
     * Get the server validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages(): array
    {
        return [];
    }

    /**
     * Get the config row store.
     *
     * @return \Zhiyi\Plus\Models\CommonConfig
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function serverStore(): CommonConfig
    {
        $server = CommonConfig::byNamespace(Installer::$configNamespace)
            ->byName(Installer::$configName)
            ->first();

        if (! $server) {
            $server = new CommonConfig();
            $server->namespace = Installer::$configNamespace;
            $server->name = Installer::$configName;
            $server->value = Installer::$configDefaultServiceURL;
            $server->save();
        }

        return $server;
    }
}
