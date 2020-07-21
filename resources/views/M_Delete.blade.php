
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<style>
.btn-outline-danger {
    color: #ff3547 !important;
    background-color: transparent !important;
    border: 2px solid #ff3547 !important;
}
.waves-effect {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}
.waves-effect, .waves-light {
    display: inline-block;
}
.text {
    font-family: "Font Awesome 5 Free";
}
</style>


<form>
  <!-- Trigger the modal with a button -->
  <a class="btn btn-danger" id="myBtn3">Modal</a>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger modal-dialog-centered" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center" style="background-color: #ff3547;">
        <h2 class="heading" style="color: #ffff;">¡AVISO!</h2>
      </div>

      <!--Body-->
        <div class="modal-body">
            <p class="text"><strong>No podra recuperar la informacion una vez eliminada, ¿Desea Continuar?</strong></p>
        </div>

      <!--Footer-->
      <div class="modal-footer" style="justify-content: center; height: 100%; display: flex;">
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal" style="background-color: #ff3547 !important;">No</a>
        <a href="" class="btn  btn-outline-danger waves-effect waves-light">Si</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
 
<script>
$(document).ready(function(){
  $("#myBtn3").click(function(){
    $("#modalConfirmDelete").modal({
        backdrop: "static",
        keyboard:false
        });
  });
});
</script>

</body>
</html>