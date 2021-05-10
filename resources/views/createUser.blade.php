<!DOCTYPE html>
<html>

<head>
    <title>Laravel 7 form validation example - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Laravel 7 form validation example</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif

        <div id="searcharea" style="display:; margin-top: 15px;">
            <form action="{{ url('user/search') }}" method="get" class="form-inline pull-">
                <div class="form-group row">
                    <div class="col-sm-4 col-xs-7" style="margin-left: 30px;">
                        <input style="width: 220px; margin-left: -2px; margin-top: -1px;" 
                        id="" class="form-control" type="text" name="search" placeholder="">
                    </div>
                    <div class="col-sm-4 col-xs-3">
                        <button style="margin-left: 14px;" type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>


        <form method="POST" action="{{ url('user/create') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>