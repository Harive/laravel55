@extends('layout/layout')
@section("title",'管理中心')
@section("content")
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>轮播图管理</h3>
				<div class="row">
				
				</div>

          <!-- row -->

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                           <a href="/one/carouselinsert"><button>添加轮播图信息</button></a>
	                  	  	  <h4><i class="fa fa-angle-right"></i>轮播图管理</h4>
                            <input type="text" id="search" name="search"><button onclick="search()">搜索</button>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><input type="checkbox" onclick="checkall()" id="call">全选</th>
                                  <th><i class="fa fa-bullhorn"></i>轮播图id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>轮播图名</th>
                                  <th><i class="fa fa-bookmark"></i>轮播图图片</th>
                                  <th><i class="fa fa-bookmark"></i>轮播图状态</th>
                                  <th><i class=" fa fa-edit"></i>轮播图排序</th>
                                  <th><i class="fa fa-bookmark"></i>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($data as $v)
                                <tr>
                                    <td><input type="checkbox" class="so" value="{{$v->id}}"></td>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->car_photo}}</td>
                                    <td><img src="{{$v->car_photo}}" width="100" height="100"></td>
                                    <td>{{$v->car_status}}</td>
                                    <td>{{$v->car_sort}}</td>
                                    <td>
                                        <a href="/one/carousellist/{{$v->id}}"><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                        <a href="/one/carouselupdate/{{$v->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="/one/carouseldelete/{{$v->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                </tr>
                             @endforeach
                             <tr>
                                <td colspan="3"><input type="button" onclick="del()" value="删除"></td>
                                <td colspan="4"><input type="button" onclick="choose()" value="反选"></td>
                             </tr>
                             <tr>
                                <td colspan="7">{{$data->links()}}</td>
                             </tr>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
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
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      //全选
        function checkall(){
          var checkall=document.getElementById("call");           //chk全选按钮的id
          var checkid=document.getElementsByClassName('so');    //counts[]复选框的name
          if(checkall.checked==true){
              //全选
              for(var i=0;i<checkid.length;i++){
                  checkid[i].checked=true;
              }
          }
          else{
              //全不选
              for(var i=0;i<checkid.length;i++){
                  checkid[i].checked=false;
              }
          }
        }
        //反选
        function choose(){
          $("input[type='checkbox']").each(function(i){
              this.checked=!this.checked;
          });
        }
        //批量删除
        function del(){
          var box=$("input[class='so']");
          length =box.length;
          // alert(length);
          var str ="";
          for(var i=0;i<length;i++){
              if(box[i].checked==true){
                  str =str+","+box[i].value;
              }
          }
          str= str.substr(1)
          // alert(str)
          location.href="/one/carouseldelete2/"+str;
        }
        //搜索
        function search(){
          var sear=document.getElementById("search").value;
          // alert(sear);
          location.href="/one/carouselsearch/"+sear;
        }
  </script>
@endsection
