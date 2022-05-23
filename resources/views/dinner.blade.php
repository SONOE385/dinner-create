
@extends('layouts.app')

@section('title','ホーム')

@section('content')

@if (session('delete'))
    <div class="alert alert-danger update-alert">
        選択した献立を削除しました。
    </div>
@endif

<body class="container" style="background-color:#F1EFE8" >
        <div class="header" id="top">
            <div class="title-area">
               <a href="#top" class="title-img"><img src="/image/title.png" alt=""></a>

               <div class="icon1">
                <img src="/image/icon1.png" alt="">
               </div>

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

                <img src="/image/icon2.png" class=icon2 alt="">

            <div class="list-top">
                <a href="{{ route('group.index') }}">
                    <button type="button" class="btn btn-lg rounded-pill" onclick="location.href={{ route('group.index') }}">グループ一覧</button>
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


            <div class="list-title"><img src="/image/アセット 2.png" alt=""></div>

                <div class="list-box">
                    @foreach($dinners as $dinner)
                            <div class="list-area">
                                <p class="text">
                                    main-------{{ $dinner->meal }}</br>
                                    side-------{{ $dinner->side }}</br>
                                    soup-------{{ $dinner->soup }}           
                                </p>
                                <div class="edit-area">
                                    <div class="edit-area-icon">
                                        <a href="/dinner.edit/{{ $dinner->id }}" class="edit"><img src="/image/edit-icon.png" alt=""></a>
                                        <a href="/dinner.del/{{ $dinner->id }}" class="del" onclick="return confirm('削除しますか?')"><img src="/image/del-icon.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
        </div>
        <div class="footer"></div>
</body>
@endsection