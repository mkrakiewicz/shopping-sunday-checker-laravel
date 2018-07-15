<?php

use App\Http\Services\SundayResolver;

class SundayResolverTest extends TestCase
{
    /** @var SundayResolver */
    private $sundayResolver;

    protected function setUp()
    {
        parent::setUp();
        $this->sundayResolver = new SundayResolver();
    }

    public function testTodaySunday()
    {
        $found = $this->sundayResolver->findNextOrToday($this->date(2018, 7, 15));
        $this->assertTrue(
            $found->isSameDay($this->date(2018, 7, 15))
        );
    }

    public function testYesterdaySunday()
    {
        $found = $this->sundayResolver->findNextOrToday($this->date(2018, 7, 14));
        $this->assertTrue(
            $found->isSameDay($this->date(2018, 7, 15))
        );
    }

    public function testNextSunday()
    {
        $found = $this->sundayResolver->findNextOrToday($this->date(2018, 7, 16));
        $this->assertTrue(
            $found->isSameDay($this->date(2018, 7, 22))
        );
    }
}
