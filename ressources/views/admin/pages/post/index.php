<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 12/10/2018
 * Time: 12:24
 */
$posts = \App\App::getInstance()->getTable('post')->all();
//$app = (new \App\App())->getTable('post')->all();
$latest = \App\App::getInstance()->getTable('post')->latest();
//var_dump($latest);die();
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                POSTS
                <!--                <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>-->
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            POST LIST
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="admin.php?p=add_post">Add new Post</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>body</th>
                                <th>image</th>
                                <th>category_id</th>
                                <th>created_at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <?php foreach ($latest as $post): ?>
                                <tr>
                                    <td><?= $post->id ?></td>
                                    <td><?= $post->title ?></td>
                                    <td><?= substr($post->body, 0, 20)?></td>
                                    <td>
                                        <img class="img img-thumbnail" src="<?= '../uploads/'.$post->image ?>" style="width: 75px;">
                                    </td>
                                    <td><?= $post->name ?></td>
                                    <td><?= $post->created_at ?></td>
                                    <td>
                                        <a type="button" href="" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">mode_edit</i>
                                        </a>
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">delete_forever</i>
                                        </a>
                                        <a type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
