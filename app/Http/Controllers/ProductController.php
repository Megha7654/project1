<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStore;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= DB::table('product')->get();
        
        return  view('Admin.product',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Admin.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
       /* $request->validate([
            'productname'=>'required|unique:product',
            'qty'=>'required|numeric',
            'price'=>'required',
        ],
            [
                'productname.required'=>"Please enter Product Name",
                'productname.unique'=>"Product Name is already taken in database"
            ]
        );*/

        $validate= $request->validated();


        DB::table('product')->insert([
            'productname'=>$request['productname'],
            'price'=>$request['price'],
            'qty'=>$request['qty'],
            'image'=>"one.jpg",
            // 'created_at'=>date("Y-m-d H:i:s"),
            // 'updated_at'=>date("Y-m-d H:i:s"),
            'cid'=>1
        ]);
        return redirect()->route('product.index')->with(['success'=>"Data successfully inserted"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=DB::table('product')->where(['pid'=>$id])->first();
        return view('Admin.productedit',['product'=>$product]);
   
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
        $request->validate([
            'productname'=>'required|unique:product',
            'qty'=>'required|numeric',
            'price'=>'required',
        ],
            [
                'productname.required'=>"Please enter Product Name",
                'productname.unique'=>"Product Name is already taken in database"
            ]
        );
        $product=['productname'=>$request->pname,'price'=>$request->price,'qty'=>$request->qty];
        DB::table('product')
            ->where(['pid'=>$id])
            ->update($product);
            return redirect()->route('product.index')->with(['success'=>"Data successfully updated"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where(['pid'=>$id])->delete();
        return redirect()->route('product.index')->with(['success'=>"Data successfully Deleted"]);

    }
}
