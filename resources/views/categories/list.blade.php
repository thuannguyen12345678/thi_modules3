@extends('admin.layouts.index')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh mục sách</h2>
        </div>

        <div class="col-4">
            <form action="" class="form-inline">
                <div class="form-group ">
                    <input class="form-control" name="key" placeholder="search by name...">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            
        </div>
        <br><br>
        <br><br>


        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm </th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Thể Loại</th>
                        <th scope="col">Số Trang</th>
                        <th scope="col">Năm xuất bản</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->TENSACH }}</td>
                            <td>{{ $category->ISBN }}</td>
                            <td>{{ $category->TACGIA }}</td>
                            <td>{{ $category->THELOAI }}</td>
                            <td>{{ $category->SOTRANG }}</td>
                            <td>{{ $category->NAMXUATBAN }}</td>
                            {{-- <td>
                            @if ($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" alt="" style="width: 120px; height: 120px">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td> --}}
                            {{-- <td>{{ $category->due_date }}</td> --}}
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">sửa</a>
                                <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
