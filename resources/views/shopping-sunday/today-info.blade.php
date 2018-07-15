<?php
/** @var $today \Carbon\Carbon */
/** @var $nextSunday \Carbon\Carbon */
/** @var $diffString string */
/** @var $isShoppingSunday bool */
?>
<small>Dzisiaj jest {{ $today->formatLocalized('%A, %d %B %Y') }}.</small>
@if($diffInDays !== 0)
    <br/>
    <small>Najbliższa niedziela będzie <strong>{{ $diffString }}</strong>, czyli
        <strong>{{ $nextSunday->formatLocalized('%d %B %Y') }}.</strong>
    </small>
    <br/>
    @if($isShoppingSunday)
        <small>Będzie to niedziela handlowa, czyli sklepy będą otwarte jak w zwykłą niedzielę.</small>
    @else
        <small>Będzie obowiązywał zakaz handlu, czyli sklepy będą zamknięte.</small>
    @endif
@endif
