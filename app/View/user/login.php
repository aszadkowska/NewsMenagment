
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-offset-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Create a New Account</h3>
                </div>
                <div class="panel-body">
                    <form action="../../../submit.php" method="post">
                        <div class="form-group">
                            <label for="email-input">Email <span class="text-danger">*</span></label>
                            <input type="text" id="email-input" class="form-control" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password-input">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password-input" class="form-control" name="password" />
                        </div>
                        <input type="hidden" name="csrf_token" value="" />
                        <!--                        <button type="submit" class="btn btn-primary" name="signup-submit">Register</button>-->
                        <button type="submit" class="btn btn-primary" name="loginSubmit" value="Signup">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>