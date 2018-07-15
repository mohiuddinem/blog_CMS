
    <table class="table table-bordered table-responsive  table-hover">
        <thead>
            <tr>
                <td>Post id</td>
                <td>Autdor</td>
                <tdTitle></td>
                <td>Catagory</td>
                <td>Status</td> 
                <td>Images</td>
                <td>Tags</td>
                <td>Comments</td>
                <td>Date</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
        
            <?php 
                $query = "SELECT * FROM posts";
                $all_post= mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($all_post)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_catagory = $row['post_catagory_id'];
                    $post_status = $row['post_status'];
                    $post_images = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comments = $row['post_comment_count'];
                    $post_date = $row['post_date'];
            ?>

                    <tr>
                        
                        <td><?php echo $post_id; ?></td>
                        <td><?php echo $post_author; ?></td>
                        <td><?php echo $post_catagory; ?></td>
                        <td><?php echo $post_status; ?></td>
                        <td><?php echo "<img src='../images/$post_images' width='100'>"; ?></td>
                        <td><?php echo $post_tags; ?></td>
                        <td><?php echo $post_comments; ?></td>
                        <td><?php echo $post_date; ?></td>
                        <td><?php echo "<a href='post.php?delete={$post_id}'>Delete</a>";?></td>

                    </tr>
            <?php

                }
            ?>
        </tbody>
    </table>

    <?php
        if(isset($_GET['delete'])){
            $post_delete_id = $_GET['delete'];
            

        $query = "DELETE FROM posts WHERE post_id={$post_delete_id}";
            $delete_post  = mysqli_query($connection,$query);

            if(isset($delete_post)){
                header("Location:post.php");
            }
        }

       
    
    ?>