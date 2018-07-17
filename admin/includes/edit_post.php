
            <?php 

                if(isset($_GET['p_id'])){
                    $P_id = $_GET['p_id'];
                }


                $query = "SELECT * FROM posts WHERE post_id={$P_id} ";
                $the_post_by_id= mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($the_post_by_id)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_catagory_id = $row['post_catagory_id'];
                    $post_status = $row['post_status'];
                    $post_content = $row['post_content'];
                    $post_images = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comments = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                }
            ?>


<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="title">Post Catagory </label>
                
            <select class="form-control" name="post_catagory" id="post-catagory">
                <option value="">Select Catagory</option>
                <?php
                    $query = "SELECT * FROM catagories";
                    $select_catagories = mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_catagories)){
                        $catagory_list = $row['cat_title'];
                        echo "<option>$catagory_list</option>";
                    }

                
                ?>
            </select>
            
        </div>

        <div class="form-group">
            <label for="title">Post Author</label>
            <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
        </div>

        <div class="form-group">
            <label for="title">Post Status</label>
            <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="Post_status">
        </div>

        <div class="form-group">
            <label for="title">Post Image</label>
            <input type="file" class="form-control" name="image" >
            <img src="../images/<?php echo $post_images; ?>" alt="">
        </div>

        <div class="form-group">
            <label for="title">Post Tags</label>
            <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="Post_tags">
        </div>

        <div class="form-group">
            <label for="title">Post Content</label>
            <textarea type="text" class="form-control" name="post_content" cols="30" rows="10">
            <?php echo $post_content; ?>
            </textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="publishpost">
        </div>

        

    </form>