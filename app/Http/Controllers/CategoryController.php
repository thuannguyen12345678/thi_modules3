<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::orderBy('TENSACH', 'ASC')->search()->paginate(2);
        $category = Category::all();
        return view('categories.list', compact('category'));
       
    }
 
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'TENSACH' => 'required',
                'ISBN' => 'required',
                'TACGIA' => 'required',
                'THELOAI' => 'required',
                'SOTRANG' => 'required',
                'NAMXUATBAN' => 'required',
            ],
            [
                'TENSACH.required' => 'Yêu cầu nhập tên giày',
                'ISBN.required' => 'Yêu cầu nhập ISBN',
                'TACGIA.required' => 'Yêu cầu nhập tácc giả',
                'THELOAI.required' => 'Yêu cầu nhập thể loại',
                'SOTRANG.required' => 'Yêu cầu nhập số trang',
                'NAMXUATBAN.required' => 'Yêu cầu nhập năm xuất bản',
            ]
        );

        $category = new Category();
        $category->TENSACH = $request->input('TENSACH');
        $category->ISBN = $request->input('ISBN');
        $category->TACGIA = $request->input('TACGIA');
        $category->THELOAI = $request->input('THELOAI');
        $category->SOTRANG = $request->input('SOTRANG');
        $category->NAMXUATBAN = $request->input('NAMXUATBAN');
        $category->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach category
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->TENSACH = $request->input('TENSACH');
        $category->ISBN = $request->input('ISBN');
        $category->TACGIA = $request->input('TACGIA');
        $category->THELOAI = $request->input('THELOAI');
        $category->SOTRANG = $request->input('SOTRANG');
        $category->NAMXUATBAN = $request->input('NAMXUATBAN');

        
        


        // $task->due_date = $request->input('due_date');
        $category->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach category
        return redirect()->route('categories.list');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);


        //delete image
       

        $category->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('categories.list');
    }
}