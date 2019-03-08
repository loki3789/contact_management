<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/assets/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Contacts Manager</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Contacts Manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home 
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="new.php" data-toggle="modal" data-target="#CreateContact">New Contact</a>

                            <div class="modal fade" id="CreateContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Contact :</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="public/contactsController/processRequest" method="POST">
                                                <table class="d-flex justify-content-center">
                                                    <tr>
                                                        <td><label>Name : </label></td>
                                                        <td class="form-group"><input class='form-control' name="name" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>E-mail : </label></td>
                                                        <td class="form-group"><input class='form-control' name="email" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Phone Number : </label></td>
                                                        <td class="form-group"><input class='form-control' name="phonenumber" type="text"></td>
                                                    </tr>	
                                                    <tr>
                                                        <td><label>Birthdate : </label></td>
                                                        <td class="form-group"><input class='form-control' name="birthdate" type="text"></td>
                                                    </tr>
                                                    			
                                                </table>
                                                <br>
                                                <input class='btn btn-primary' type="submit" name="add" value="Add">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <form method="POST" class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" name="name" placeholder="Search By Name" value="<?= $requested_name ?>">
                    </form>
                </div>
            </nav>
        </header>


        <!-- Page Content -->
        <div class="container">
            <!-- Page Heading -->
            <h5 class="my-4 text-center"> Contacts Manager</h5>

            <div class="row">
                <?php foreach ($contacts as $contact): ?>
                    <div class="col-lg-4 col-sm-6 portfolio-item Card">
                        <div class="card h-100 text-center">
                            <a href="#"><img class="user" src="public\assets\img\user.png" alt="user"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#"><?= $contact['name'] ?> </a>
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Email : <strong><?= $contact['email'] ?></strong>
                                    </li>
                                    <li class="list-group-item">
                                        Phone Number : <strong><?= $contact['phonenumber'] ?></strong>
                                    </li>
                                    <li class="list-group-item">
                                        Birthdate : <strong><?= $contact['birthdate'] ?></strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer actions">
                                <h4>Actions</h4>
                                <button class="btn btn-warning" type="button" name="edit" data-toggle="modal" data-target="#EditModal<?= $contact['id'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" type="button" name="delete" data-toggle="modal" data-target="#DeleteModal<?= $contact['id'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="EditModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Contact : <strong><?= $contact['name'] ?> <?= $contact['email'] ?></strong> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="public/contactsController/processRequest" method="POST">
                                                <table class="d-flex justify-content-center">
                                                    <input type="text" name="id" value="<?= $contact['id'] ?>" hidden="hidden">
                                                    <tr>
                                                        <td><label>Name : </label></td>
                                                        <td class="form-group">
                                                            <input class='form-control' name="name" type="text" value="<?= $contact['name'] ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Email : </label></td>
                                                        <td class="form-group">
                                                            <input class='form-control' name="email" type="text" value="<?= $contact['email'] ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Phone Number : </label></td>
                                                        <td class="form-group">
                                                            <input class='form-control' name="phonenumber" type="text" value="<?= $contact['phonenumber'] ?>">
                                                        </td>
                                                    </tr>	
                                                    <tr>
                                                        <td><label>Birthdate : </label></td>
                                                        <td class="form-group">
                                                            <input class='form-control' name="birthdate" type="text" value="<?= $contact['birthdate'] ?>">
                                                        </td>
                                                    </tr>
                                                    			
                                                </table>
                                                <br>
                                                <input class='btn btn-primary' type="submit" name="modify" value="Save Changes">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="DeleteModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Contact : <strong><?= $contact['name'] ?> <?= $contact['email'] ?></strong> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="public/contactsController/processRequest" method="POST">
                                                <input type="text" name="id" value="<?= $contact['id'] ?>" hidden="hidden">
                                                <p>Do you want to delete this contact ?</p>
                                                <br>
                                                <input class="form-control btn btn-danger" type="Submit" name="delete" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- /.row -->
            <br><br><br>

            <footer class="page-footer font-small blue pt-4">
                <!-- Pagination -->
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="index.php?p=<?= $paginate - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php foreach (range(1, $pages) as $value): ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?p=<?= $value ?>"><?= $value ?></a>
                        </li>
                    <?php endforeach ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?p=<?= $paginate + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </footer>
        </div>
        <!-- /.container -->

        <script type="text/javascript" src="public/assets/js/jquery.js"></script>
        <script type="text/javascript" src="public/assets/js/popper.js"></script>
        <script type="text/javascript" src="public/assets/js/bootstrap.min.js"></script>
    </body>
</html>