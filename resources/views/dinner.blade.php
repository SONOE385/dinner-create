
@extends('layouts.app')

@section('title','ホーム')

@section('content')
<body class="container" style="background-color:#F1EFE8" >
        <div class="header">
            <div class="title-area">
                <a href="">create dinner menu</a>
                <img src="/image/icon1.png" class="icon1" alt="">
                <div class="auth-path">
                @if (Route::has('login'))
                    @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="btn logout-button" type="submit" value="ログアウト">
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="login-edit-button">
                        <button type="button" class="btn">ログイン</button>
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="login-edit-button">
                        <button type="button" class="btn">新規登録</button>
                    </a>
                    @endif
                    @endauth
                @endif
                </div>
            </div>

            <div class="images">
                <img src="/image/dinner.png" alt="">
            </div>  
        </div>
        <div class="main">
            <!-- <a href="{{ route('user.edit') }}">テストテスト</a> -->

            <img src="/image/icon2.png" class="icon2" alt="">

            <div class="list-top">
                <a href="{{ route('group.index') }}">
                    <button type="button" class="btn btn-lg rounded-pill">グループ一覧</button>
                </a>
                @if (Route::has('login'))
                @auth
                <a href="{{ route('dinner.create') }}">
                    <button type="button" class="btn btn-lg rounded-pill" onclick="location.href='/create'">献立作成</button>
                </a>
                @else
                <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-lg rounded-pill">会員登録</button>
                </a>
                @endauth
                @endif
            </div>

            <div class="list-title">--------   献立一覧   --------</div>

            {{--<div class="list-box">
                @foreach($dinners as $dinner
                <div class="list-area">
                <table>
                    @if ($dinner % 2 == 0) {<tr>}
                    <td>
                        <ul>
                            <li>{{ $dinner->meal }}</tr>
                                {{ $dinner->side }}</tr>
                                {{ $dinner->soup }}</tr>
                            </li>
                        </ul>
                    </td>
                    @if ($dinner % 2 == 1) {</tr>}
                 @endif
                </table>
                
                <a href="/editmenu">
                    <div class="list-area">

                        <p class="text">
                            main-------ハンバーグ</br>
                            side-------サラダ</br>
                            soup-------コンソメスープ           
                        </p>
                        <div class="delete">
                            <a href="">削除</a>
                        </div>
                    </div>
                </a>--}}
            </div>
        </div>
        <div class="footer"></div>
</body>

@endsection