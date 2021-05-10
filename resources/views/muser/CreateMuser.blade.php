@extends('layouts.layout')

@section('title', 'User Save')

@section('content')

@include('muser.Header')
<div class="container-fluid" style="width: 100%;background-color: #EEEEEE;">
    <div style="height: 15px; background-color: #EEEEEE;">
        <!--  -->
    </div>
    <div class="container-fluid" style="width: 100%;margin-left: 4px;background-color: white;margin-bottom: 15px;">
        <div class="row" style="height: 50px;">
            <div class="btn-sm-2" style="background-color: ;">
                <h3 style="margin-left: 34px;margin-top: 14px;">ユーザーマスタメンテナンス</h3>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px;margin-left: 245px;">
                <p id="" style="font-weight: bold;margin-left: -57px;">登録者</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="">{{$mUser->cre_user_cd}}</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="margin-left: 15px;">{{$mUser->user_nm_j}}</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="font-weight: bold; margin-left: 15px;">登録日</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="margin-left: 15px;">{{$mUser->cre_datetime}}</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="font-weight: bold; margin-left: 15px;">更新者</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="margin-left: 15px;">{{$mUser->upd_user_cd}}</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="margin-left: 15px;">{{$mUser->user_nm_j}}</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="font-weight: bold;margin-left: 15px;">更新日</p>
            </div>
            <div class="btn-sm-1" style="margin-top: 23px">
                <p id="" style="margin-left: 15px;">{{$mUser->upd_datetime}}</p>
            </div>
        </div>

        <!-- add -->
        <form id="" method="post" action="{{route('m_user.storemuser')}}">
            {{ csrf_field() }}
            <div id="TXT_user" style="margin-top: -20px;">
                <hr>
                <div class="red form-group row" style="margin-top: -9px;margin-bottom: -9px;"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 130px;">ユーザーコード</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control number-only" id="user_cd" value="{{$mUser->user_cd}}" name="user_cd" style="height: 31px; width: 300px;">
                    </div>
                    <div class="col-sm-3" style="margin-left: -413px; margin-top: -2px;">
                        <button style="width: 39px; height: 34px; background-color: #0099FF; border-color: white;" type="submit" class="btn btn-primary glyphicon glyphicon-search"></button>
                    </div>
                </div>

                <hr>

                <div id="" style="margin-top: -22px;">
                    <hr>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 117px;">ユーザー名称和文</label>
                        <div class="col-sm-2">
                            <input type="text" class="required form-control" id="" placeholder="user_nm_j" value="{{$mUser->user_nm_j}}" name="user_nm_j" style="height: 31px;">
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 117px;">ユーザー略称和文</label>
                        <div class="col-sm-2">
                            <input type="text" class="required form-control" id="user_ab_j" placeholder="" value="{{$mUser->user_ab_j}}" name="user_ab_j" style="height: 31px;">
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 117px;">ユーザー名称英文</label>
                        <div class="col-sm-2">
                            <input type="text" class="required form-control" id="user_nm_e" placeholder="" value="{{$mUser->user_nm_e}}" name="user_nm_e" style="height: 31px;">
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 117px;">ユーザー略称英文</label>
                        <div class="col-sm-2">
                            <input type="text" class="required form-control" id="user_ab_e" placeholder="" value="{{$mUser->user_ab_e}}" name="user_ab_e" style="height: 31px;">
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 159px;">パスワード</label>
                        <div class="col-sm-2">
                            <input type="password" class="required form-control" id="pwd" placeholder value="{{$mUser->pwd}}" name="pwd" style="height: 31px;">
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 174px;">所属区分</label>
                        <div class="col-sm-2">
                            <select name="belong_div" class="form-control">
                                <option value="">-- Chọn --</option>
                                @foreach($beLong as $nd => $value)
                                <option value="{{$nd}}" {{($nd == $mUser->belong_div) ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 174px;">役職区分</label>
                        <div class="col-sm-2">
                            <select name="position_div" class="form-control">
                                <option value="">-- Chọn --</option>
                                @foreach($position as $nd => $value)
                                <option value="{{$nd}}" {{($nd == $mUser->position_div) ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 174px;">権限区分</label>
                        <div class="col-sm-2">
                            <select name="auth_role_div" class="form-control">
                                <option value="">-- Chọn --</option>
                                @foreach($auth as $nd => $value)
                                <option value="{{$nd}}" {{($nd == $mUser->auth_role_div) ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="red form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 174px;">在職区分</label>
                        <div class="col-sm-2">
                            <select name="incumbent_div" class="form-control">
                                <option value="">-- Chọn --</option>
                                @foreach($incumbent as $nd => $value)
                                <option value="{{$nd}}" {{($nd == $mUser->incumbent_div) ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 104px;">パスワード変更日時</label>
                        <div class="col-sm-2">
                            <input type="datetime-local" class="form-control" id="pwd_upd_datetime" placeholder="" value="{{$mUser->pwd_upd_datetime}}" name="pwd_upd_datetime" style="height: 31px;">
                        </div>
                    </div>
                    <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 119px;">最終ログイン日時</label>
                        <div class="col-sm-2">
                            <input type="datetime-local" class="form-control" id="login_datetime" placeholder="{{$mUser->login_datetime}}" value="" name="login_datetime" style="height: 31px;">
                        </div>
                    </div>
                    <div class="form-group row"> <label for="" class="col-sm-0 col-form-label" style="margin-left: 200px;">メモ</label>
                        <div class="col-sm-6">
                            <textarea rows="2" type="text" class="form-control" id="memo" placeholder="" value="" name="memo">{{$mUser->memo}}</textarea>
                        </div>
                    </div>

                    <button style="margin-left: 228px;" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
        <!-- end add -->
    </div>

</div>
</div>

</div>
@endsection