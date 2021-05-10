<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    

    <title>Document</title>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h2>danh sách teacher</h2>
            <table class="table table-bordered" style="width: 85%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Tiêu đề</th>
                        <th>ghi chú</th>
                        <th>chức năng</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- <tr>
                        <td>
                            <a class="btn btn-default btn-circle">1</a>
                        </td>
                        <td>
                            <a class="btn btn-default btn-circle">a</a>
                        </td>
                        <td>
                            <i style="margin-left: 25px;"> a</i><br>
                        </td>
                        <td>
                            a
                        </td>
                        <td style="padding-left:0;line-height: 33px; ">
                            <a class="btn-default btn-xs">
                                <i class="glyphicon glyphicon-pencil"></i>Sửa</a>
                            <a class="btn-default btn-xs">
                                <i class="glyphicon glyphicon-trash"></i>Delete</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>

            <!-- add -->
            <div>
                <span id="addT"> add new teacher</span><br>
                <span id="updateT"> update new teacher</span>
            </div>
            <div class="form-group">
                <label for="">tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="nhập tên">
                <span class="text-danger" id="nameError"></span>
            </div>
            <div class="form-group">
                <label for="">tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="nhập tiêu đề">
                <span class="text-danger" id="titleError"></span>
            </div>
            <div class="form-group">
                <label for="">ghi chú</label>
                <input type="text" class="form-control" id="institute" name="institute" placeholder="nhập institute">
                <span class="text-danger" id="instituteError"></span>
            </div>
            <input type="hidden" id="id">
            <div>
                <div class="col-sm-1">
                    <button type="submit" id="addButton" onclick="addData()" class="btn btn-primary">ADD</button>
                </div>
                <div class="col-sm-1">
                    <button type="submit" id="updateButton" onclick="updateData()" class="btn btn-primary">UPDATE</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#addT').show();
        $('#addButton').show();
        $('#updateT').hide();
        $('#updateButton').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function allData() {

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/teacher/all",
                success: function(response) {
                    var data = ""
                    // console.log(data);
                    $.each(response, function(key, value) {
                        data = data + "<tr>"
                        data = data + "<td>" + value.id + "</td>"
                        data = data + "<td>" + value.name + "</td>"
                        data = data + "<td>" + value.title + "</td>"
                        data = data + "<td>" + value.institute + "</td>"
                        data = data + "<td>"
                        data = data + "<button class='btn btn-sm btn-primary mr2' onclick='editData(" + value.id + ")'>Edit</button>"
                        data = data + "<button class='btn btn-sm btn-danger mr2' onclick='deleteData(" + value.id + ")'>Del</button>"
                        data = data + "</td>"
                        data = data + "</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }

        allData();

        function clearData() {
            $('#name').val('');
            $('#title').val('');
            $('#institute').val('');
            $('#nameError').text('');
            $('#titleError').text('');
            $('#instituteError').text('');
        }


        function addData() {
            var name = $('#name').val();
            var title = $('#title').val();
            var institute = $('#institute').val();


            // console.log(name);
            // console.log(title);
            // console.log(institute);

            $.ajax({
                type: "POST",
                dateType: "json",
                data: {
                    name: name,
                    title: title,
                    institute: institute,
                },
                url: "/teacher/store/",
                success: function(data) {
                    clearData();
                    allData(); // hiển thi data sau khi add thành công

                    // start alert
                    const Msg = Swal.mixin({
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    Msg.fire({
                        type: 'success',
                        title: 'Thêm thành công',
                    })
                    // end alert
                    console.log(' thêm dữ liệu thành công');
                },

                error: function(error) {
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#titleError').text(error.responseJSON.errors.title);
                    $('#instituteError').text(error.responseJSON.errors.institute);

                    // console.log(error.responseJSON.errors.name);
                    // console.log(error.responseJSON.errors.title);
                    // console.log(error.responseJSON.errors.institute);
                }
            })


        }

        // --------------edit------------------

        function editData(id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/teacher/edit/" + id,
                success: function(data) {
                    // console.log(data);
                    $('#addT').hide();
                    $('#addButton').hide();
                    $('#updateT').show();
                    $('#updateButton').show();

                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#title').val(data.title);
                    $('#institute').val(data.institute);
                }
            })
        }

        // -------update-------

        function updateData() {
            var id = $('#id').val();
            var name = $('#name').val();
            var title = $('#title').val();
            var institute = $('#institute').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    name: name,
                    title: title,
                    institute: institute,
                },
                url: "/teacher/update/" + id,
                success: function(data) {
                    clearData();
                    allData(); // hiển thi data sau khi add thành công
                    // start alert
                    const Msg = Swal.mixin({
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    Msg.fire({
                        type: 'success',
                        title: 'Cập nhập thành công',
                    })
                    // end alert
                    console.log('cập nhập thành công');
                },
                error: function(error) {
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#titleError').text(error.responseJSON.errors.title);
                    $('#instituteError').text(error.responseJSON.errors.institute);
                }
            })
        }

        // ------delete---------

        function deleteData(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: "/teacher/destroy/" + id,
                            success: function(data) {
                                $('#addT').show();
                                $('#addButton').show();
                                $('#updateT').hide();
                                $('#updateButton').hide();
                                clearData();
                                allData(); // hiển thi data sau khi add thành công
                                console.log('xoá thành công');
                            }
                        })
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }
        // ------delete---------
    </script>
</body>

</html>