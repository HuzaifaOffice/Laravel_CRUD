<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD TASK</title>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">
            <h3>CRUD LARAVEL</h3>
        </span>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <div class="container my-4">
        <form action="insertData" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01">Product name</label>
                    <input type="text" class="form-control" placeholder="Item name" name="P_name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault02">Price</label>
                    <input type="text" class="form-control" placeholder="Item price" name="P_price" required>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>


    <!-- table section -->
    <div class="container my-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item['id']}}</th>
                    <td>{{$item['product_name']}}</td>
                    <td>{{$item['product_price']}}</td>
                    <td>
                        <!-- update button -->
                        <button type="button" class="btn btn-outline-primary mx-2 btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</button>
                        <!-- delete button -->
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete</button>
                    </td>
                </tr>
                @endforeach
    </div>
    </tbody>
    </table>

    <!-- For Update Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="p-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">product_price:</label>
                            <input type="text" class="form-control" id="p-price">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- For Delete Modal-->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete Confirmed?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>