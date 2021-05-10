<!-- view  -->
<div class="container-fluid border" style="width: 98%; margin-left: 16px; background-color: white">
    <div class="row">
        <div class="col-sm-3" style="background-color: ;">
            <div class="dataTables_length" id="datatable_length" style="margin-top: 10px; width: 79px;"> <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                    <option value="10">10 作</option>
                    <option value="25">25 作</option>
                    <option value="50">50 作</option>
                    <option value="100">100 作</option>
                </select> </div>
        </div>


    </div>

    

    <div id="table_data">
        <table class="show-products table table-bordered" id="searchTable" style="margin-top: -20px;">
            <thead>
                <tr style="background-color: #0099FF;">
                    <th class="tha"><label id="DSP_user_cd">ユーザーコード</label></th>
                    <th class="tha"><label id="DSP_user_nm_j">ユーザー名称和文</label></th>
                    <th class="tha"><label id="DSP_user_ab_j">ユーザー略称和文</label></th>
                    <th class="tha"><label id="DSP_user_nm_e">ユーザー名称英文</label></th>
                    <th class="tha"><label id="DSP_user_ab_e">ユーザー略称英文</label></th>
                    <th class="tha"><label id="DSP_auth_role_div">権限区分</label></th>
                    <th class="tha"><label id="DSP_incumbent_div">在職区分</label></th>
                </tr>
            </thead>
            <tbody>
                @foreach($mUser as $value) <tr>
                    <td>
                        <a href="{{route('m_user.createmuser')}}?user_cd={{$value->user_cd}}">{{$value->user_cd}}</a>
                    </td>
                    <td>{{$value->user_nm_j}}</td>
                    <td>{{$value->user_ab_j}}</td>
                    <td>{{$value->user_nm_e}}</td>
                    <td>{{$value->user_ab_e}}</td>
                    <td>{{$value->lib_val_nm_j}}</td>
                    <td>{{$value->lib_val_nm_js}}</td>

                </tr> @endforeach </tbody>
        </table>
    </div>

   
</div>
<!-- end view  -->