<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStore;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= DB::table('product')->paginate(2);
        
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
        
        $file = $request->file('image');
        //$fileName= $file->getClientOriginalName();
        $fileName = time() . '.' . $request->image->extension();

        $ext= $file->getClientOriginalExtension();
        $temp=$file->getRealPath();
        $request->image->storeAs('public/images',$fileName);
        
        DB::table('product')->insert([
            'productname'=>$request['productname'],
            'price'=>$request['price'],
            'qty'=>$request['qty'],
            'image'=>$fileName,
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
        //$product = DB::table('product')->where('pid',$id)->value('productname');
        //$product = DB::table('product')->pluck('productname','qty');
        //$product =DB::table('product')->where('price','>',200)->get();
        $product = DB::table('product')->selectRaw('price * ? as Price',[5])->get();
                echo "<pre>";
        print_r($product);
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
            'productname'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ],
            [
                'productname.required'=>"Please enter Product Name",
                'productname.unique'=>"Product Name is already taken in database"
            ]
        );
        if($request->file('image')){
            echo $name=$request->hiddenimg;
            if(\File::exists(public_path('storage/images/'.$name))){
                \File::delete(public_path('storage/images/'.$name));
              }else{
                dd('File not found');
              }            $file = $request->file('image');
            //$fileName= $file->getClientOriginalName();
            $fileName = time() . '.' . $request->image->extension();

            $ext= $file->getClientOriginalExtension();
        $temp=$file->getRealPath();
        $request->image->storeAs('public/images',$fileName);
        
        }
        else{

            $fileName=$request->hiddenimg;
        }
        
        $product=['productname'=>$request->productname,'price'=>$request->price,'qty'=>$request->qty,"image"=>$fileName];
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
