<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 11/10/2018
 * Time: 13:42
 */
if(isset($_POST) AND !empty($_POST))
{
    $passwprd = htmlspecialchars($_POST['password']);
    $conf = htmlspecialchars($_POST['conf_password']);

    if($passwprd === $conf)
    {
         $u = \App\App::getInstance()->getTable('user');

         $res = $u->save([
             'name' => htmlspecialchars($_POST['name']),
             'email' => htmlspecialchars(trim($_POST['email'])),
             'password' => password_hash($passwprd, true)
         ]);

         if($res)
         {
             header("location:admin.php?p=user_show");
         }
    }else {
        $message = "password not matched";
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USERS</h2>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
<!--                            VERTICAL LAYOUT-->
                            <small>Add User</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="admin.php?p=user_show">Go back</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form method="POST" action="">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control">
                                    <label class="form-label">Name </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="email" id="email_address" class="form-control">
                                    <label class="form-label">Email Address</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <label class="form-label">Password</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" id="password" name="conf_password" class="form-control">
                                    <label class="form-label">Conf Password</label>
                                </div>
                            </div>

                            <br>

                            <div class="form-group form-float">
<!--                                <div class="form-line">-->
                                    <button type="submit" name="btnadduser" style="float: right;" class="btn btn-primary m-t-15 waves-effect">save</button>
<!--                                </div>-->
                                <br>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>
</section>
