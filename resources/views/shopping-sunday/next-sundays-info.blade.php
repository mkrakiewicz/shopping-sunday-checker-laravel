<?php
/** @var $nextSundays \App\Structs\SundayInfo[] */
?>
@foreach($nextSundays as $sunday)
    <div>
        @if($sunday->isShoppingSunday)
            Niedziela {{ @$sunday->date->formatLocalized('%d %B %Y') }} będzie <strong>handlowa</strong>.
        @else
            W niedzielę <strong>{{ @$sunday->date->formatLocalized('%d %B %Y') }}</strong> będzie obowiązywał
            <strong>zakaz handlu</strong>.
        @endif
    </div>
@endforeach
