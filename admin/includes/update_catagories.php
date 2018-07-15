<form action="" method="post">
                                <div class="form-group">
                                    <label for="">Update catagory</label><br>

                                    <?php
                                        if(isset($_GET['edit'])){

                                            $cat_id = $_GET['edit'];

                                            $query = "SELECT * FROM catagories WHERE cat_id={$cat_id}";
                                            $select_catagories_id = mysqli_query($connection,$query);

                                            while($row = mysqli_fetch_assoc($select_catagories_id)){
                                                $cat_id =$row['cat_id'];
                                                $cat_title =$row['cat_title'];
                                    ?>  

                                              <input type="text" value=' <?php if(isset($cat_title)){echo $cat_title;} ?>' class="from-control" name="cat_title">

                                    <?php
                                            }
                                        }
                                    ?>
                                    <p><?php 
                                 
                                 
                                     ?></p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="update">Update Catagory</button>
                                </div>
                                        
                                        <?php
                                            if(isset($_POST['update'])){
                                                $the_cat_title = $_POST['cat_title'];

                                                $query = "UPDATE catagories SET cat_title='{$the_cat_title}' WHERE cat_id={$cat_id} ";
                                                $query_update = mysqli_query($connection,$query);
                                            }
                                        ?>

                            </form>