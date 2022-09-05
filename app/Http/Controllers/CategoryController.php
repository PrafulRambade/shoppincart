<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.add_category');
    }
    public function addProduct(){
        return view('admin.add_product');
    }
    public function CategoriesList(){
        $data=DB::table('categories')->get();
        return view('admin.categories',['data'=>$data]);
    }
    public function saveCategory(Request $req){
        
        $req->validate([
            'category_name'=> 'required|unique:categories'
        ]);

        $data = DB::table('categories')->insert([
            'category_name'=> $req->category_name,
            'created_at'=>Now()
        ]);
        
        return redirect('/categories');
    }
    public function categoryEdit($id){
        // echo $id;
        $category = category::find($id);
        return view('admin.edit_category')->with('category',$category);
    }
    public function updatecategory(Request $req){

        $category = category::find($req->cat_id);
        $category->category_name=$req->category_name;
        $category->updated_at=Now();
        $category->save();

        return redirect('/categories');
    }
    public function categoryDelete($id){
        $category = category::find($id);
        if($category)
        {
            $category->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Category Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Found.'
            ]);
        }
    }
}
