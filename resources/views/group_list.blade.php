@extends('layouts.app')

@section('title','グループ一覧')

@section('content')
<nav class="navbar text-uppercase fixed-top" id="mainNav">
        <a class="navbar-brand" href="#page-top">Aグループ</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="">ホームへ戻る</a></li>
            </ul>
        </div>
</nav>

<div class="main-container">
    <div class="body">
        <div class="group-list">
            <div class="group-list-box">
                <div class="list-area">
                    <p class="text">
                        main-------ハンバーグ</br>
                        side-------サラダ</br>
                        soup-------コンソメスープ           
                    </p>
                </div>
                <div class="list-area">
                    <p class="text">
                        main-------ハンバーグ</br>
                        side-------サラダ</br>
                        soup-------コンソメスープ           
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
