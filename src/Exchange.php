<?php

namespace Currency\Exchange;

use Illuminate\Support\Facades\Http;

class Exchange
{
    public function currencyExchange($amount, $currency)
    {
        $response = Http::get('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $xml = simplexml_load_string($response->getBody(), 'SimpleXMLElement');
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $cusomArray = $array['Cube']['Cube']['Cube'];

        foreach ($cusomArray as $key => $value) {
            foreach ($value as $k => $v) {
                $cusomArray[$v['currency']] = $v['rate'];
                unset($cusomArray[$key]);
            }

        }
        return $cusomArray[$currency] * $amount;
    }
}
