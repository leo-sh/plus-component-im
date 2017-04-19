<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm\AdminControllers;

use Illuminate\Http\Request;
use Zhiyi\Plus\Http\Controllers\Controller;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\view;

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

        return view('admin');
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
}
