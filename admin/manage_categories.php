<?php
require('top.inc.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];
    }else{
        header('location:categories.php');
        die();
    }
}

if(isset($_POST['submit'])){
    $categories=get_safe_value($con,$_POST['categories']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "path_to_your_image_directory".$image);
    
    $res=mysqli_query($con,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){
            
            }else{
                $msg="Categories already exist";
            }
        }else{
            $msg="Categories already exist";
        }
    }
    
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update categories set categories='$categories', image='$image' where id='$id'");
        }else{
            mysqli_query($con,"insert into categories(categories, image, status) values('$categories', '$image', '1')");
        }
        header('location:categories.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class="form-control-label">Categories</label>
                                <input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Category Image</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>
