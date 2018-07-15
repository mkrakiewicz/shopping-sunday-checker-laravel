<?php
/** @var $isShoppingSunday bool */
/** @var $diffInDays int */
?>
@if($isShoppingSunday)
    <h1>Tak</h1>
    @if($diffInDays === 0)
        <h2>Jeśli zapomniałeś zrobić zakupów, to nie przejmuj się. Możesz zrobić je dzisiaj!</h2>
    @endif
@else
    <h1>Nie</h1>
    <p>Obowiązuje <strong>zakaz handlu</strong></p>
    @if($diffInDays !== 0)
        <h2>Pamiętaj, zrób wcześniej zakupy!</h2>
    @else
        <h2>Jeśli zapomniałeś zrobić zakupów, to musisz przeżyć jakoś do poniedziałku...</h2>
    @endif
@endif
