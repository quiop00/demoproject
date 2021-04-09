@extends('layout.layout')

@section('content')

<body>
    <div class="container">
        <h2>Cập nhập thể loại</h2>
        <form id="jsvalidations" method="post" action="{{ route('tl_theloai.update',[$theLoai->id])}} "
        style="width: 85%;" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="ten">Tên thể loại</label>
                <input id="" type="text" class="form-control" name="tentheloai" value="{{$theLoai->tentheloai}}" placeholder="nhập tên" />
            </div>
            <div class="form-group">
                <label for="ten">Ghi chú</label>
                <input id="" type="text" class="form-control" name="ghichu" value="{{$theLoai->ghichu}}" placeholder="nhập ghi chú" />
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>Cập nhập</button>
        </form>
    </div>
</body>
@endsection