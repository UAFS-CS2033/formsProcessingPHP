<?php
    session_start();
    if(isset($_SESSION['names'])){
        $names=$_SESSION['names'];
    }

    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $name['first']=$firstname;
        $name['last']=$lastname;
        $names[]=$name;
        $_SESSION['names']=$names;
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 2033 | Show Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="uafs.png" width="5%" height="5%" class="d-inline-block align-top" alt="">
        CS 2033 Web Systems
    </a>
    </nav>

    <div class="container">
        <table class="table">
            <thead><tr><th>Last Name</th><th>First Name</th></tr></thead>
            <tbody>
                <?php
                    for($index=0;$index<count($names);$index++){
                        echo "<tr><td>".$names[$index]['last']."</td><td>".$names[$index]['first']."</td></tr>";
                    }
                ?>
            </tbody>        
        </table>
    </div>

    <div class="container">
        <h3>Add Name</h3>
        <?php echo $lastname.", ".$firstname; ?>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname">       
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text"  class="form-control" name="lastname" id="lastname">  
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>