@extends('layouts.app')

@section('title', '服务地址设置')


@push('heads')
    <style type="text/css">@include('admin.style')</style>
@endpush

@section('content')

    @include('layouts.header')

    <form role="form" method="POST" action="{{ route('im.manage.request') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="text" name="server" placeholder="请输入聊天服务器地址" value="{{ old('server', $server) }}" />
        <p class="help-block">输入聊天服务器的连接地址，例如默认的「127.0.0.1:9900」。输入的服务器不存在或者错误，将会造成 app 等客户端的运行异常。</p>
        <button>提交</button>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if ($errors->has('server'))
            <div class="alert alert-danger">
                {{ $errors->first('server') }}
            </div>
        @endif
    </form>
@endsection
