<body>
  <!--  Body Wrapper -->
  <?php require './components/head.php'?>
  <?php require './components/links.php'?>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <strong><p> CITS Lab Login Page</p></strong>
                <form>
                  <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div>
                  <input type="button" id ="loginBtn" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Sign In">
                  
                  <div class="d-flex align-items-center justify-content-center">
             
                    <a class="text-primary fw-bold ms-2" href="./Registeration.php">Create an account</a>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

</body>
<script>
  $(document).ready(function(){
    $('#loginBtn').click(function(e){
      e.preventDefault()
      $('#loginBtn').attr('disable', true)
      $('#loginBtn').html('please wait!')

      var email = document.querySelector("#email").value;
      var password = document.querySelector("#password").value;
      $.ajax({
        url: './LoginAuth.php' ,
        method: 'post',
        data: {email:email, password:password},
        error: err=>{
          console.log(err)
          alert('An error occured');
          $('#loginBtn').removeAttr('disable')
          $('#loginBtn').html('Sign In')
        },
        success: function(resp){
          if(resp == 1){
            location.replace('./index.php')
            }else if(resp == 2){
              alert("Incorrect Details.")
                $('#loginBtn').removeAttr('disable')
                $('#loginBtn').html('Sign In')
            }else{
                alert(resp)
                $('#loginBtn').removeAttr('disable')
                $('#loginBtn').html('Sign In')
            }
        }
      })

    })
  })
</script>