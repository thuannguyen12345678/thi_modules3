@extends('admin.layouts.index')

@section('title', 'Cập nhật công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhật công việc</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên Sách</label>
                    <input type="text" class="form-control" name="TENSACH" value="{{ $category->TENSACH }}" required>
                </div>

                <div class="form-group">
                    <label>ISBN</label>
                    <textarea class="form-control" rows="3" name="ISBN"  required>{{ $category->ISBN }}</textarea>
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <textarea class="form-control" rows="3" name="TACGIA"  required>{{ $category->TACGIA }}</textarea>
                </div>
                <div class="form-group">
                    <label>Thể Loại</label>
                    <textarea class="form-control" rows="3" name="THELOAI"  required>{{ $category->THELOAI }}</textarea>
                </div>
                <div class="form-group">
                    <label>Số Trang</label>
                    <textarea class="form-control" rows="3" name="SOTRANG"  required>{{ $category->SOTRANG }}</textarea>
                </div>
                <div class="form-group">
                    <label>Năm xuất bản</label>
                    <textarea class="form-control" rows="3" name="NAMXUATBAN"  required>{{ $category->NAMXUATBAN }}</textarea>
                </div>

                {{-- <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" >
                </div> --}}

                {{-- <div class="form-group">
                    <label>Ngày hết hạn</label>
                    <input type="date" name="due_date" class="form-control"  value="{{ $task->due_date }}" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection