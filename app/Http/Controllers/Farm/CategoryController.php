<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use App\Models\Farm\Category;
use App\Models\Farm\Stock;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    #Region for [categories]
        public function index()
        {
            $data['categories'] = Category::all();
            return view('Farm.categories.index', compact('data'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'category' => 'required',
            ]);

            $category = new Category();
            $category->category = $request->category;
            $category->save();

            toast('تم الاضافه بنجاح', 'success');
            return redirect()->route('allCategories');
        }

        public function edit($id)
        {
            $data['category'] = Category::find($id);
            return view('Farm.categories.edit', compact('data'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'category' => 'required',
            ]);
            $category = Category::find($id);
            $category->category = $request->category;
            $category->update();

            toast('تم التعديل بنجاح', 'success');
            return redirect()->route('allCategories');
        }

        public function destroy($id)
        {
            $category = Category::find($id);
            $category->delete();
            toast('تم الحذف بنجاح', 'success');
            return redirect()->route('allCategories');
        }
    #End Region

    #Region for [Stock balances]
        public function getAllBalances()
        {
            $data['balances'] = Category::all();
            return view('Farm.balances.index', compact('data'));
        }

        public function createBalance()
        {
            $data['categories'] = Category::all();
            return view('Farm.balances.create', compact('data'));
        }

        public function storeBalances(Request $request)
        {
            $request->validate([
                'category' => 'required',
                'quantity_FirstPeriod' => 'required',
                'price_FirstPeriod' => 'required',
                'quantity_LastPeriod' => 'required',
                'price_LastPeriod' => 'required',
            ]);

            $balance = Category::find($request->category);

            $balance->quantity_FirstPeriod = $request->quantity_FirstPeriod;
            $balance->price_FirstPeriod = $request->price_FirstPeriod;
            $balance->amount_FirstPeriod = $request->quantity_FirstPeriod * $request->price_FirstPeriod;
            $balance->quantity_LastPeriod = $request->quantity_LastPeriod;
            $balance->price_LastPeriod = $request->price_LastPeriod;
            $balance->amount_LastPeriod = $request->quantity_LastPeriod * $request->price_LastPeriod;
            
            // get stock and return summition 
            $data = $this->getStock($request->category);
            $balance->quantityPurchases_DuringPeriod = $data['SumOutComingQ'];   // store summition of total outcoming quantities
            $balance->amountPurchases_DuringPeriod = $data['SumOutComingTP'];    // store summition of total outcoming total price
            $balance->pricePurchases_DuringPeriod = $balance->amountPurchases_DuringPeriod / $balance->quantityPurchases_DuringPeriod;    // store summition of total outcoming price

            // calculate operations 
            $balance->quantityOutcoming_DuringPeriod = ($balance->quantity_FirstPeriod + $balance->quantityPurchases_DuringPeriod) - $balance->quantity_LastPeriod;
            $balance->amountOutcoming_DuringPeriod = ($balance->price_FirstPeriod + $balance->amountPurchases_DuringPeriod) - $balance->price_LastPeriod;

            $balance->priceOutcoming_DuringPeriod = $balance->amountOutcoming_DuringPeriod / $balance->quantityOutcoming_DuringPeriod;

            $balance->update();

            toast('تم الاضافة بنجاح', 'success');
            return redirect()->route('allBalances');
        }

        public function editBalance($id)
        {
            $data['balance'] = Category::find($id);
            $data['categories'] = Category::all();

            return view('Farm.balances.edit', compact('data'));
        }

        public function updateBalance(Request $request, $id)
        {
            $request->validate([
                'category' => 'required',
                'quantity_FirstPeriod' => 'required',
                'price_FirstPeriod' => 'required',
                'quantity_LastPeriod' => 'required',
                'price_LastPeriod' => 'required',
            ]);

            $balance = Category::find($id);

            $balance->quantity_FirstPeriod = $request->quantity_FirstPeriod;
            $balance->price_FirstPeriod = $request->price_FirstPeriod;
            $balance->amount_FirstPeriod = $request->quantity_FirstPeriod * $request->price_FirstPeriod;
            $balance->quantity_LastPeriod = $request->quantity_LastPeriod;
            $balance->price_LastPeriod = $request->price_LastPeriod;
            $balance->amount_LastPeriod = $request->quantity_LastPeriod * $request->price_LastPeriod;
            
            // get stock and return summition 
            $data = $this->getStock($request->category);
            $balance->quantityPurchases_DuringPeriod = $data['SumOutComingQ'];   // store summition of total outcoming quantities
            $balance->amountPurchases_DuringPeriod = $data['SumOutComingTP'];    // store summition of total outcoming total price
            $balance->pricePurchases_DuringPeriod = $balance->amountPurchases_DuringPeriod / $balance->quantityPurchases_DuringPeriod;    // store summition of total outcoming price

            // calculate operations 
            $balance->quantityOutcoming_DuringPeriod = ($balance->quantity_FirstPeriod + $balance->quantityPurchases_DuringPeriod) - $balance->quantity_LastPeriod;
            $balance->amountOutcoming_DuringPeriod = ($balance->price_FirstPeriod + $balance->amountPurchases_DuringPeriod) - $balance->price_LastPeriod;

            $balance->priceOutcoming_DuringPeriod = $balance->amountOutcoming_DuringPeriod / $balance->quantityOutcoming_DuringPeriod;

            $balance->update();

            toast('تم التعديل بنجاح', 'success');
            return redirect()->route('allBalances');
        }

        public function destroyBalance($id)
        {
            $category = Category::find($id);
            $category->delete();
            toast('تم الحذف بنجاح', 'success');
            return redirect()->route('allBalances');
        }

        private function getStock($id)
        {
            $stocks = Stock::where('category_id',$id)->get();
            $SumOutComingQ = 0.0;
            $SumOutComingTP = 0.0;
            foreach($stocks as $stock)
            {
                $SumOutComingQ += $stock->outComingQuantity;
                $SumOutComingTP += $stock->outComingTotal;
            }
            $data['SumOutComingQ'] = $SumOutComingQ;
            $data['SumOutComingTP'] = $SumOutComingTP;

            return $data;
        }

    #End Region
}
