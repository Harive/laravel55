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
            <h3><i class="fa fa-angle-right"></i> 添加用户</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"></h4>
                        <form action="inserts" class="form-horizontal style-form" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">昵称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="nickname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">性别</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="gender">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">个性签名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="signature">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">邮箱</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">手机号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="telphone"><br><br>
                                    <td class="nav pull-right top-menu">
                                        <input type="submit" value="提交" class="logout">
                                    </td>
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">角色</label>
                                <div class="col-sm-10">
                                 @foreach($data as $k => $v)
                                    <input type="checkbox" class="form-control round-form" name="role[]" value="{{$v->rid}}">{{$v->role_name}}<br><br>
                                 @endforeach   
                                </div>
                            </div>   
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-2 col-sm-2 control-label">头像</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input type="file" class="form-control round-form" name="head_portrait">--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        </form>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

   
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('assets')}}/js/jquery.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{asset('assets')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{asset('assets')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="{{asset('assets')}}/js/common-scripts.js"></script>

<!--script for this page-->
<script src="{{asset('assets')}}/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="{{asset('assets')}}/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="{{asset('assets')}}/js/jquery.tagsinput.js"></script>

<!--custom checkbox & radio-->

<script type="text/javascript" src="{{asset('assets')}}/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="{{asset('assets')}}/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="{{asset('assets')}}/js/form-component.js"></script>


<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

@endsection