<?php

namespace App\Http\ViewComposers;

use App\Structs\SundayInfo;
use Illuminate\View\View;
use App\Http\Services\QuestionResolver;
use App\Http\Services\ShoppingSundayResolver;
use App\Http\Services\SundayResolver;
use App\Dates\Carbon;

class ShoppingSundayInfoComposer
{
    private $questionResolver;
    private $sundayResolver;
    private $shoppingSundayResolver;

    /**
     * ShoppingSundayInfoController constructor.
     * @param QuestionResolver $questionResolver
     * @param SundayResolver $sundayResolver
     * @param ShoppingSundayResolver $shoppingSundayResolver
     */
    public function __construct(
        QuestionResolver $questionResolver,
        SundayResolver $sundayResolver,
        ShoppingSundayResolver $shoppingSundayResolver
    ) {
        $this->questionResolver = $questionResolver;
        $this->sundayResolver = $sundayResolver;
        $this->shoppingSundayResolver = $shoppingSundayResolver;
    }


    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $today = $this->getToday();

        $nextSunday = $this->sundayResolver->findNextOrToday($today);
        $diffInDays = $today->diffInDays($nextSunday);
        $questionData = $this->questionResolver->resolve($today);
        $view->with([
            'title' => config('app.name') . ' - ' . $questionData->text,
            'question' => $questionData,
            'today' => $today,
            'nextSunday' => $nextSunday,
            'diffInDays' => $diffInDays,
            'diffString' => $this->getDiffString($diffInDays),
            'isShoppingSunday' => $this->shoppingSundayResolver->isShoppingSunday($nextSunday),
            'nextSundays' => $this->getNextSundaysInfo($nextSunday)
        ]);
    }

    /**
     * @param int $diffInDays
     * @return string
     */
    private function getDiffString(int $diffInDays): string
    {
        if ($diffInDays === 1) {
            return 'jutro';
        }

        if ($diffInDays === 2) {
            return 'pojutrze';
        }
        return "za $diffInDays dni";
    }

    /**
     * @param Carbon $nextSunday
     * @return array
     */
    private function getNextSundaysInfo(Carbon $nextSunday): array
    {
        $result = [];
        for ($i = 1; $i < 5; $i++) {
            $toAdd = $nextSunday->copy()->addWeek($i);
            $result[] = new SundayInfo($toAdd, $this->shoppingSundayResolver->isShoppingSunday($toAdd));
        }

        return $result;
    }

    /**
     * @return Carbon
     */
    private function getToday()
    {
        $configToday = config('app.today');
        if ($configToday) {
            return Carbon::createFromFormat('d/m/Y', $configToday);
        }
        return Carbon::now();
    }
}