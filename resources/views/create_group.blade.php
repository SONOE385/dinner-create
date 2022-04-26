@extends('layouts.app')

@section('content')
<div class="body">
    <div class="main-container">
        <div class="row justify-content-center">
            <div class="user-infomation-contents">
                <form method="POST" action="">
                    @csrf
                    <div class="user-infomation-title">
                    グループ作成
                    </div>

                    <div class="">
                        <div class="row mb-3">              
                            <div class="">
                                <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group" value="{{ old('group') }}" placeholder="グループ名を入力" required autocomplete="group" autofocus>
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
                                    {{ __('登録') }}
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
