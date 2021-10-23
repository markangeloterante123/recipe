
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
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
        <h2 class="text-center mt-4 mb-4">Edit Data - Codeigniter 4 Crud Application</h2>
        
        <div class="card">
            <div class="card-header">Edit Data</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('home/edit_validation'); ?>">

                    <div class="form-group">
                        <label>RECIPE NAME</label>
                        <input type="text" name="recipeName" class="form-control" value="<?php echo $user_data['recipeName']; ?>" />
                        <?php
                        if($validation->getError('recipeName'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('recipeName')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>CATEGORY</label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <option value="Appitizer"<?php if($user_data['category'] == 'Appitizer') echo 'selected'; ?>>Appetizer</option>
                            <option value="Soup"<?php if($user_data['category'] == 'Soup') echo 'selected'; ?>>Soup</option>
                            <option value="Main Dish"<?php if($user_data['category'] == 'Main Dish') echo 'selected'; ?>>Main Dish</option>
                            <option value="Dessert"<?php if($user_data['category'] == 'Dessert') echo 'selected'; ?>>Desert</option>
                        </select>

                        <?php

                        if($validation->getError('category'))
                        {
                            echo '<div class="alert alert-danger mt-2">
                            '.$validation->getError("category").'
                            </div>';
                        }

                        ?>
                    </div>

                    <div class="form-group">
                        <label>INGRIDIENTS</label>
                       <!-- <input type="text" name="recipeIngridients" class="form-control" value="<?php echo $user_data['recipeIngridients']; ?>" /> -->
                        <textarea name="recipeIngridients" id="recipeIngridients" value="<?php echo $user_data['recipeIngridients']; ?>" class="form-control" cols="30" rows="3"></textarea>
                        <?php
                        if($validation->getError('recipeIngridients'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('recipeIngridients').'</div>';
                        }
                        ?>
                    </div>


                    <div class="form-group">
                        <label>COOKING DIRECTION</label>
                        <!-- <input type="text" name="recipeDirection" class="form-control" value="<?php echo $user_data['recipeDirection']; ?>"> -->
                        <textarea name="recipeDirection" id="recipeDirection" class="form-control" cols="30" value="<?php echo $user_data['recipeDirection']; ?>" rows="5"></textarea>
                        <!-- Error -->
                        <?php 
                        if($validation->getError('recipeDirection'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('recipeDirection')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>COOKING TIME</label>
                        <input type="text" name="recipeTime" class="form-control" value="<?php echo $user_data['recipeTime']; ?>"/>
                        <?php
                        if($validation->getError('recipeTime'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('recipeTime').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user_data["id"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>