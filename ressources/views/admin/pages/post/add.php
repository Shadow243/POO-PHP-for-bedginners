<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 12/10/2018
 * Time: 12:24
 */
$categories = \App\App::getInstance()->getTable('category')->all();

//ADD POST SCRIPT
if(isset($_POST) AND !empty($_POST))
{
//    var_dump($_FILES['image']);die();
    $photo =  \App\App::getInstance()->upload($_FILES['image'], ROOT . '/uploads/');
    if($photo) {
        $post = \App\App::getInstance()->getTable('post')
            ->save([
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'image' => $_SESSION['photo'],
                'category_id' => $_POST['category_id'],
            ]);

        if($post) {
            header("location:admin.php?p=post_show");
        }else {
            $error_message = "Post creation failled";
        }
    }else {
        $post = \App\App::getInstance()->getTable('post')
            ->save([
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'category_id' => $_POST['category_id'],
            ]);

        if($post) {
            header("location:admin.php?p=post_show");
        }else {
            $error_message = "Post creation failled";
        }
    }
}
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>POSTS</h2>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <!--                            VERTICAL LAYOUT-->
                            <small>Add Post</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="admin.php?p=post_show">Go back</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" class="form-control">
                                    <label class="form-label">Title </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" name="body" class="form-control no-resize"></textarea>
                                    <label class="form-label">Content </label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="col-md-6">
                                    <select class="form-control show-tick" data-show-subtext="false" name="category_id">
                                        <?php foreach ($categories as $category): ?>
                                        <option data-subtext="French's" value="<?= $category->id ?>"><?= $category->name ?></option>
                                        <?php endforeach; ?>
<!--                                        <option data-subtext="Heinz">Ketchup</option>-->
<!--                                        <option data-subtext="Sweet">Relish</option>-->
<!--                                        <option data-subtext="Miracle Whip">Mayonnaise</option>-->
<!--                                        <option data-divider="true"></option>-->
<!--                                        <option data-subtext="Honey">Barbecue Sauce</option>-->
<!--                                        <option data-subtext="Ranch">Salad Dressing</option>-->
<!--                                        <option data-subtext="Sweet &amp; Spicy">Tabasco</option>-->
<!--                                        <option data-subtext="Chunky">Salsa</option>-->
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
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
