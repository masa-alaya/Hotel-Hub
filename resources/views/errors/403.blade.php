

@extends('layouts.master')
@section('content')


    <div class="h-3/6 flex flex-col justify-center items-center space-y-4 mt-4 lg:mt-0" dir="rtl">
        <h1 class="text-[125px] font-bold text-yellow-600">403</h1>
        <h1 class="text-center lg:text-right text-4xl font-bold text-yellow-600">Sorry... You do not have sufficient permissions to access this page</h1>
        <h1 class="text-center lg:text-right text-2xl font-semibold">It looks like the page you are looking for has been removed sometime, you can go back to the home page by clicking on the Hotel-Hub icon</h1>
    </div>


@endsection
@section('extra')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
