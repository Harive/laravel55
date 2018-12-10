@extends('layout/layout')
@section("title",'管理中心')
@section("content")
<section id="container" >   
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> 用户管理</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="/user/insertadd">添加用户</a></li>
                    </ul>
                    <br>
                    <div class="content-panel">

                        <table class="table table-striped table-advance table-hover">
                            <hr>
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> 昵称</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i>个性签名</th>
                                <th><i class=" fa fa-edit"></i> 状态</th>
                                <th><i class=" fa fa-edit"></i> 操作</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $list as $k=>$v)
                            <tr>
                                <td>{{$v->nickname}}</td>
                                <td class="hidden-phone">{{$v->signature}}</td>
                                <td><span class="label label-info label-mini">{{$v->email_state}} </span></td>
                                <td>
                                    <a href="/user/update/{{$v->id}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil">修改</i></a>
                                    <a href="/user/deletes/{{$v->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o">删除</i></a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->

<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

@endsection