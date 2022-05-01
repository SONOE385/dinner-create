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
               <a href="{{ url('/group') }}"><li>Aグループ</li></a>
               <li>グループ名</li>
               <li>グループ名</li>
               <li>グループ名</li>
               <li>グループ名</li>
               <li>グループ名</li>
               <li>グループ名</li>
           </ul>
        </div>

    </div>
</div>

@endsection
