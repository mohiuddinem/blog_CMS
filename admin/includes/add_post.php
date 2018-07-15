
    <?php
        if(isset($_POST['create_post'])){

            
            $post_title = $_POST['title'];
            $post_author = $_POST['post_author'];
            $post_catagory_id = $_POST['Post_catagory_id'];
            $post_status = $_POST['Post_status'];

            $post_image = $_FILES["image"]["name"];
            $post_images_tmp = $_FILES["image"]["tmp_name"];

            $post_tags = $_POST['Post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
            $post_comments_countt = 4;

            move_uploaded_file($post_images_tmp, "../images/$post_image");

            $query = "INSERT INTO posts(post_catagory_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)" ;
            
            $query.= "VALUES('{$post_catagory_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comments_countt}','{$post_status}') ";

            $create_post_query = mysqli_query($connection,$query);
            
        }
    
    
    ?>
    
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="title">Post Catagory Id</label>
            <input type="text" class="form-control" name="Post_catagory_id">
        </div>

        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="post_author">
        </div>

        <div class="form-group">
            <label for="title">Post Status</label>
            <input type="text" class="form-control" name="Post_status">
        </div>

        <div class="form-group">
            <label for="title">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" class="form-control" name="Post_tags">
        </div>

        <div class="form-group">
            <label for="title">Post Content</label>
            <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="publishpost">
        </div>

        

    </form>