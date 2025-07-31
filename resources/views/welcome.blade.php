@extends('layouts.app')

@section('sections')
    <main>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </main>
@endsection
