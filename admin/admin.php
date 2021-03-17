<?php
$sql = "SELECT * FROM   vp_users";
$query = mysqli_query($conn, $sql);
?>
<?php
if (isset($_GET["page_lay"])) {
    $page = $_GET["page_lay"];
} else {
    $page = 1;
}
$in = 3;
$dem = $page * $in - $in;
$sql = "SELECT * FROM vp_users ORDER BY id ASC LIMIT $dem,$in";
$query = mysqli_query($conn, $sql);
$totalrow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM   vp_users"));
$list = "";
$tatalpage = ceil($totalrow / $in);
for ($i = 1; $i <= $tatalpage; $i++) {
    if ($i == $page) {
        $list .= '<li class="active"><a href="home.php?lay_uot=admin&page_lay=' . $i . '">' . $i . '</a></li>';
    } else {
        $list .= '  <li><a href="home.php?lay_uot=admin&page_lay=' . $i . '">' . $i . '</a></li>';
    }
}




?>



<div class="container">
    <div id="navbar" class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Add user</a></li>
                    </ul>
                    <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="#">Logout</a></p>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <div class="alert alert-success">Added user success!</div>
            <a href="?lay_uot=add" class="btn btn-primary">Thêm thành viên</a>
            <table class="table table-striped">
                <tr id="tbl-first-row">
                    <td width="5%">#</td>
                    <td width="30%">Name</td>
                    <td width="30%">Email</td>
                    <td width="25%">Password</td>
                    <td width="5%">Level</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>

                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["level"] ?></td>
                        <td><a href="home.php?lay_uot=edit&id_ad=<?php echo $row["id"]  ?>">Edit</a></td>
                        <td><a href="xoaad.php?id_ad=<?php echo $row["id"] ?>">Delete</a></td>

                    </tr>
                <?php
                }
                ?>




            </table>
            <div aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                    echo $list;

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>