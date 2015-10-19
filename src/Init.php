<?php

namespace BitWasp\Thread;


class Init
{
    /**
     * @var InitParams
     */
    private $params;

    /**
     * @param Thread[] $threads
     * @param InitParams|null $params
     */
    public function __construct(array $threads, InitParams $params = null)
    {
        if (empty($threads)) {
            throw new \InvalidArgumentException('No threads provided');
        }

        if (is_null($params)) {
            $params = new InitParams();
        }

        $this->params = $params;
        foreach ($threads as $i => $thread) {
            $this->start($i, $thread);
        }
    }

    /**
     * @param int $tid
     * @param Thread $thread
     */
    private function start($tid, Thread $thread)
    {
        $pid = pcntl_fork();
        if ($pid == -1) {
            throw new \RuntimeException('Init failed');
        }

        if ($pid) {
            return;
        } else {
            $thread();
        }
    }
}