<!-- <?php
        //require_once "./src/library/loginManager.php";
        //$alert = checkSession();
        ?> -->
<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(TEMPLATES . "header.php") ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/login.css">
    <title>Employee Management</title>

</head>

<body>

    <main class="form-signin">
        <form action="./src/library/loginController.php?login=1" method="POST">
            <img src="./assets/img/assembler.png" class="w-100 my-5" alt="Assembler School">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input value="admin@assemblerschool.com" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input value="123456" name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r">
                <label for="floatingPassword">Password</label>
            </div>
            <!-- <?= ($alert) ? "<div class='alert alert-$alert[type] role='alert'>$alert[text]</div>" : "" ?> -->
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
</body>

</html>