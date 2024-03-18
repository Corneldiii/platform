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

    <style>
        .bungkus {
            border-radius: 10px;
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            backdrop-filter: blur(50px);
            box-shadow: rgb(107, 84, 84) 20px 20px 70px;
            width: 500px;
            height: 80px;
        }

        #daftar {
            padding: 5px;
            border-radius: 10px;
            background-color: blueviolet;
            font-size: 30px;
            width: 350px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form{
            display: flex;

        }

        #status {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #hapus {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>


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
                    $sql = "select id_list,list,status from daftarlist where id_user = '$ID'";

                    $result = $db->Query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <div class="bungkus" id="bungkus_<?php echo $row["id_list"]?>">
                                <?php
                                    if($row['status'] == 'simpan'){
                                        ?>
                                            <div id="daftar"><?php echo $row["list"]; ?></div>
                                        <?php
                                    }else if($row['status'] == 'Selesai'){
                                        ?>
                                            <div id="daftar"><del><?php echo $row["list"]; ?></del></div>
                                        <?php
                                    }
                                ?>
                                <form action="main.php" method="post">
                                    <input type="hidden" name="listdel" value="<?php echo $row['id_list']; ?>">
                                    <button type="submit" class="btn btn-primary ml-2" name="selesai" id="status">Selesai</button>
                                    <button type="submit" class="btn btn-primary ml-2" name="haps" id="hapus">Hapus</button>
                                </form>
                            </div>
                <?php
                        }
                    }
                }
                if (isset($_POST['haps'])) {
                    $listDel = $_POST['listdel'];

                    $sql = "DELETE FROM daftarlist WHERE id_list = '$listDel'";
                    $result = $db->Query($sql);
                }

                if(isset($_POST['selesai'])){
                    $listDel = $_POST['listdel'];

                    $sql = "UPDATE daftarlist SET status = 'Selesai' WHERE id_list = '$listDel'";
                    $result = $db->Query($sql);

                }

                ?>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>