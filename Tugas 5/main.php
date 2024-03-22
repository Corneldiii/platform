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

        form {
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

        #logout {
            cursor: pointer;
            color: white;
            background-color: black;
            width: 30px;
            height: 30px;
            padding: 5px;
        }

        #log {
            display: flex;
            justify-content: end;
        }
    </style>


    <title>Hello, world!</title>
</head>

<body>
    <section id='todo-page'>
        <div id="page">
            <div id="listpg">
                <div id="log">
                    <button id="logbut"><svg id="logout" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                        </svg></button>
                </div>

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
                            <div class="bungkus" id="bungkus_<?php echo $row["id_list"] ?>">
                                <?php
                                if ($row['status'] == 'simpan') {
                                ?>
                                    <div id="daftar"><?php echo $row["list"]; ?></div>
                                    <form action="main.php" method="post">
                                        <input type="hidden" name="listdel" value="<?php echo $row['id_list']; ?>">
                                        <button type="submit" class="btn btn-primary ml-2" name="selesai" id="status">Selesai</button>
                                        <button type="submit" class="btn btn-primary ml-2" name="haps" id="hapus">Hapus</button>
                                    </form>
                                <?php
                                } else if ($row['status'] == 'Selesai') {
                                ?>
                                    <div id="daftar"><del><?php echo $row["list"]; ?></del></div>
                                    <form action="main.php" method="post">
                                        <input type="hidden" name="listdel" value="<?php echo $row['id_list']; ?>">
                                        <button type="submit" class="btn btn-primary ml-2" name="haps" id="hapus">Hapus</button>
                                    </form>
                                <?php
                                }
                                ?>

                            </div>
                <?php
                        }
                    }
                }
                if (isset($_POST['haps'])) {
                    $listDel = $_POST['listdel'];

                    $sql = "DELETE FROM daftarlist WHERE id_list = '$listDel'";
                    $result = $db->Query($sql);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }

                if (isset($_POST['selesai'])) {
                    $listDel = $_POST['listdel'];

                    $sql = "UPDATE daftarlist SET status = 'Selesai' WHERE id_list = '$listDel'";
                    $result = $db->Query($sql);

                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
                ?>
            </div>
        </div>
    </section>


    <!-- <script >
        var cek =document.getElementById("logbut");
        cek.addEventListener('click',function () {
           console.log("cek"); 
           window.location.href = "index.php";
        });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>