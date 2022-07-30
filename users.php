<?php
include "header.php";
?>
   
    <div class="wrapper pt-4 ">
        <div class="content">
            <div class="container">
                <div class="page-title mt-6">
                    <h3>Users
                        <a href="roles.php" class="btn btn-sm btn-outline-dark float-end "><span class="fas fa-pen" style="color: black"></span> Roles</a>
                    </h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table width="900px" class="table table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>philip.chaney@gmail.com</td>
                                    <td>Manager</td>
                                    <td>Admin</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="" class="btn"><span class="fas fa-pen" style="color: black"></span></a>
                                        <a href="" class="btn"><span class="fas fa-trash" style="color: black"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>ms.greene@outlook.com</td>
                                    <td>Writer</td>
                                    <td>Staff</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="" class="btn"><span class="fas fa-pen" style="color: black"></span></a>
                                        <a href="" class="btn"><span class="fas fa-trash" style="color: black"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>mason_porter@gmail.com</td>
                                    <td>Contributor</td>
                                    <td>Staff</td>
                                    <td>Active</td>
                                    <td class="text-end">
                                        <a href="" class="btn"><span class="fas fa-pen" style="color: black"></span></a>
                                        <a href="" class="btn"><span class="fas fa-trash" style="color: black"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Minerva Hooper</td>
                                    <td>minerva.hooper@gmail.com</td>
                                    <td>Administrator</td>
                                    <td>Admin</td>
                                    <td>Disabled</td>
                                    <td class="text-end">
                                        <a href="" class="btn"><span class="fas fa-pen" style="color: black"></span></a>
                                        <a href="" class="btn"><span class="fas fa-trash" style="color: black"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "footer.php";
?>