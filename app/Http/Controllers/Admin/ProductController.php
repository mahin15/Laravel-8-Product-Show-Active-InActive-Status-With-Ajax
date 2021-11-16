<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function product(){
        $products=Product::get();
        return view('admin.product.products')->with(compact('products'));
    }

    public function addEditProduct(Request $request, $id=null){
        if($id==""){
            $title="Add New Product";
            $product= new Product;
            $message="Product Added Successfully";
            // $getCategories=array();
            $productData=array();
        }else{
            $title="Edit Product";
            $productData=Product::find($id);
            
            $productData=json_decode(json_encode($productData),true);
            $product=Product::where('id',$id)->first();
           
            $message="Product Updated Successfully";

        }

        if($request->isMethod('post')){
            $data=$request->all();

            $rules=[
                'name'=>'required',
                'code'=>'required',
                'price'=>'required',
                'size'=>'required',
                'weight'=>'required',
                'description'=>'required',
                'image'=>'image|mimes:jpeg,jpg,png,gif|max:2048'
            ];
            $customMessages=[
                'name.required'=>'Name is Required',
                'name.alpha'=>'Valid Name is Required',
                'code.required'=>'Product Code is Required',
                'price.required'=>'product Price is Required',
                // 'discount_price.required'=>'Product Discount Price is Required',
                'size.required'=>'Product Size is Required',
                'weight.required'=>'Product Weight is Required',
                'description.required'=>'Product Descrition is Required',
                'product_image.image'=>'Valid Image is Required',
                'product_image.mimes'=>'Valid Image Formate is Required'
            ];
            
            $this->validate($request,$rules,$customMessages);

            $product->name=$data['name'];
            $product->code=$data['code'];
            $product->price=$data['price'];
            $product->discount_price=$data['discount_price'];
            $product->size=$data['size'];
            $product->weight=$data['weight'];
            $product->description=$data['description'];
            $product->meta_title=$data['meta_title'];
            $product->meta_description=$data['meta_description'];
            $product->meta_keywords=$data['meta_keywords'];
            $product->status=0;
            if($request->hasFile('image')){
                $image_tmp=$request->file('image');
                if($image_tmp->isValid()){
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension=$image_tmp->getClientOriginalExtension();
                    $imageName=$image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path=public_path('/images/product_images/large/'.$imageName);
                    $medium_image_path=public_path('/images/product_images/medium/'.$imageName);
                    $small_image_path=public_path('/images/product_images/small/'.$imageName);
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);
                    $product->image=$imageName;
                }
            }
            $product->save();
            Session::flash('success_message',$message);
            return redirect('admin/product');
        }

        
        return view('admin.product.add_edit_product')->with(compact('title','productData'));  
    }

    public function deleteProduct($id){ 
        $productImage=Product::where('id',$id)->first();
        $small_image_path=public_path('images/product_images/small/'.$productImage['image']);
        $medium_image_path=public_path('images/product_images/medium/'.$productImage['image']);
        $large_image_path=public_path('images/product_images/large/'.$productImage['image']);

                    if (File::exists($small_image_path)) { 
                        unlink($small_image_path);
                    }
                    if (File::exists($medium_image_path)) { 
                        unlink($medium_image_path);
                    }
                    if (File::exists($large_image_path)) { 
                        unlink($large_image_path);
                    }
        Product::where('id',$id)->delete();
        Session::flash('success_message','Product Deleted Successfully!');
        return redirect()->back();

    }

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data=$request->all();
            if($data['status']=="Active"){
                $status=0;
            }else{
                $status=1;
            }
            $DB = Product::where('id', $data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

}
