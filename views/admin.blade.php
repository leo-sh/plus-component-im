@extends('component-im::layouts.app')

@section('title', '服务地址设置')


@push('heads')
    <style type="text/css">@include('component-im::admin.style')</style>
@endpush

@section('content')

    @include('component-im::layouts.header', [
        'active' => 'serve'
    ])

    <form role="form" method="POST" action="{{ route('im.manage.request') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="text" name="serve" placeholder="请输入聊天服务器地址" value="{{ old('serve', $serve) }}" />
        <p class="help-block">输入聊天服务器的连接地址，例如默认的「127.0.0.1:9900」。输入的服务器不存在或者错误，将会造成 app 等客户端的运行异常。</p>
        <button>提交</button>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (! $errors->isEmpty())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </form>
@endsection
