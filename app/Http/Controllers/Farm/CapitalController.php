<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Models\Farm\Capital;
use App\Models\Farm\Category;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    #Region for [Sales]
        public function allSales()
        {
            $data['allSales'] = Capital::where('periodStatus','2')->get();
            return view('Farm.sales.index',compact('data'));
        }

        public function createSales()
        {
            $data['allCat'] = Category::all();
            return view('Farm.sales.create',compact('data'));
        }

        public function storeSales(Request $request)
        {
            $request->validate([
                'count'=>'required',
                'quantity'=>'required',
                'unitPrice'=>'required',
                'periodDate'=>'required',
                'category'=>'required',
            ]);

            $item = new Capital();
            $item->periodStatus = 2;
            $item->count = $request->count;
            $item->quantity = $request->quantity;
            $item->unitPrice = $request->unitPrice;
            $item->category_id = $request->category;
            $item->periodDate = $request->periodDate;

            $item->totalPrice =  $request->quantity * $request->unitPrice;

            $item->save();

            toast('تم الاضافه بنجاح', 'success');
            return redirect()->route('allSales');
        }

        public function editSales($id)
        {   
            $data['sales'] = Capital::find($id);
            $data['allCat'] = Category::all();

            return view ('Farm.sales.edit',compact('data'));
        }

        public function updateSales(Request $request , $id)
        {

            $request->validate([
                'count'=>'required',
                'quantity'=>'required',
                'unitPrice'=>'required',
                'periodDate'=>'required',
                'category'=>'required',
            ]);

            $item = Capital::find($id);
            $item->count = $request->count;
            $item->quantity = $request->quantity;
            $item->unitPrice = $request->unitPrice;
            $item->category_id = $request->category;
            $item->periodDate = $request->periodDate;

            $item->totalPrice =  $request->quantity * $request->unitPrice;

            $item->update();
            toast('تم التعديل بنجاح', 'success');
            return redirect()->route('allSales');
        }

        public function deleteSales($id)
        {
            $item = Capital::find($id);
            $item->delete();
            toast('تم الحذف بنجاح', 'success');
            return redirect()->route('allSales');
        }

    #End Region

    #Region for [First period]
        public function indexFirstPeriod()
        {
            $data['firstP'] = Capital::where('periodStatus','0')->get();
            return view('Farm.First_LastPeriod.indexFirstP',compact('data'));
        }

        public function indexLastPeriod()
        {
            $data['lastP'] = Capital::where('periodStatus','1')->get();
            return view('Farm.First_LastPeriod.indexLastP',compact('data'));
        }

        public function createFirst_LastPeriod()
        {
            $data['allCat'] = Category::all();
            return view('Farm.First_LastPeriod.createF_L',compact('data'));
        }

        public function storeFirst_lastPeriod(Request $request)
        {
            $request->validate([
                'periodStatus'=>'required',
                'category'=>'required',
                'periodDate'=>'required',
                'count'=>'required',
                'quantity'=>'required',
                'unitPrice'=>'required',
            ]);

            $item = new Capital();

            $item->count = $request->count;
            $item->quantity = $request->quantity;
            $item->unitPrice = $request->unitPrice;
            $item->category_id = $request->category;
            $item->periodDate = $request->periodDate;
            $item->periodStatus = $request->periodStatus;

            $item->totalPrice = $request->unitPrice * $request->quantity;
            
            $item->save();
            toast('تم الاضافة بنجاح', 'success');

            if($request->periodStatus == '0')
                return redirect()->route('allFirstPeriod');
            else
                return redirect()->route('allLastPeriod');

        }

        public function editFirst_LastPeriod($id)
        {
            $data['item'] = Capital::find($id);
            $data['allCat'] = Category::all();
            return view('Farm.First_LastPeriod.editF_L',compact('data'));
        }

        public function updateFirst_lastPeriod(Request $request,$id)
        {
            $request->validate([
                'periodStatus'=>'required',
                'category'=>'required',
                'periodDate'=>'required',
                'count'=>'required',
                'quantity'=>'required',
                'unitPrice'=>'required',
            ]);

            $item = Capital::find($id);

            $item->count = $request->count;
            $item->quantity = $request->quantity;
            $item->unitPrice = $request->unitPrice;
            $item->category_id = $request->category;
            $item->periodDate = $request->periodDate;
            $item->periodStatus = $request->periodStatus;
            
            $item->totalPrice = $request->unitPrice * $request->quantity;

            $item->update();
            toast('تم التعديل بنجاح', 'success');

            if($request->periodStatus == '0')
                return redirect()->route('allFirstPeriod');
            else
                return redirect()->route('allLastPeriod');

        }

        public function deleteFirst_LastPeriod($id)
        {
            $item = Capital::find($id);

            if($item->periodStatus == '0')
            {
                $item->delete($id);
                return redirect()->route('allFirstPeriod');
            }
            else
            {
                $item->delete($id);
                return redirect()->route('allLastPeriod');
            }
        }
    #End Region

}
