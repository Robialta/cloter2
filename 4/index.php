<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tes Dumbways</title>
</head>
<body>
<?php 
include 'connection.php';
?>
    <section>
        <div class="container">
            <div class="new-user">
                <form method="POST">
                    <div class="row p-2">
                        <div class="col">
                            <input required type="text" name="photo" class="form-control" placeholder="Attache">
                        </div>
                        <div class="col-sm-6">
                            <input required type="text" name="name" class="form-control" placeholder="Programer name">
                        </div>
                        <div class="col">
                            <button type="submit" name="add_user" class="btn btn-danger btn-block">Add programer</button>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['add_user'])){
                        $name = $_POST['name'];
                        $photo = $_POST['photo'];
                        mysqli_query($conn, "INSERT INTO user_tb VALUES ('', '$name', '$photo')");
                        if (mysqli_affected_rows($conn) > 0){
                            echo '<script language="javascript">alert("Successfully added");</script>';
                        }else{
                            echo '<script language="javascript">alert("Failed to add");</script>';
                        }
                    };
                ?>
            </div>  

            <?php
                $result = mysqli_query($conn, "SELECT * FROM user_tb");
                while($row = mysqli_fetch_assoc($result)){
            ?>

            <div class="list-user">
                <div class="row p-2">
                    <div class="col">
                        <img src="<?php echo $row['photo'] ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-6">                           
                        <div class="row detail-user">
                            <div class="col">
                                <div class="row">
                                    <h2><?php echo $row['name']?></h2>
                                </div>                              
                                <div class="row">
                                <?php
                                    $id = $row['user_id'];
                                    $no = 0;
                                    $skill_result = mysqli_query($conn, "SELECT * FROM skill_tb WHERE skill_tb.user_id=$id");
                                    while($row_skill = mysqli_fetch_assoc($skill_result)){
                                        $no++;
                                ?>
                                    <span class="m-1 text-danger"> <h6> <?php echo $row_skill['name']?></h6></span>
                                    <?php } ?>
                                </div>
                                </div>
                                
                            </div>
                            <form method="post">
                            <div class="row input-skil-user">
                                <input required name="skill_name" type="text" class="form-control" placeholder="Skill">
                                <input name="id" type="hidden" value="<?php echo $row['user_id'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <a class="btn btn-danger btn-block mx-3 my-1" href="delete.php?id=<?php echo $row['user_id']?>">Delete programer</a>
                            </div>
                        <div class="row">
                            <a class="btn btn-danger btn-block  mx-3 my-1" href="">Edit programer</a>
                        </div>
                        <div class="row">
                            <button type="submit" name="add_skill" class="btn btn-danger btn-block  mx-3 my-1">Add skill</button>
                        </div>
                        </div>
                        </form>

                       
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php
                            if (isset($_POST['add_skill'])){
                                $id = $_POST['id'];
                                $skill_name = $_POST['skill_name'];
                                
                                if (mysqli_query($conn, "INSERT INTO skill_tb VALUES ('', '$skill_name', '$id')")){
                                    echo '<script language="javascript">alert("Succesfully added");</script>';
                                    echo '<script language="javascript">window.location.href = "index.php";</script>';
                                }else{
                                    echo '<script language="javascript">alert("'.mysqli_error($conn).'");</script>';
                                }
                                
                            }
                        ?>
            
        </div>
    </section>
</body>
</html>