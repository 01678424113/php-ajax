<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script
        src="http://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/css/style.css">
    <script src="style/js/book.js"></script>
</head>
<body>
<!--NAV-->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">PHP</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/php-ajax/">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/php-ajax/author.php">Author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/php-ajax/book.php">Book</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--Table-->
<div class="container mt-5">
    <div class="records-content table-hover table-bordered">

    </div>
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" id="add" data-target="#exampleModal" data-whatever="@mdo">Add</button>
</div>

<!--Modal Edit-->
<div class="modal modal-edit-book fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <table>
                        <tr>
                            <td><label><strong>Name :</strong></label></td>
                            <td><input type="text" name="name" id="edit-name" value="" disabled></td>
                        </tr>
                        <tr>
                            <td><label><strong>Category :</strong></label></td>
                            <td><input type="text" name="id_category" id="edit-id-category"  value=""></td>
                        </tr>
                        <tr>
                            <td><label><strong>Author :</strong></label></td>
                            <td><input type="text" name="id_author" id="edit-id-author" value="" disabled></td>
                        </tr>
                        <tr>
                            <td><label><strong>Published year :</strong></label></td>
                            <td><input type="text" name="published_year" id="edit-published-year" value=""></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit-btn">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End modal edit-->
<!--Modal Add-->
<div class="modal modal-add-book fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                <table>
                    <tr>
                        <td><label><strong>Name :</strong></label></td>
                        <td><input type="text" name="name" id="name" value="" ></td>
                    </tr>
                    <tr>
                        <td><label><strong>Category :</strong></label></td>
                        <td><input type="text" name="id_category" id="id-category"  value=""></td>
                    </tr>
                    <tr>
                        <td><label><strong>Author :</strong></label></td>
                        <td><input type="text" name="id_author" id="id-author" value="" ></td>
                    </tr>
                    <tr>
                        <td><label><strong>Published year :</strong></label></td>
                        <td><input type="text" name="published_year" id="published-year" value=""></td>
                    </tr>
                </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add-book">Add new</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End modal add-->
<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('.modal-add-book').modal('show');
        });
    });

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
</body>
</html>