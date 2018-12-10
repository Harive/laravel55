@extends('layout/layout')
@section("title",'管理中心')
@section("content")
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>二维码</h3>
          	
          	<!-- SIMPLE TO DO LIST -->
          	<div class="row mt">
          		<div class="col-md-12">
          			<div class="white-panel pn">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i>二维码详情</h5></div>
	                        <br>
	                 	</div>
				  		<div class="custom-check goleft mt">
				             <table id="todo" class="table table-hover custom-check">
				              <tbody>
				              	@foreach($data as $v)
				              	<tr>
				            		<td>
				                        <span >二维码id</span>
				                        <span><a href="#">{{$v->id}}</a></span>
									</td>
				                 </tr>
				                <tr>
				           			<td>
				                        <span class="check">二维码名</span>
				                        <a href="#">{{$v->qr_photo}}</a></span>
									</td>
				                </tr>
				                <tr>
				           			<td>
				                        <span class="check">二维码图片</span>
				                        <a href="#"><img src="{{$v->qr_photo}}" width="100" height="100"></a></span>
									</td>
				                </tr>
				                @endforeach
				          
				              </tbody>
				          </table>
						</div><!-- /table-responsive -->
					</div><!--/ White-panel -->
          		</div><! --/col-md-12 -->
          	</div><! -- row -->
			

          
			
          	<!-- SORTABLE TO DO LIST -->
			
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
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
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <script src="{{asset('assets')}}/js/tasks.js" type="text/javascript"></script>

    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

@endsection