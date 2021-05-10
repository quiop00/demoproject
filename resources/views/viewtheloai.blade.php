@extends('layout.layout')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success text-center" role="alert">
    <strong></strong> {{Session::get('message')}}
</div>
@endif

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Danh sách thể loại</h2>
            </div>
            <div class="col-sm-6" style="margin-top: 30px;">
                <a type="button" class="btn-sm btn-primary" style="margin-left: 320px;" href="/theloai/create">Thêm</a>
            </div>
        </div>

        <form action="<?= route("tl_theloai.search") ?>" method="get">
            <div class="form-group row">
                <div class="col-sm-4 col-xs-7" style="margin-left: 30px;">
                    <input style="width: 220px; margin-left: -2px; margin-top: -1px;" id="" class="form-control" type="text" name="tentheloai" placeholder="Tìm kiếm">
                    @error('tentheloai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4 col-xs-3">
                    <button style="margin-left: 14px;" type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
                </div>
            </div>
        </form>


        <table class="table table-bordered" style="width: 85%;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thể loại</th>
                    <th>Ghi chú</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1 ?>
                @foreach($theLoai as $value)
                <tr>
                    <td>
                        <a class="btn btn-default btn-circle">{{$stt++}}</a>
                    </td>
                    <td>
                        <i style="margin-left: 25px;"> {{$value->tentheloai}}</i><br>
                    </td>
                    <td>
                        {{$value->ghichu}}
                    </td>
                    <td style="padding-left:0;line-height: 33px; ">
                        <a class="btn-default btn-xs" href="edit/{{$value->id}}">
                            <i class="glyphicon glyphicon-pencil"></i>Sửa</a>
                        <a class="btn-default btn-xs" href="delete/{{$value->id}}">
                            <i class="glyphicon glyphicon-trash"></i>Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection