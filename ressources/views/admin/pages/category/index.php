<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 12/10/2018
 * Time: 11:12
 */
$categories = \App\App::getInstance()->getTable('category')->all();
//var_dump($categories);die();
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                CATEGORIES
                <!--                <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>-->
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CATEGORIES LIST
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="admin.php?p=add_category">Add new category</a></li>
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
                                <th>Name</th>
                                <th>Cpdate_at</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category->id ?></td>
                                    <td><?= $category->name ?></td>
                                    <td><?= $category->update_at ?></td>
                                    <td><?= $category->created_at ?></td>
                                    <td>
                                        <a type="button" href="admin.php?p=edit_category&id=<?= $category->id ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
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
