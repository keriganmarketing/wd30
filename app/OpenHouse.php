<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OpenHouse extends Model
{
    public function extract($openHouses)
    {
        $extracted = [];

        foreach ($openHouses as $key => $value) {
            $extracted[$key]['epoch_string'] = Carbon::parse($openHouses[$key]->event_start)->timestamp;
            $extracted[$key]['start_date'] = $this->formatDate($openHouses[$key]->event_start);
            $extracted[$key]['start_time'] = $this->formatTime($openHouses[$key]->event_start);
            $extracted[$key]['end_time'] = $this->formatTime($openHouses[$key]->event_end);
        }

        usort($extracted, array($this, "cmp"));

        return collect($extracted);
    }

    protected function formatDate($date)
    {
        return Carbon::parse($date)->format('M j, Y');
    }

    protected function formatTime($time)
    {
        return Carbon::parse($time)->format('h:i a');
    }

    private function cmp($a, $b)
    {
        if ($a == $b) {
            return 0;
        }

        return ($a['epoch_string'] < $b['epoch_string']) ? -1 : 1;
    }
}
