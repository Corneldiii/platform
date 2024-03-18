<?php
include "Server/serverDB.php";

session_start();
if (isset($_SESSION['user_id'])) {
    $ID = $_SESSION['user_id'];
    echo $ID;
}

if (isset($_POST['submit'])) {
    $textlist = $_POST['textList'];

    if ($textlist != "") {
        $sql = "INSERT INTO daftarlist (list,status,id_user) VALUES
        ('$textlist','simpan',$ID)";

        $result = $db->Query($sql);
    } else {
?>
        <script>
            alert("Isi dulu dong");
        </script>
<?php
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    

    <title>Hello, world!</title>
</head>

<body>
    <section id='todo-page'>
        <div id="page">
            <div id="listpg">
                <h1 class="text-center">To Do List</h1>
                <form action="main.php" method="post">
                    <div class="input-group mb-3 mt-5">
                        <input type="text" class="form-control" placeholder="Masukan To Do List" name="textList">
                        <button type="submit" class="btn btn-primary ml-2" name="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="listdaftar">
                <?php
                if (isset($ID)) {
                    $sql = "select list,status from daftarlist where id_user = '$ID'";

                    $result = $db->Query($sql);

                    if ($result->num_rows > 0) {
                        for ($i=0; $i < 7; $i++) { 
                            ?>
                                <div id="daftar">cek</div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>







    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>