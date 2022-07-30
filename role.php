<?php
include "header.php";
?>

<div class="content mt-4">
    <div class="container">
        <div class="page-title">
            <h3>User Roles
                <a href="add_role.php" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus-circle"></i> Add</a>
            </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Administrator</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="manage_permissions.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Manager</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="manage_permissions.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Writer</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="permission.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Editor</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="permission.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Audit</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="permission.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Contributor</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="permission.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td>
                              <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <div class="col-md-2 col-6">
                                    <select class="select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                            </td>
                            <td class="text-end">
                                <a href="permission.php" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
include "footer.php";
?>