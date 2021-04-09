@extends('layout.layout')

@section('content')
<body>
    <div class="container">
        <h2>Thêm thể loại</h2>
        <form id="jsvalidations" method="post" action="{{route('tl_theloai.store')}}" style="width: 85%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên thể loại</label>
                <input id="tentheloai" type="text" class="form-control" name="tentheloai" placeholder="nhập tên" />
            </div>
            <div class="form-group">
                <label>Ghi chú</label>
                <input id="ghichu" type="text" class="form-control" name="ghichu" placeholder="nhập ghi chú" />
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>
@endsection