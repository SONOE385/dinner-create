@extends('layouts.app')

@section('title','グループ一覧')

@section('content')

<div class="main-container">
    <div class="reverse">
        <a href="{{ route('group.index') }}" style="color:white;"><img src="/image/矢印ボタン.png" alt="">戻る</a>
    </div>
    
    <div class="my-group-body">
        <div class="my-group" id="">
            <div class="group-name">
                <h1>{{ $group->name }}</h1>
            </div>
            <div class="group-edit-area">
                <div class="edit-area-icon">
                    <a href="/group-edit/{{ $group->id }}" class="group-edit"><img src="/image/w-edit-icon.png" alt=""></a>
                    <a href="/group-del/{{ $group->id }}" class="group-del" onclick="return confirm('削除しますか?')"><img src="/image/w-del-icon.png" alt=""></a>
                </div>
            </div>
        </div>

        <div class="group-area">
                <div class="group-list-box">    
                    @foreach($dinners as $dinner)
                        <div class="group-list-area">
                            <p class="text">
                                meal-------{{ $dinner->meal }}</br>
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
    </div>
</div>

@endsection
