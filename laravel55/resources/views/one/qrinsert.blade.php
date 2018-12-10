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
          	<h3><i class="fa fa-angle-right"></i>二维码添加</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>添加二维码</h4>
                      <form class="form-horizontal style-form" method="post" action="/one/qrinsert" enctype="multipart/form-data">
                      		{{csrf_field()}}
                          <div class="form-group">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">二维码图片</label>
                              <div class="col-sm-10">
                                  <input type="file" name="qr_photo">
                              </div>
                          </div>                        
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">二维码信息</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="qr_info">
                              </div>
                          </div>
                         <div>
							<input type="submit" class="form-control">
                         </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
          	
          	
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