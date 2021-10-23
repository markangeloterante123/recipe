
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Data - Codeigniter 4 Crud Application</title>
    <!--  -->
</head>
<body>
        <div class="container">
            <div class="blog">
                <img src="<?php echo base_url('uploads/'.$user_data['recipeImg']);?>" width="100%" height="300px">
                
                <h3><?= $user_data['recipeName'] ?></h3>
                <h6><?= $user_data['category'] ?></h6>

                <h5>Ingredients</h5>
                <p><?= $user_data['recipeIngridients'] ?></p>

                <h5>Cooking Instructions</h5>
                <p><?= $user_data['recipeDirection'] ?></p>
                <span>Time of Cooking preperation : <?= $user_data['recipeTime'] ?></span>
                <h3>Date Posted: <?= $user_data['recipeDate'] ?></h3>
                <a href="<?php echo base_url('home/fetch_single_data/'.$user_data["id"]); ?>">Edit</a>
                <?php echo '<button type="button" onclick="delete_data('.$user_data["id"].')" class="btn btn-danger btn-sm">Delete</button>'?>
            </div>
        </div>
</body>
</html>

<script>
function delete_data(id)
{
    if(confirm("Are you sure you want to remove it?"))
    {
        window.location.href="<?php echo base_url(); ?>/home/delete/"+id;
    }
    return false;
}
</script>