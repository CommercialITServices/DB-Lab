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
                                <strong>
                                    <p> CITS Lab Registeration Page</p>
                                </strong>
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="Department" class="form-label">Department</label>
                                        <input type="Department" class="form-control" id="Department">
                                    </div>
                                    <input type="button" id ="regBtn" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Sign Up">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="./login.php">Sign In</a>
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
    $('#regBtn').click(function(e){
      e.preventDefault()
      $('#regBtn').attr('disable', true)
      $('#regBtn').html('please wait!')

      var email = document.querySelector("#email").value;
      var password = document.querySelector("#password").value;
      var dept = document.querySelector("#Department").value;
      $.ajax({
        url: './RegAuth.php' ,
        method: 'post',
        data: {email:email, password:password, dept:dept},
        error: err=>{
          console.log(err)
          alert('An error occured');
          $('#regBtn').removeAttr('disable')
          $('#regBtn').html('Sign Up')
        },
        success: function(resp){
          if(resp == 1){
            alert('user Added succesfully')
            location.replace('./index.php')
            }else if(resp == 2){
              alert("Incorrect Details.")
                $('#regBtn').removeAttr('disable')
                $('#regBtn').html('Sign Up')
            }else{
                alert(resp)
                $('#loginBtn').removeAttr('disable')
                $('#regBtn').html('Sign Up')
            }
        }
      })

    })
  })
</script>