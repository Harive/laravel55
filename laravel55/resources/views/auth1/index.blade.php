@extends('layout/layout')
@section("title",'管理中心')
@section("content")

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
    
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
     
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> 张氏</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <p>Place your content here.</p>
              <p align="right"><a href="{{url('auth1/insert')}}">添加权限</a></p>
              </div>
            </div>
        <table  border="1" width="100%" heigth="407" cellpadding="8" cellspacing="0" class="tableBasic" >
        {{csrf_field()}}
           <tr>
            <th><input type="checkbox" id="all" ></th>
            <th width="30"  >编号</th>
            <th align="left" >权限名称</th>
            <th align="center" >操作</th>
           </tr>
          @foreach($a as $v)
         <tr>
            <td><input type="checkbox" value="{{$v->id}}"></td>
            <td align="center">{{$v->id}}</td>
            <td>{{$v->type_name}}</td>
            <td align="center"><a href="/auth1/edit/{{$v->id}}">编辑</a> |<a href="/deleteauth/{{$v->id}}">删除</a></td>
          @endforeach
         </tr> 
        </table>
        <input type="submit" class="btn" id="unselect" value="全不选">
        <input type="submit" class="btn" id="reverse" value="反选">
        <input type="submit" class="btn" id="del" value="删除">
        
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets')}}/js/jquery.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="{{asset('assets')}}/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{asset('assets')}}/js/jquery.scrollTo.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{asset('assets')}}/js/common-scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--script for this page-->
    
    <script>
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });
            //全选
            $("#all").click(function(){
                $("table input").prop("checked",true)
            })
            // 全不选
            $("#unselect").click(function(){
                $("table input").prop("checked",false)
            })
            // 反选
            $("#reverse").click(function(){
                $(".in").each(function(){
                    this.checked = !this.checked
                })
            })



            //批量删除
            $(function () {
                $("#del").click(function () {
                    var opt = "";
                    var _token=$("input[name='_token']").val();
                    $("input[type='checkbox']").each(function () {
                        if ($(this).is(":checked")) {
                            opt+=$(this).val()+",";
                        }
                    });
                    opt=opt.substr(0,opt.length-1);
                     alert(opt);
                    $.ajax({
                        url:"/checkdel",
                        type:"post",
                        dataType:"json",
                        data:{
                            id:opt,
                            _token:_token
                        },
                        success:function (re) {
                            if(re.code==200){
                                alert(re.data);
                                location.reload();
                            }else{

                            }
                            // alrt(re);
                        }
                    })
                })
            });

    </script>
@endsection

