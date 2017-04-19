<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>即时通讯 - ThinkSNS+</title>
    <style type="text/css">@include('admin.style')</style>
</head>
<body>
    <form role="form" method="POST" action="{{ route('im.manage.request') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="text" name="server" placeholder="请输入聊天服务器地址" value="{{ old('server', '127.0.0.1:9900') }}" />
        <button>提交</button>
    </form>
</body>
</html>