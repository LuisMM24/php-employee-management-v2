<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Header
    require_once TEMPLATES . "header.php";
    ?>
    <title>Consult</title>
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light container-xl">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/logo.jpg" alt="" width="25">
            </a>
            <a class="navbar-brand" href="">Employees Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>employee">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Employee</a>
                    </li>
                </ul>
            </div>
            <a class="link-primary" href="./library/loginController.php?logout=1">Log out</a>
        </div>
    </nav>

    <!-- Employee details and update  -->
    <?php
    if (!isset($this->employee)) {
        $this->method = "createEmployee";
        $this->employee = [];
        $this->employee["first_name"] = "";
        $this->employee["last_name"] = "";
        $this->employee["email"] = "";
        $this->employee["city"] = "";
        $this->employee["state"] = "";
        $this->employee["postalCode"] = "";
        $this->employee["gender"] = "";
        $this->employee["streetAddress"] = "";
        $this->employee["age"] = "";
        $this->employee["phoneNumber"] = "";
    } else {
        $this->method = "updateEmployee/" . $this->employee['id'];
    }
    ?>
    <main class="container container-xl my-5">
        <div class="card">
            <div class="card-header">
                <h3>Employee details: <b><?= $this->employee["first_name"] . " " . $this->employee["last_name"] ?></b></h3>
            </div>
            <div class="card-body">
                <form action="<?= BASE_URL . 'employee/' . $this->method ?>" method="POST" enctype="multipart/form">
                    <div class="d-flex justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="first_name" value="<?= $this->employee["first_name"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $this->employee["email"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="<?= $this->employee["city"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" value="<?= $this->employee["state"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" name="postalCode" value="<?= $this->employee["postalCode"] ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" value="<?= $this->employee["last_name"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" value="<?= $this->employee["gender"] ?>" class="form-control" required>
                                    <option value="male">man</option>
                                    <option value="male">woman</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="text" name="streetAddress" value="<?= $this->employee["streetAddress"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" value="<?= $this->employee["age"] ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phoneNumber" value="<?= $this->employee["phoneNumber"] ?>" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?= BASE_URL ?>employee" class="btn btn-secondary mx-2">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <!-- Footer -->
    <?php
    include_once TEMPLATES . "/footer.php";
    ?>
</body>

</html>