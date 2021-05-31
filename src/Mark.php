<?php

namespace Journal;

class Mark
{
    public int $mark;
    public int $timestamp;

    public function __construct (int $mark, int $timestamp)
    {
        $this->mark = $mark;
        $this->timestamp = $timestamp;
    }

    public static function new (int $mark, int $timestamp): self
    {
        return new self ($mark, $timestamp);
    }
}
