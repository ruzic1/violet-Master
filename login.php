<?php
    //session_start();
    include "pages/header.php";
    include "pages/navigation.php";
?>
<form>


<section class="vh-100 gradient-custom backgr">
<section class="bck">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login</h3>
            <form>


              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>
                  <div class="errorReportMail">Wrong email input.Try inserting @ character or domen</div>
                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="errorReportPassword">Wrong password.Make sure that password has between 6 and 16 characters and atleast one symbol</div>
                </div>
              </div>

              <div class="mt-4 pt-2">
                <p>Don't have an account. Create one <a href="register.php">here</a></p>
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="button" value="Login" id="logButton2"/>
              </div>
              <div id="odgovor"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    include 'pages/footer.php';
?>