<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Models\Farm\Category;
use App\Models\Farm\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['stocks'] = Stock::get();
        return view('Farm.stocks.index', compact('data'));
    }

    public function create()
    {
        $data['allCat'] = Category::all();
        return view('Farm.stocks.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'supplyDestination' => 'required',
            // 'unitOfMeasure'=>'required',
            'inComingQuantity' => 'required',
            'inComingUnitPrice' => 'required',
            'outComingQuantity' => 'required',
            'outComingUnitPrice' => 'required',
            'category' => 'required',
        ]);

        $stock = new Stock();
        $stock->date = $request->date;
        $stock->supplyDestination = $request->supplyDestination;
        // $stock->unitOfMeasure = $request->unitOfMeasure;
        $stock->inComingQuantity = $request->inComingQuantity;
        $stock->inComingUnitPrice = $request->inComingUnitPrice;
        $stock->outComingQuantity = $request->outComingQuantity;
        $stock->outComingUnitPrice = $request->outComingUnitPrice;
        $stock->category_id  = $request->category;

        $stock->inComingTotal = $request->inComingQuantity * $request->inComingUnitPrice;
        $stock->outComingTotal = $request->outComingQuantity * $request->outComingUnitPrice;

        $lastStock = Stock::latest()->first();
        
        if ($lastStock) {
            $stock->residual = ($lastStock->residual + $stock->inComingTotal) - $stock->outComingTotal;
        } else {
            $stock->residual = (0.000 + $stock->inComingTotal) - $stock->outComingTotal;
        }

        $stock->save();

        toast('تم الاضافه بنجاح', 'success');
        return redirect()->route('allStocks');
    }

    public function edit($id)
    {
        $data['stock'] = Stock::find($id);
        $data['allCat'] = Category::all();

        return view('Farm.stocks.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'supplyDestination' => 'required',
            // 'unitOfMeasure'=>'required',
            'inComingQuantity' => 'required',
            'inComingUnitPrice' => 'required',
            'outComingQuantity' => 'required',
            'outComingUnitPrice' => 'required',
            'category' => 'required',
        ]);

        $stock = Stock::find($id);
        $stock->date = $request->date;
        $stock->supplyDestination = $request->supplyDestination;
        // $stock->unitOfMeasure = $request->unitOfMeasure;
        $stock->inComingQuantity = $request->inComingQuantity;
        $stock->inComingUnitPrice = $request->inComingUnitPrice;
        $stock->outComingQuantity = $request->outComingQuantity;
        $stock->outComingUnitPrice = $request->outComingUnitPrice;
        $stock->category_id  = $request->category;

        $stock->update();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('allStocks');
    }

    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('allStocks');
    }
}
