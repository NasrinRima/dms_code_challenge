<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ShoppingCartInfo;
use Validator;
use DB;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try {
            $myCarts = ShoppingCartInfo::join('books','books.id','=','shopping_cart_info.book_id')
                        ->where('user_id',authID())->get();

            $totalPrice = ShoppingCartInfo::join('books','books.id','=','shopping_cart_info.book_id')
                        ->select(DB::raw('SUM(books.price) AS total'))
                        ->where('user_id',authID())->first();
                        // return $totalPrice;

            $noOfBooks = $myCarts->count();
            if($noOfBooks>=10){
                $discount = ($totalPrice->total*5)/100;
                $totalPrice = $totalPrice->total-$discount;
            }
           
            return view('cart_info.my_cart',compact('myCarts','noOfBooks','totalPrice'));
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$bookID)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addToShoppingCart(Request $request){
         try {

            DB::beginTransaction();

            ShoppingCartInfo::create([
                'user_id' => authID(),
                'book_id' => $request->bookId,                
            ]);
            
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Successfully created']);
        } catch (\Exception $e) {
            DB::rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
}
