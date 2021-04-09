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
                <h2>Danh sách tin tức</h2>
            </div>
            <div class="col-sm-6" style="margin-top: 30px;"> 
                <a type="button" class="btn-sm btn-primary" style="margin-left: 320px;" href="/tintuc/create">Thêm</a>
            </div>
        </div>

        <table class="table table-bordered" style="width: 85%;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Miêu tả</th>
                    <th>Nội dung</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1 ?>
                @foreach($tinTuc as $value)
                <tr>
                    <td>
                        <a class="btn btn-default btn-circle">{{$stt++}}</a>
                    </td>
                    <td>
                        <img style="width: 80px; height: 80px;" src="{{asset("upload/images/".$value->images)}}"></img>
                    </td>
                    <td>
                        <i style="margin-left: 25px;"> {{$value->tieude}}</i><br>
                    </td>
                    <td>
                        {{$value->mieuta}}
                    </td>
                    <td>
                        {{$value->noidung}}
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