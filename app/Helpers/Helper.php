<?php

function getConfigValueFromInformationTable($configKey)
{
    $information = \App\Setting::where('config_key', $configKey)->first();
    if (!empty($information)) {
        return $information->config_value;
    }
    return null;
}
