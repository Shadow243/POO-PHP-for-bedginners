       <?php 
    //    die(password_hash('rootroot', true));

        if (isset($_POST['logbtn'])) {
            if (!empty($_POST)) {
                $auth = new \Core\Auth\DBAuth(App\App::getInstance()->getDb());
                $res = $auth->login($_POST['email'], $_POST['password']);
                if ($res) {
    //        $user = App::getInstance()->getTable('user')->find([$_SESSION['auth']]);
                    header("location:admin.php?p=welcome");
    //        var_dump($user);
    //        die();
                } else {
                // die("erreur......!");
                    $error = "Identifiant email pou mot de pass incorrect";
                    // die($error);
                }
            } else {
            // die("les chamops sont vide");
                $error = "les chamops sont vide";
            }
        }
        ?>

   <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>TONNY</b></a>
            <small>Welcome to Our - Admin Page</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="">
                    <div class="msg">Sign in to start your session</div>
                    <?php if(isset($error) && !empty($error)) {
                        ?>
                        <div class="msg"><?= $error ?></div>
                        <?php
                    } ?>
                
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="logbtn" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

