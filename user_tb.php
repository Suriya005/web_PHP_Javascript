<?php
include 'header.php';
include 'pgconnect.php';

$fname = 'สุริยา';
$lname = 'พุฒดวง';

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>table</h1>
                </div>
                <div class="col-sm-6">
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>user_id</th>
                                <th>password</th>
                                <th>user_status</th>
                                <th>title_name</th>
                                <th>fname</th>
                                <th>lname</th>
                                <th>sex</th>
                                <th>birthday</th>
                                <th>major_id</th>
                                <!-- <th>Edit</th> -->
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $query = 'SELECT * FROM users_tb';
                        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                        ?>
                        <tbody>
                            <?php
                            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                foreach ($line as $col_value) {
                                    echo "<td>$col_value</td>";
                                }
                                // echo '<td><button id="edit" value="' . $line['user_id'] . '" onclick="edit()" type="button" class="btn btn-block btn-warning" >Edit</button> </td>';
                                echo '<td><button id="delete" value="' . $line['user_id'] . '" onclick="delete_id()" type="button" class="btn btn-block btn-danger" >Delete </button></td>';
                                echo "</tr>";
                            }
                            ?>

                            <tr>
                                <form action="user_tb.php" method="post">
                                    <?php
                                    // if (isset($_POST['insert'])) {
                                        $user_id = $_REQUEST['user_id'];
                                        $password = $_REQUEST['password'];
                                        $user_status = $_REQUEST['user_status'];
                                        $title_name = $_REQUEST['title_name'];
                                        $fname = $_REQUEST['fname'];
                                        $lname = $_REQUEST['lname'];
                                        $sex = $_REQUEST['sex'];
                                        $birthday = $_REQUEST['birthday'];
                                        $major_id = $_REQUEST['major_id'];
                                        $sql_insert = `INSERT INTO public.users_tb(user_id, password, user_status, title_name, fname, lname, sex, birthday, major_id) VALUES ('$user_id', '$password', '$user_status', '$title_name', '$fname', '$lname', '$sex','$birthday', $major_id);`;
                                        pg_query($conn, $sql_insert);
                                    // }
                                    ?>
                                    <td><input class="form-control" type="text" placeholder="user_id" name="user_id" id="user_id"></td>
                                    <td><input class="form-control" type="text" placeholder="password" name="password" id="password"></td>
                                    <td><input class="form-control" type="text" placeholder="user_status" name="user_status" id="user_status"></td>
                                    <td><input class="form-control" type="text" placeholder="title_name" name="title_name" id="title_name"></td>
                                    <td><input class="form-control" type="text" placeholder="fname" name="fname" id="fname"></td>
                                    <td><input class="form-control" type="text" placeholder="lname" name="lname" id="lname"></td>
                                    <td><input class="form-control" type="text" placeholder="sex" name="sex" id="sex"></td>
                                    <td><input class="form-control" type="text" placeholder="birthday" name="birthday" id="birthday"></td>
                                    <td><input class="form-control" type="text" placeholder="major_id" name="major_id" id="major_id"></td>
                                    <td><button name="insert" id="insert" type="submit" class="btn btn-block btn-success">Inset </button></td>
                                </form>
                            </tr>


                            <tr>
                                <form action="user_tb.php" method="post">
                                    <td><input class="form-control" type="text" placeholder="user_id" name="user_id"></td>
                                    <td><input class="form-control" type="text" placeholder="password" name="password"></td>
                                    <td><input class="form-control" type="text" placeholder="user_status" name="user_status"></td>
                                    <td><input class="form-control" type="text" placeholder="title_name" name="title_name"></td>
                                    <td><input class="form-control" type="text" placeholder="fname" name="fname"></td>
                                    <td><input class="form-control" type="text" placeholder="lname" name="lname"></td>
                                    <td><input class="form-control" type="text" placeholder="sex" name="sex"></td>
                                    <td><input class="form-control" type="text" placeholder="birthday" name="birthday"></td>
                                    <td><input class="form-control" type="text" placeholder="major_id" name="major_id"></td>
                                    <td><button name="update" id="update" type="submit" class="btn btn-block btn-success">Update </button></td>
                                </form>
                            </tr>

                        </tbody>
                    </table>

                    <div id="query" class="query"></div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


<script>
    window.onload = () => {
        document.cookie = "user_id=1";
    }

    // insert_data = () => {
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {

    //             let data = document.getElementById('edit').value
    //             document.cookie = `user_id=${data}`;
    //             // console.log(data)
    //             document.getElementById("query").innerHTML = `<?php
    //                                                             $id = $_COOKIE["user_id"];
    //                                                             $query_edit = "UPDATE users_tb SET fname='$fname',lname='$lname' WHERE user_id='$id';";
    //                                                             pg_query($conn, $query_edit);
    //                                                             // echo 'success';
    //                                                             ?>`;
    //             Swal.fire(
    //                 'Deleted!',
    //                 'Your file has been deleted.',
    //                 'success'
    //             )
    //             location.reload();
    //         }
    //     })
    // }

    delete_id = () => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            timer: 3000,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let data = document.getElementById('delete').value
                document.cookie = `user_id=${data}`;
                // console.log(data)
                document.getElementById("query").innerHTML = `<?php
                                                                $id = $_COOKIE["user_id"];
                                                                $query_delete = "DELETE FROM public.users_tb WHERE user_id='$id';";
                                                                pg_query($conn, $query_delete);
                                                                ?>`;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                location.reload();
            }
        })
    }
</script>





<?php
pg_close($dbconn);
include 'footer.php';
?>