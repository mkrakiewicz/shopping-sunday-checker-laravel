<?php

use App\Http\Services\QuestionResolver;
use App\Structs\QuestionData;

class QuestionResolverTest extends TestCase
{
    /** @var QuestionResolver */
    private $questionResolver;

    protected function setUp()
    {
        parent::setUp();
        $this->questionResolver = new QuestionResolver();
    }

    public function testToday()
    {
        $question = $this->getQuestion(8);
        $this->assertQuestionDataEquals('Czy dzisiaj jest niedziela handlowa?', $question);
    }

    public function testTomorrow()
    {
        $question = $this->getQuestion(7);
        $this->assertQuestionDataEquals('Czy jutro jest niedziela handlowa?', $question);
    }

    public function testDayAfterTomorrow()
    {
        $question = $this->getQuestion(6);
        $this->assertQuestionDataEquals('Czy pojutrze jest niedziela handlowa?', $question);
    }

    public function testOtherDay()
    {
        $question = $this->getQuestion(3);
        $this->assertQuestionDataEquals('Czy następna niedziela będzie niedzielą handlową?', $question);
    }

    /**
     * @param QuestionData $questionData
     * @return string
     */
    private function retrieveQuestion(QuestionData $questionData)
    {
        return ($questionData->text);
    }

    /**
     * @param $day
     * @param $month
     * @param $year
     * @return QuestionData
     */
    private function getQuestion($day, $month = 7, $year = 2018)
    {
        return $this->questionResolver->resolve(
            $this->date($year, $month, $day)
        );
    }

    /**
     * @param $expected
     * @param $question
     */
    private function assertQuestionDataEquals($expected, QuestionData $question)
    {
        $this->assertEquals($expected, $question->text);
        $this->assertEquals($expected, $this->retrieveQuestion($question));
    }
}
