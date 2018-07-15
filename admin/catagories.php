<?php

 include "includes/admin_header.php";
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include "includes/admin_navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to Admin
                        </h1>
                        <div class="col-md-6">
                            <?php
                            $msg="";
                                if(isset($_POST['submit'])){
                                        $cat_title = $_POST['cat_title'];

                                        if($cat_title == ""){
                                            $msg = "Please Insert Data First to insert data";
                                        }else{
                                            $query = "INSERT INTO catagories(cat_title) VALUES ('$cat_title')";
                                            $create_catagories_query = mysqli_query($connection,$query);
                                            if(!$create_catagories_query){
                                                $msg = "Data Not Inserted";
                                            }else{
                                                $msg = "Data Inserted";
                                                $cat_title="";
                                            }
                                        }
                                }
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Add data to catagory</label><br>
                                    <input type="text" class="from-control" name="cat_title">
                                    <p><?php 
                                 
                                    echo $msg;
                                     ?></p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="submit">insert Into Catagory</button>
                                </div>
                            </form>
                            <hr>

                            <?php
                                if(isset($_GET['edit'])){
                                    include "includes/update_catagories.php";
                                }

                            ?>

                            


                        </div> <!--  add catagory form -->

                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Catagory</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM catagories";
                                        $all_catagory = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($all_catagory)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                            echo '<tr>';
                                                echo "<td>{$cat_id}</td>";
                                                echo "<td>{$cat_title}</td>";
                                                echo "<td><a href='catagories.php?delete={$cat_id}'>Delete</a></td>";
                                                echo "<td><a href='catagories.php?edit={$cat_id}'>Edit</a></td>";
                                            echo '</tr>';
                                        }
                                    ?>


                                    <?php
                                        if(isset($_GET['delete'])){
                                            $the_cat_id=$_GET['delete'];
                                           
                                            $query = "DELETE FROM catagories WHERE cat_id='$the_cat_id'";
                                            $delete_result = mysqli_query($connection,$query);
                                            header ("Location: catagories.php");
                                            // if(isset($delete_result)){
                                                
                                            // }

                                        }
                                    
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
