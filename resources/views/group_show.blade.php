@extends('layouts.app')

@section('title','グループ一覧')

@section('content')

<div class="main-container">
    <div class="my-group-body">
        <div class="my-group" id="">
            <h1>{{ $group->name }}</h1>
        </div>

        <div class="group-area">
            <div class="group-list">
                <div class="group-list-box">
                    @foreach($dinners as $dinner)
                    <a href="{{ route('dinner.edit', $dinner->id) }}">
                        <div class="list-area">
                            <p class="text">
                                meal-------{{ $dinner->meal }}</br>
                                side-------{{ $dinner->side }}</br>
                                soup-------{{ $dinner->soup }}           
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
