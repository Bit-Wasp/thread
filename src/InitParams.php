<?php

namespace BitWasp\Thread;


class InitParams
{
    private $errorEscalation = true;

    /**
     * @return bool
     */
    public function useErrorEscalation()
    {
        return $this->errorEscalation;
    }

    /**
     * @param bool $setting
     * @return $this
     */
    public function setErrorEscalation($setting)
    {
        if (!is_bool($setting)) {
            throw new \InvalidArgumentException('Error escalation setting must be a boolean');
        }

        $this->errorEscalation = $setting;
        return $this;
    }

}