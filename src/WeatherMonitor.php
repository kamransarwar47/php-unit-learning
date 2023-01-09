<?php

namespace App\src;

class WeatherMonitor
{
    protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function getAverageTemperature(string $start, string $end)
    {
        $startTemp = $this->service->getTemperature($start);
        $endTemp = $this->service->getTemperature($end);
        return ($startTemp + $endTemp) / 2;
    }
}