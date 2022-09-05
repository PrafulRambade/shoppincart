<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DataTables;


class ProductController extends Controller
{
    public function productsList(Request $request){
        if ($request->ajax()) {
        $all_products = Product::join('categories', 'categories.id', '=', 'products.product_category')
                        ->select('products.*', 'categories.category_name')
                        ->where('products.product_status', 1)
                        ->orderByDesc("products.id","ASC")->get();
            return Datatables::of($all_products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn='';
                    if ($row->status == 0){
                    $btn =
                        '<a href="edit_product/'.$row->id.'" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Edit" class="edit btn btn-primary btn-sm edittodo"><i class="fa fa-edit"></i></a>';

                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Delete" class="btn btn-danger btn-sm btn_delete"><i class="fa fa-trash"></i></a>';
                    // if ($row->status == 0){
                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Delete" class="btn btn-success btn-sm completetask_todo"><i class="fa fa-check"></i></a>';
                    // }
                }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.products');
    }
    public function addProduct(){
        $category = Category::all()
                        ->pluck('category_name', 'id');
        return view('admin.product_add')->with('category',$category);
    }
    public function saveproduct(ProductRequest $request){
        // return $request;
        if($request->hasFile('product_image')){
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('product_image')->storeAs('public/product_images',$filenameToStore);
        }else{
            $filenameToStore = 'noimage.jpg';
        }

        $product = New Product;
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $filenameToStore;
        $product->product_status = 1;
        $product->product_description = $request->input('product_desc');
        $product->save();

        return redirect('/products')->with('status','Product Added Sccessfully');
    }
    public function edit_product($id){
        $single_product = Product::find($id);
        $category = Category::all()->pluck('category_name', 'id');
        return view('admin.edit_product')->with('single_product',$single_product)
        ->with('category',$category);
    }
    public function update_product(ProductRequest $request){
        

        $product = Product::find($request->id);

        if($request->hasFile('product_image')){
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('product_image')->storeAs('public/product_images',$filenameToStore);
            
            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/'.$product->product_image);
            }
            $product->product_image = $filenameToStore;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        // $product->product_image = $filenameToStore;
        $product->product_description = $request->input('product_desc');
        $product->update();

        return redirect('/products')->with('status','Product Updated Sccessfully');
    }
    public function deleteProduct($id){
       
        $product = Product::find($id);
        if($product){
            $product = $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Deleted Successfully.'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Product Not Found.'
            ]);
        }
    }
}
