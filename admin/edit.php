<?php
$id_ad = $_GET["id_ad"];
$sql = "SELECT * FROM vp_users WHERE id = '$id_ad'";
$query = mysqli_query($conn, $sql);
?>
<?php
if (isset($_POST["submit"])) {
    $full = $_POST["full"];
    $pass = $_POST["pass"];
    $mail = $_POST["mail"];
    $level = $_POST["level"];
    if (isset($full) && isset($pass) && isset($mail) && isset($level)) {
        $sql = "UPDATE `vp_users` SET email ='$mail',password='$pass',level='$level',name='$full' WHERE id = '$id_ad'";
        $query = mysqli_query($conn, $sql);
        header('location:home.php?lay_uot=admin');
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
        <div class="col-sm-6">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <form method="post">
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="full" class="form-control" placeholder="Fullname" value=<?php echo $row["name"] ?> required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password" value=<?php echo $row["password"] ?> required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="mail" class="form-control" placeholder="Email" value=<?php echo $row["email"] ?> required />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="1" <?php
                                                if ($row["level"] == 1) {
                                                    echo 'selected ="selected"';
                                                }
                                                ?>>Admin</option>
                            <option value="2" <?php
                                                if ($row["level"] == 2) {
                                                    echo 'selected ="selected"';
                                                }
                                                ?>>Mod</option>
                            <option value="3" <?php
                                                if ($row["level"] == 3) {
                                                    echo 'selected ="selected"';
                                                }
                                                ?>>User</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>