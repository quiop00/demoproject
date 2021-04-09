@extends('layout.layout')

@section('content')
<body>
    <div class="container">
        <h2>Thêm slide</h2>
        <form id="jsvalidations" method="post" action="{{route('tl_slide.store')}}" style="width: 85%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề</label>
                <input id="tieude" type="text" class="form-control" name="tieude" placeholder="nhập tiêu đề" />
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input id="noidung" type="text" class="form-control" name="noidung" placeholder="nhập nội dung" />
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="images" class="custom-file-input">
                        </input>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>

</body>
@endsection