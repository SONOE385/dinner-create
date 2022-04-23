@extends('layouts.app')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>献立一覧</title>
</head>
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
                        <input class="btn btn-outline-danger logout-button" type="submit" value="ログアウト">
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="login-edit-button">
                        <button type="button" class="btn btn-outline-danger">ログイン</button>
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="login-edit-button">
                        <button type="button" class="btn btn-outline-danger">新規登録</button>
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
                <button type="button" class="btn btn-lg rounded-pill" onclick="location.href='/list'">グループ一覧</button>
                <button type="button" class="btn btn-lg rounded-pill" onclick="location.href='/create'">献立作成</button>
            </div>

            <div class="list-title">--------   献立一覧   --------</div>

            <div class="list-box">
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
                </a>
                
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
                </a>
            </div>
        </div>
        <div class="footer"></div>
</body>
</html>