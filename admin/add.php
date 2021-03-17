<?php
if (isset($_POST["submit"])) {
    $full = $_POST["full"];
    $pass = $_POST["pass"];
    $mail = $_POST["mail"];
    $leve = $_POST["level"];
    if (isset($mail)  && isset($pass) && isset($leve) && isset($full)) {
        $sql = "INSERT INTO vp_users(email,password,level,name) VALUES ('$mail','$pass','$leve','$full')";
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
            <form method="post">
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Mod</option>
                        <option value="3" selected="selected">User</option>
                    </select>
                </div>
                <button type="submit" name="submit" value="Thêm mới" class="btn btn-primary">Thêm
            </form>
        </div>
    </div>