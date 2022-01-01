<?php
    //check if user coming from HTTP post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $hashedPass = sha1($password);
        
        //check if user exist in database

        $stmt = $db->prepare("  SELECT
                                    user_id,email, password 
                                FROM
                                    user
                                WHERE
                                    email = ?
                                AND
                                    password = ?
                                AND
                                    user_role_id = 1
                                LIMIT 1");
        $stmt->execute(array($email,$hashedPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        // if count > 0 this mean the database contain record about this username
        if ($count > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['user_id'];
            header('Location: home.php');
            exit();
        }
        
    }
?>
        <!-- login form start -->
        <main id="logForm" class="form-signin hide">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-danger" type="submit">Sign in</button>
            </form>
        </main>
            <!-- login form end -->