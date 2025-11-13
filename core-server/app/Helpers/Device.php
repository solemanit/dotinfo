<?php

namespace App\Helpers;

use Detection\MobileDetect;

class Device
{
    protected MobileDetect $detect;

    public function __construct()
    {
        $this->detect = new MobileDetect;
    }

    public function isMobile(): bool   { return $this->detect->isMobile(); }
    public function isTablet(): bool   { return $this->detect->isTablet(); }
    public function isDesktop(): bool  { return !$this->isMobile() && !$this->isTablet(); }

    /** @param string $key e.g. 'iPhone', 'AndroidOS', 'Chrome' */
    public function is(string $key): bool { return $this->detect->is($key); }
}
