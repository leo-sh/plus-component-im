<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>「ThinkSNS+」 - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ Zhiyi\Component\ZhiyiPlus\PlusComponentIm\asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ Zhiyi\Component\ZhiyiPlus\PlusComponentIm\asset('jquery-3.2.1.min.js') }}"></script>
    @yield('head')
</head>
<body>
@yield('content')
<script src="{{ Zhiyi\Component\ZhiyiPlus\PlusComponentIm\asset('bootstrap/js/bootstrap.min.js') }}"></script>
@yield('foot')
</body>
</html>