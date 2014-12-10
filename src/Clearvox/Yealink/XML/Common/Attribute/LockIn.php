<?php
namespace Clearvox\Yealink\XML\Common\Attribute;

trait LockIn
{
    protected $lockIn = false;

    public function doLockIn()
    {
        $this->lockIn = true;
        return $this;
    }

    public function dontLockIn()
    {
        $this->lockIn = false;
        return $this;
    }
}