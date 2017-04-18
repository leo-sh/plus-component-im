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
}
