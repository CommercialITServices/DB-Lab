<!DOCTYPE html>
<html>
<!-- head -->
<?php
session_start();
if(isset($_SESSION['uniqueid']) && !empty($_SESSION['uniqueid'])){


 include ("components/head.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- header -->
  <?php
   include ("components/header.php");
   include ("components/links.php");
  ?>
  
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
 



    <?php 
    if(isset($_GET['page']) && !empty($_GET['page']))
      include($_GET['page'].'.php');
    else
      include("home.php");

    ?>
   <!--=====================primary modal=========================-->
   <div class="modal modal-primary fade" id="uni_modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Primary Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!--=====================danger modal=========================-->

    <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comfamtion Modal</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete?&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" id="btn_delete_modal">Continue</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!--=====================toast modal=========================-->
<div class="modal fade" id="toast">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php
   include ("./adminPartails/footer.php");
  ?>

<script>
//toast
window.toast = function($msg='',$type=''){
  $('#toast').addClass($type)
  $('#toast .modal-title').html($msg)
  $('#toast .modal-footer').hide()
  $('#toast').modal('show')
}

window.uni_modal =  function($title='',$url='',$book = 0){
    $('#uni_modal .modal-title').html($title);
        start_load();

    $.ajax({
      url:$url,
      error:err=>console.log(err),
      success:function(resp){
        $('#uni_modal .modal-body').html(resp)
        $('#uni_modal .modal-footer').show()
        $('#uni_modal').modal('show')
      },
      complete:function(){
        end_load();

      }
    })
  }

  window.modal_danger =  function($title='',$url='',$book = 0){
    $('#modal-danger .modal-title').html($title);
        start_load();

    $.ajax({
      url:$url,
      error:err=>console.log(err),
      success:function(resp){
        $('#modal-danger .modal-body').html(resp)
       
        $('#modal-danger .modal-footer').show()
        $('#modal-danger').modal('show')
      },
      complete:function(){
        end_load();

      }
    })
  }

//for the loading
   /*===========================================================================*/ 
   window._conf = function($msg='',$func='',$params = []){
    $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
 }
 window.start_load = function(){
   $('body').prepend('<di id="preloader2"></di>')
 }
 window.end_load = function(){
   $('#preloader2').fadeOut('fast', function() {
       $(this).remove();
     })
 }
 
 $(document).ready(function(){
 })
</script>




<?php
}
else{
  header('location:login.php');
}
?>

</body>
</html>
