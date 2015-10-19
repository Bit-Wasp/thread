<?php

namespace BitWasp\Thread;


class Thread
{
    /**
     * @var \Closure
     */
    private $main;

    /**
     * @param \Closure $main
     */
    public function __construct(\Closure $main)
    {
        $this->main = $main;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $main = $this->main;
        return $main();
    }
}