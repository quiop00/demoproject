@extends('layout.layout')

@section('content')

<body>
    <div class="container">
        <h2>Thêm tin tức</h2>
        <form id="jsvalidations" method="post" action="{{route('tl_tintuc.store')}}" style="width: 85%;" enctype="multipart/form-data">
            @csrf

            <input id="" type="text" class="form-control" name="id" value="{{$tintuc->id}}" placeholder="nhập tiêu đề" />


            <div class="form-group ">
            <label for="">Tên thể loại</label>
            <select name="id_theloai" id="id_theloai"  class="form-control">
                    <option value="">-- Chọn --</option>
                    @foreach($theLoai as $nd => $value)
                    <option value="{{$nd}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="images" class="custom-file-input" value="{{$tintuc->images}}">
                        </input>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tiêu đề</label>
                <input id="tieude" type="text" class="form-control" name="tieude" placeholder="nhập tiêu đề" value="{{$tintuc->tieude}}" />
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <input id="mieuta" type="text" class="form-control" name="mieuta" placeholder="nhập miêu tả" value="{{$tintuc->mieuta}}" />
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input id="noidung" type="text" class="form-control" name="noidung" value="{{$tintuc->noidung}}" placeholder="nhập nội dung" />
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>
@endsection