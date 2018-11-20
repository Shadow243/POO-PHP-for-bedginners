<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 12/10/2018
 * Time: 11:12
 */
if(isset($_GET['id']))
{
    $cat = \App\App::getInstance()->getTable('category')->findById($_GET['id']);
    if($cat) {
//        var_dump($cat);die();

    }  else{
        header("location:admin.php?p=category_show");
    }
}

//EDIT CAT
if(isset($_POST) AND !empty($_POST)) {
    $name = htmlspecialchars($_POST['name']);

    $category = \App\App::getInstance()->getTable('category')
        ->update($cat->id, [
            'name' => htmlspecialchars($_POST['name']),
            'update_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('YmdHis'),
        ], 'id');

    if($category) {
        header("location:admin.php?p=category_show");
    } else{
       $error_message = "Mis en jour category echouer";
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CATEGORIES</h2>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <!--                            VERTICAL LAYOUT-->
                            <small>Edit Category</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="admin.php?p=category_show">Go back</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php
                            if(isset($error_message) && !empty($error_message))
                            {
                                ?>
                                <span class="alert alert-danger"><?= $error_message ?></span>
                                <?php
                            }
                        ?>
                        <form method="POST" action="">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" value="<?= $cat->name ?>" class="form-control">
                                    <label class="form-label">Name </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
<!--                                <div class="form-line">-->
                                    <input type="hidden" name="id" value="<?= $cat->id ?>" class="form-control">
<!--                                    <label class="form-label">Name </label>-->
<!--                                </div>-->
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
