<?php

namespace App;

class Installer
{
    public function configure($agent)
    {
        $formatted = [];
        foreach ($agent as $key => $value) {
            if ($key != 'mls_id' && $key != 'photos') {
                $formatted[$key] = $this->clean($value);
            }
        }
        $formatted['mls_id'] = array_filter($agent->mls_id);
        $formatted['photos'] = array_filter($agent->photos);

        return $formatted;
    }

    public function install($data)
    {

    }

    protected function clean($array)
    {
        $clean = [];
        foreach (array_filter(array_unique($array)) as $field) {
            $clean[] = ucwords(strtolower(preg_replace('/[^a-z\d \( \) \- ]+/i', '', $field)));
        }

        return array_unique($clean);
    }
}
