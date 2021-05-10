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
                @error('tentheloai')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Ghi chú</label>
                <input id="ghichu" type="text" class="form-control" name="ghichu" placeholder="nhập ghi chú" />
                @error('ghichu')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
    $('form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '/theloai/store',
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                title: $('input[name=tentheloai]').val()
            }, success: function(res) {
                //
            }, error: function(error) {
                console.log(error);
            }
        })
    })
</script>
@endsection