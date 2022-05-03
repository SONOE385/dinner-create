@extends('layouts.app')

@section('title','グループ選択画面')

@section('content')

<div class="main-container">
    <div class="my-group-body">
        <div class="my-group">
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
