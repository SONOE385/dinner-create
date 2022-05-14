@extends('layouts.app')

@section('content')
<div class="body">
    <div class="main-container">
        <div class="reverse">
            <a href="{{ route('dinner.create') }}" style="color:white;"><img src="/image/矢印ボタン.png" alt="">戻る</a>
        </div>

        <div class="row justify-content-center">
            <div class="user-infomation-contents">
                <form method="POST" action="{{ route('group.edit', $group->id ) }}">
                    @csrf
                    <div class="user-infomation-title-user">
                        <img src="/image/edit-group.png" alt="">
                    </div>          


                    <div class="">
                        <div class="row mb-3">              
                            <div class="">
                                <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="name" value="{{ $group->name }}" placeholder="グループ名を入力" required autocomplete="group" autofocus>
                                @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                                            
                        
                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-dark user-infomation-button">
                                    {{ __('更新') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
