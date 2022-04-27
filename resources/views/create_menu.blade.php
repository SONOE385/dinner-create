@extends('layouts.app')

@section('content')
    <div class="main-container">
        <div class="row justify-content-center">
            <div class="user-infomation-contents">
                <form method="POST" action="{{ route('dinner.store') }}">
                    @csrf
                    <div class="user-infomation-title">
                    献立登録
                    </div>

                    <div class="">
                    <a href="/create_group">グループを作成する</a>
                        <div class="row mb-3">              
                            <div class="">
                                <input id="group" list="dinner-group" type="text" class="form-control @error('group') is-invalid @enderror" name="group" value="{{ old('group') }}" placeholder="group" required autocomplete="group" autofocus>
                                <datalist id="dinner-group">
                                    <option value="Aグループ">
                                    <option value="Bグループ">
                                    <option value="Cグループ">
                                </datalist>

                                @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input action="" id="main" type="text" class="form-control @error('main') is-invalid @enderror" name="main" value="{{ old('main') }}" placeholder="main" required autocomplete="main" autofocus>
                                @error('main')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="side" type="side" class="form-control @error('side') is-invalid @enderror" name="side" value="{{ old('side') }}" placeholder="side" required autocomplete="side">
                                @error('side')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">                        
                            <div class="">
                                <input id="soup" type="soup" class="form-control @error('soup') is-invalid @enderror" name="soup" value="{{ old('soup') }}" placeholder="soup" required autocomplete="new-soup">
                                
                                @error('soup')
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
@endsection
