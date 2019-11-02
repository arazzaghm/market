<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();

        $totalCurrencies = Currency::count();

        return view('admins.pages.currencies.index', compact('currencies', 'totalCurrencies'));
    }

    public function store(Request $request)
    {
        $name = strtoupper($request->name);

        Currency::create(['name' => $name]);

        return back();
    }

    public function edit(Currency $currency)
    {
        return view('admins.pages.currencies.edit', compact('currency'));
    }

    public function update(Request $request, Currency $currency)
    {
        $name = strtoupper($request->name);

        $currency->update(['name' => $name]);

        return redirect()->route('admin.currencies.index');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return back();
    }
}
