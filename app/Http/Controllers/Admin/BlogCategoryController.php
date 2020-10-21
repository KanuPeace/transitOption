<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->PostCategory->all();
        return view('admin.blog_categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if(!$data['success']){
            return back()->withErrors($data['data'])->withInput($request->all());
        }
        $data = $data['data'];
        $data['slug'] = Str::slug($data['title']);
        $this->PostCategory->create($data);
        return redirect()->route('admin.blog.categories.index')->with('success_msg', 'Blog category created successfully!');
    }


    public function validateData($request , $item = null)
    {
        if(isset($item) && $item->title != $request->title){
            $title = '|unique:post_categories,title';
        }
        else{
            $title = '';
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|string'.$title,
            'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg',
            'status' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        if($validator->fails()){
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }

        if(!empty( $image = $request->file('image'))){
            $data['file'] = putFileInStorage($image , $this->blogCategoryImagePath);
        }
        return [
            'success' => true,
            'data' => $validator->validated(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->PostCategory->find($id);
        return view('admin.blog_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->PostCategory->find($id);
        return view('admin.blog_categories.edit', compact('category'));
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
        $category = $this->PostCategory->find($id);
        $data = $this->validateData($request , $category);
        if(!$data['success']){
            return back()->withErrors($data['data'])->withInput($request->all());
        }
        $data = $data['data'];
        try{
            if(!empty($request['file'])){
                deleteFileFromStorage($category->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old category image!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->PostCategory->update($category->id ,$data);
        return redirect()->route('admin.blog.categories.index')->with('success_msg', 'Blog Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->PostCategory->find($id);
        if($category->posts->count() > 0){
            return redirect()->back()->with('error_msg', 'Cant delete category because it has some posts. Delete posts first!');
        }
        try{
            if(!empty($category->image)){
               deleteFileFromStorage($category->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old category image!');
        }
        $this->PostCategory->delete($category->id);
        return redirect()->back()->with('success_msg', 'Post Category deleted successfully!');
    }
}
