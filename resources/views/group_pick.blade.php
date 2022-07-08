@extends('layouts.app')

@section('title','グループ選択画面')

@section('content')

<div class="main-container">
    <div class="reverse">
        <a href="{{ route('dinner.index') }}" style="color:white;"><img src="/image/home.png" alt="">ホーム</a>
        <a href="{{ route('dinner.index') }}" style="color:white;"><img src="/image/矢印ボタン.png" alt="">戻る</a>
    </div>

    <div class="my-group-body">
        <div class="pick-my-group">
            <h1>my group</h1>
        </div>
        <div class="group-pick-list">
           <ul class="group">
               @foreach($groups as $group)
               <a href="{{ route('group.show', $group->id) }}"><li>{{ $group->name }}</li></a>
               @endforeach
           </ul>
        </div>

    </div>
</div>

@endsection
