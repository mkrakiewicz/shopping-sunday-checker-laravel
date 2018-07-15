<?php

namespace App\Structs;

class QuestionData
{
    /** @var string */
    public $text;

    /**
     * QuestionData constructor.
     * @param string $text
     */
    public function __construct($text = '')
    {
        $this->text = $text;
    }
}
