<!-- header -->
<div style="background-color: #EEEEEE;">
    <div>
        <div>
            <header style="background-color: white;">
                <nav class="bg-lignt border">
                    <div class="row">
                        <div class="col-sm-6" style="font-size: 17px;margin-top: 13px;color: #0099FF">

                            <i style="margin-left: 13px; color:black;" class="glyphicon glyphicon-align-justify"></i>

                            @if($title == 1)
                            <!-- tìm kiếm -->
                            <div class="glyphicon glyphicon-search" style="margin-left: 30px;">
                                <button id="BTN_Search" style="margin-left: -10px;border: none;background-color: white;">検索</button>
                            </div>
                            <!-- end tìm kiếm -->

                            <!-- add new -->
                            <div class="glyphicon glyphicon-plus" style="margin-left: 30px;">
                                <a id="BTN_Add new" href="{{route('m_user.createmuser')}}" style="margin-left: -10px;">新規追加</a>
                            </div>
                        </div>
                        <!-- end add new -->

                        @elseif($title == 2)
                        <!-- tìm kiếm -->
                        <div class="red fa fa-reply" style="margin-left: 40px;">
                            <a href="{{route('m_user.index')}}" style="margin-left: 4px;margin-top: -3px;border: none;color: red;"> 戻る</a>
                        </div>
                        <!-- end tìm kiếm -->

                        <!-- save -->
                        <div class="glyphicon glyphicon-floppy-disk" style="margin-left: 30px;">
                                <button id="BTN_Search" type="submit" style="margin-left: -18px;margin-top: -3px;border: none;background-color: white;">保存</button>
                        </div>
                        <!-- end save -->

                        <!--  delete -->
                        <div class="red glyphicon glyphicon-trash" style="margin-left: 30px;">
                                <button id=" " style="margin-left: -18px;margin-top: -3px;border: none;background-color: white;">削除</button>
                            </div>
                        <!-- end delete  -->

                    </div>
                    @endif

                    <div class="col-sm-6">
                        <div style="height: 47px;">
                            <img src="../images/vietnam.png" style="border-radius: 90%; width: 70px; height: 36px; margin-top: 12px; margin-left: 510px;">
                        </div>

                        <div>
                            <span class="glyphicon glyphicon-chevron-down" style="margin-top: -25px;margin-left: 610px;"></span>
                            </p>
                        </div>
                    </div>
        </div>
        </nav>
        </header>
        <!-- end header -->