<?php

use App\Http\Services\ShoppingSundayResolver;

class ShoppingSundayResolverTest extends TestCase
{
    /** @var ShoppingSundayResolver */
    private $shoppingSundayResolver;

    protected function setUp()
    {
        parent::setUp();
        $this->shoppingSundayResolver = new ShoppingSundayResolver();
    }

    /**
     * @return void
     */
    public function testNonSundays()
    {
        $dates = [
            $this->date(2018, 7, 4),
            $this->date(2018, 7, 6),
            $this->date(2018, 7, 16),
            $this->date(2018, 7, 17),
            $this->date(2018, 7, 18),
            $this->date(2018, 7, 19)
        ];

        foreach ($dates as $date) {
            $this->assertFalse($this->shoppingSundayResolver->isShoppingSunday($date), "not sunday: $date");
        }
    }

    /**
     * @return void
     */
    public function testNotShoppingSundays()
    {
        $dates = [
            $this->date(2018, 3, 11),
            $this->date(2018, 3, 18),
            $this->date(2018, 4, 1),
            $this->date(2018, 4, 8),
            $this->date(2018, 7, 8),
            $this->date(2018, 7, 15),
            $this->date(2018, 7, 22),
            $this->date(2018, 8, 12),
            $this->date(2018, 8, 19),
            $this->date(2018, 9, 9),
            $this->date(2018, 9, 16),
            $this->date(2018, 9, 23),
            $this->date(2018, 11, 11),
            $this->date(2018, 11, 18),
            $this->date(2018, 12, 9),
        ];

        foreach ($dates as $date) {
            $this->assertFalse($this->shoppingSundayResolver->isShoppingSunday($date), "not shopping sunday: $date");
        }
    }

    /**
     * @return void
     */
    public function testShoppingSundays()
    {
        $dates = [
            $this->date(2018, 3, 4),
            $this->date(2018, 3, 25),
            $this->date(2018, 4, 29),
            $this->date(2018, 5, 6),
            $this->date(2018, 5, 27),
            $this->date(2018, 7, 1),
            $this->date(2018, 7, 29),
            $this->date(2018, 8, 5),
            $this->date(2018, 8, 26),
            $this->date(2018, 9, 2),
            $this->date(2018, 9, 30),
            $this->date(2018, 12, 2),
            $this->date(2018, 12, 16),
            $this->date(2018, 12, 23),
            $this->date(2018, 12, 30),
        ];

        foreach ($dates as $date) {
            $this->assertTrue($this->shoppingSundayResolver->isShoppingSunday($date), "shopping sunday: $date");
        }
    }

}
