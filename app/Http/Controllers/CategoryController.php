<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    public function create()
{
    $category = Category::latest()->get();
  return view('admin/category/addcategory',compact('category'));
}

public function store(Request $request)
 {
    $category = new Category;
    $category->name=$request->name;
    $category->slug= make_slug($request->name);
    if ($request->icon) {
        # code...
        $image = $request->file('icon');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image_path = public_path('/uploads/category');
        $image->move($image_path, $name);
        $category->icon = $name;
    }
  
    $category->save();
    return redirect()->back();
 }


 public function edit($id)
 {
   
 }
 public function update(Request $request)
 {
  $category = Category::find($request->category_id);
  $category->name =$request->name;
  $category->slug = make_slug($request->name);


  if ($request->icon) {
    # code...
    if ($category->icon != "default.png") {
      if (File::exists('uploads/category/'.$category->icon)) {
        File::delete('uploads/category/'.$category->icon);
      }
    }

    $image = $request->file('icon');
    $name = time().'.'.$image->getClientOriginalExtension();
    $image_path = public_path('/uploads/category');
    $image->move($image_path, $name);
    $category->icon = $name;
}

 // Category::where('id',$request->category_id)->update([
      //   'name'=>$request->name,
      //   'slug'=>make_slug($request->name)
      // ]);

      if ($category->save()) {
        # code...
        return redirect()->route('createform')->with('success','Course updated successfully') ;
    } else {
        # code...
        return redirect()->back()->with('warning','something went wrong') ;
    }  


}


public function delete($id)
{
  $category = Category::find($id);

  
  if ($category->icon != "default.png") {
    if (File::exists('uploads/category/'.$category->icon)) {
      File::delete('uploads/category/'.$category->icon);
    }
  }


  if($category->delete()){
     return redirect()->back();
   }
         
}




}
