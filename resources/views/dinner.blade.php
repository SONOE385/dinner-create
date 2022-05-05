
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


                   
                
                
                <a href="/editmenu">

            <div class="list-box">
                @foreach($dinners as $dinner)
                    @if ($dinner % 2 == 0) {<tr>}
                    <div class="list-area">
                        <p class="text">
                            main-------{{ $dinner->meal }}</br>
                            side-------{{ $dinner->side }}</br>
                            soup-------{{ $dinner->soup }}           
                        </p>
                    </div>
                      @if ($dinner % 2 == 1) {</tr>}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="footer"></div>
</body>

@endsection