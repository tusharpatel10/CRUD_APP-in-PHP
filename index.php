<?php

$insert = false;
$update = false;
$delete = false;

// Connection to database
$serverName = "localhost:3308";
$userName = "root";
$password = "";
$db = "practical_db";

mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($serverName, $userName, $password, $db);
} catch (Exception $ex) {
    echo "Connection Failed" . $ex->getMessage();
}


/* This is DELETE php Script */
if (isset($_GET['delete'])) {
    $Sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `inotes` WHERE `inotes`.`Sr. no` = $Sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // The Update script
    if (isset($_POST['snoEdit'])) {
        // echo "Edit";
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descEdit'];

        $sql = "UPDATE `inotes` SET `title` = '$title', `description` = '$description' WHERE `inotes`.`Sr. no` = $sno";
        $result = mysqli_query($conn, $sql);
        $update = true;
    } else {


        // The insertion script
        $title = $_POST['title'];
        $description = $_POST['description'];

        // echo "Successfull";

        $sql = "INSERT INTO `inotes` (`Title`, `Description`, `Timestamp`) VALUES ('$title', '$description', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "The Record was not Inserted Successfully because of this error -->" . mysqli_error($conn);
        }
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <title>CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!--Add datatable css cdn file-->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


    <!--Add datatable jquery cdn file-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



</head>

<body>

    <!-- Edit Modal -->
    <!-- Button trigger modal -->

    <!-- Edit Form Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModal">
                        Edit this note
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#editModal">
                    </button>
                </div>

                <!-- Modal Updation -->
                <form action="index.php" method="post">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="hidden" name="snoEdit" id="snoEdit" />
                            <label for="title">Note Title</label>
                            <input type="text" class="form-control" name="titleEdit" id="titleEdit" aria-describedby="emailHelp" placeholder="" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="decs">Note Description</label>
                            <textarea class="form-control" name="descEdit" id="descEdit" rows="3" aria-describedby="emailHelp" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="new-php-logo.svg" height="50px"></a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="nav navbar-nav">

                    <ul class="navbar-nav me-5 mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">Home
                                <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">About
                                <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">Contact us
                                <span class="visually-hidden">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="container my-4">
        <h2 class="text-center">Add a Note to iNotes</h2>

        <?php
        if ($insert) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> &nbsp Your Note has been inserted Successfully.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        }
        ?>
        <?php
        if ($delete) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Deleted !</strong> &nbsp Your Note has been Deleted Successfully.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
        }
        ?>
        <?php
        if ($update) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> &nbsp Your Note has been updated Successfully.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
        } ?>


        <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input
                    type="text"
                    class="form-control"
                    name="title"
                    id="title"
                    aria-describedby="emailHelp"
                    placeholder="" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Note Description</label>
                <textarea
                    class="form-control"
                    name="description"
                    id="description"
                    aria-describedby="emailHelp"
                    placeholder="" /></textarea>
            </div>
            <button class="btn btn-success">Add Notes</button>

        </form>
    </div>
    <hr>

    <div class="container my-5">
        <table id="myTable" class="table table-center" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Sr. No</th>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Decription</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Start php script -->
                <?php
                $sql = "SELECT * FROM `inotes`";
                $result = mysqli_query($conn, $sql);
                $no = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    // echo var_dump($row);
                    $no = $no + 1;
                    echo "<tr>
                    <th scope='row' class='text-center'>" . $no . "</th>
                    <td class='text-center'>" . $row['Title'] . "</td>
                    <td class='text-center'>" . $row['Description'] . "</td>
                    <td class='text-center'><button class='edit btn btn-sm btn-primary' id=" . $row['Sr. no'] . ">Edit</button><button class='delete btn btn-sm btn-danger ms-2' id=d" . $row['Sr. no'] . ">Delete</button></td>
                    </tr>";
                }


                ?>

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit");
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id);

                $('#editModal').modal('toggle');

            });
        });


        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                Sno = e.target.id.substr(1, );

                if (confirm("Are you sure you want to Delete this Note!")) {
                    console.log("Yes");
                    window.location = `index.php?delete=${Sno}`;
                    //TODO: Create a form and Use post request to submit a form
                } else {
                    console.log("No");
                }

            });
        });
    </script>

</body>

</html>