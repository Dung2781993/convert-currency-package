<?php
namespace Currency\Exchange\Controllers;

use Currency\Exchange\Exchange;
use Illuminate\Http\Request;

class ExchangeController
{
    public function __invoke(Exchange $exchange, Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required',
            'currency' => 'required',
        ]);
        $amount = $exchange->currencyExchange($validated['amount'], $validated['currency']);

        return response()->json([
            'success' => true,
            'data' => $amount,
            "errors" => [],
            "extra" => [],
            "error" => null,
        ]);
    }
}
