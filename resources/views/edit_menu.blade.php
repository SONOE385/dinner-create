@extends('layouts.app')

@section('title','献立編集')

@section('content')
<div class="body">
    <div class="main-container">
        <div class="reverse">
            <a href="{{ route('dinner.index') }}" style="color:white;"><img src="/image/home.png" alt="">ホーム</a>
            <a href="{{ route('group.index') }}" style="color:white;"><img src="/image/矢印ボタン.png" alt="">戻る</a>
        </div>

        <div class="row justify-content-center">
            <div class="user-infomation-contents">
                <form method="POST" action="{{ route('dinner.update', $dinner->id) }}">
                    @csrf
                    <div class="user-infomation-title-user">
                        <img src="/image/edit-menu.png" alt="">
                    </div>          

                    <div class="">
                        <div class="row mb-3">              
                            <div class="">
                                <select id="group" list="dinner-group" type="text" class="form-control @error('group') is-invalid @enderror" name="group_id" placeholder="group" required autocomplete="group" autofocus>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input action="" id="meal" type="text" class="form-control @error('meal') is-invalid @enderror" name="meal" value="{{ $dinner->meal }}" placeholder="meal" required autocomplete="meal">
                                @error('meal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="side" type="side" class="form-control @error('side') is-invalid @enderror" name="side" value="{{ $dinner->side }}" placeholder="side" autocomplete="side">
                                @error('side')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="soup" type="soup" class="form-control @error('soup') is-invalid @enderror" name="soup" placeholder="soup" value="{{ $dinner->soup }}" autocomplete="new-soup">
                                
                                @error('soup')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="button-area">
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
