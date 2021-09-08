<?php

namespace App\Http\Controllers;

use App\Models\Quotes;
use App\Http\Requests\QuoteRequest;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    
    public function index()
    {
        $quotes = Quotes::all();
        return view('pages.quotes.index')->with([
            'quotes' => $quotes

        ]);
    }

    public function create()
    {
        $quotes = Quotes::all();
        
        return view('pages.quotes.create')->with([
            'quotes' => $quotes
        ]);   
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Quotes::create($data);

        return redirect()->route('quote.index');
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $quote = Quotes::findOrFail($id);

        return view('pages.quotes.edit')->with([
            'quote' => $quote
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $quote = Quotes::findOrFail($id);
        $quote->update($data);

        return redirect()->route('quote.index');
    }

    public function destroy($id)
    {
        $quote = Quotes::findOrFail($id);
        $quote->delete();

        return redirect()->route('quote.index');
    }
}
