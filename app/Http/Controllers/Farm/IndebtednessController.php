<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Models\Farm\Capital;
use App\Models\Farm\Category;
use App\Models\Farm\Indebtedness;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndebtednessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['categories'] = Category::all();
        $data['indebtedness'] = Indebtedness::all();
        return view('Farm.indebtedness.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount'    => 'required',
            'category'  => 'required',
        ]);

        $indebtedness = new Indebtedness();
        $indebtedness->amount = $request->amount;
        $indebtedness->category_id = $request->category;

        $indebtedness->save();

        toast('تم الاضافه بنجاح', 'success');
        return redirect()->route('allIndebtedness');
    }

    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['indebtedness'] = Indebtedness::find($id);
        return view('Farm.indebtedness.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount'    => 'required',
            'category'  => 'required',
        ]);

        $indebtedness = Indebtedness::find($id);
        $indebtedness->amount = $request->amount;
        $indebtedness->category_id = $request->category;

        $indebtedness->update();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('allIndebtedness');
    }

    public function destroy($id)
    {
        $indebtedness = Indebtedness::find($id);
        $indebtedness->delete();
        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('allIndebtedness');
    }

    // inventory

    public function inventory()
    {
        $date = Carbon::now()->format('Y');

        $data['sumOfIndebtedness'] = Indebtedness::sum('amount');
        $data['sumOfLastPeriod'] = Capital::where('periodStatus' , '1')->whereYear('created_at',$date)->sum('totalPrice');
        $data['sumOfSales'] = Capital::where('periodStatus' , '2')->whereYear('created_at',$date)->sum('totalPrice');

        // if(!$data['sumOfIndebtedness']) $data['sumOfIndebtedness']->sumOfIndebtedness = 0;
        // if(!$data['sumOfLastPeriod']) $data['sumOfLastPeriod']->sumOfLastPeriod = 0;
        // if(!$data['sumOfSales']) $data['sumOfSales']->sumOfSales = 0;

        $data['allProfit'] = $data['sumOfLastPeriod'] - $data['sumOfIndebtedness'] + $data['sumOfSales'] ;

        // dd($data);
        return view('Farm.indebtedness.inventory' ,compact('data'));
    }
}
