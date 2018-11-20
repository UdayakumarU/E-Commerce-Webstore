<div id="form" class="modal fade " role="dialog">
    <div id="signin" class="modal-dialog ">
        <div class="modal-content  ">
            <div class="modal-header ">
                <h4 class="modal-title">Sign In</h4>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body ">
                <h4 class="text-center"><img src="images/logo.png" width="150" height="30"alt="" ></h4>
                <form action="signin.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">email</i>
                            </span>
                        </div>
                        <input type="text"  name="user" class="form-control" placeholder="Email or Phone" required="true">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control"  placeholder="Password" required="true">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="submit">Sign in</button>
                    <label class="checkbox float-left">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <a href="#" class="float-right"  onClick="$('#signin').hide(); $('#signup').hide();$('#forget').show()">Forgot password?</a>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="float-right" onClick="$('#signin').hide(); $('#signup').show();$('#forget').hide()">Create an account </a>
            </div>
        </div>
    </div>

   <div id="forget" class="modal-dialog ">
        <div class="modal-content  ">
            <div class="modal-header ">
                <h4 class="modal-title">Forget password</h4>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body ">
                <h4 class="text-center"><img src="images/logo.png" width="150" height="30"alt="" ></h4>
                <form method="post" id="forgetPassword">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">email</i>
                            </span>
                        </div>
                        <input type="text"  name="email" class="form-control" placeholder="Email" required="true">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="pass">Send Password</button> 
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="float-right" onClick="$('#signin').hide(); $('#signup').show();$('#forget').hide()">Create an account </a>
            </div>
        </div>
    </div>



    <div id="signup" class="modal-dialog ">
        <div class="modal-content  ">
            <div class="modal-header ">
                <h4 class="modal-title"> Sign Up</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body ">
                <h4 class="text-center"><img src="images/logo.png" width="150" height="30"alt="" ></h4>
                <div id='msgs' style="padding: 20px 0; text-align: center;"></div>
                <form method="post" onsubmit="return (register());">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name" id ="name" name="name" required="true">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">email</i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" id ="email" name="email"required="true">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">stay_primary_portrait</i>
                            </span>
                        </div>
                        <input type="text"class="form-control" placeholder="Phone" id ="phone" name="phone" required="true">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" id ="password" name="password" required="true">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="signup">Create Account
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="float-right" onClick="$('#signin').show(); $('#signup').hide();$('#forget').hide()">Have an account</a>
            </div>
        </div>
    </div>
</div>