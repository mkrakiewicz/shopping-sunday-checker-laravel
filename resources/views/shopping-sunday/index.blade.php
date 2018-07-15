<?php
/** @var $question \App\Structs\QuestionData */
/** @var $isShoppingSunday bool */
?>
@extends('../layouts.master')
@section('styles')
    <style>
        #app {
            font-family: 'Avenir', Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-align: center;
            color: #2c3e50;
            margin-top: 60px;
        }

        .restrict-size > * {
            max-height: 200px;
        }

        .margin-bottom {
            margin-bottom: 40px;
        }

        h1, h2 {
            font-weight: normal;
        }
    </style>
@endsection

@section('contents')
    <div id="app">
        <div class="restrict-size margin-bottom">
            @if($isShoppingSunday)
                <img src="{{ asset('/img/trade.jpg') }}">
            @else
                <img src="{{ asset('/img/ban-on-trade.jpg') }}">
            @endif
        </div>
        <div>
            {{ $question->text }}
        </div>

        @include('shopping-sunday.sunday-info')

        <br/>

        @include('shopping-sunday.today-info')

        <br/>
        <br/>

        @include('shopping-sunday.next-sundays-info')
    </div>
@endsection
