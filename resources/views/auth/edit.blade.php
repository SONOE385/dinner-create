@extends('layouts.app')

@section('title','会員情報編集')

@section('content')
<div class="main-container">
    <div class="row justify-content-center">
        <div class="user-infomation-contents">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                <div class="user-infomation-title">
                    <h1 >会員情報編集</h1>
                </div>

                <div class="">
                    <div class="row mb-3">              
                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="name" required autocomplete="name" autofocus>
                            
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">                        
                        <div class="">
                            <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $user->nickname }}" placeholder="nickname" required autocomplete="nickname" autofocus>
                            
                            @error('nickname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">                        
                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="email" required autocomplete="email">
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">                        
                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">                        
                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmation-password" required autocomplete="new-password">
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
@endsection
