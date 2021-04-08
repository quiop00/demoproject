@extends('layout.layout')

@section('content')

<body>
    <div class="container">
        <h2>Cập nhập slide</h2>
        <form id="jsvalidations" method="post" action="{{ route('tl_slide.update',[$slide->id])}} "
        style="width: 85%;" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="ten">Tên tiêu đề</label>
                <input id="" type="text" class="form-control" name="tieude" value="{{$slide->tieude}}" placeholder="nhập tiêu đề" />
            </div>
            <div class="form-group">
                <label for="ten">Tên nội dung</label>
                <input id="" type="text" class="form-control" name="noidung" value="{{$slide->noidung}}" placeholder="nhập tiêu đề" />
            </div>
            <div class="form-group">
                <label>Chọn ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="images" class="custom-file-input" value="{{$slide->images}}">
                        </input>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>
@endsection