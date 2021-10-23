
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Codeigniter 4 Crud Application</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Codeigniter 4 Crud Application</h2>
       
        <?php

        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Sample Data</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo base_url("/home/add_validation")?>" accept-charset="utf-8" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>NAME</label>
                        <input type="text" name="recipeName" class="form-control" />
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
                            <!-- <option value="Appitizer">Appetizer</option>
                            <option value="Soup">Soup</option>
                            <option value="Main Dish">Main Dish</option>
                            <option value="Dessert">Desert</option> -->

                            <?php foreach ($category as $item) : ?>
                                <option value="<?php echo $item['category']; ?>"><?= $item['category'] ?></option>
                            <?php endforeach; ?>
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
                       <!-- <input type="text" name="recipeIngridients" class="form-control" />-->
                        <textarea name="recipeIngridients" id="recipeIngridients" class="form-control" cols="30" rows="3"></textarea>
                        <?php
                        if($validation->getError('recipeIngridients'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('recipeIngridients').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>COOKING DIRECTION</label>
                       <!-- <input type="text" name="recipeDirection" class="form-control" /> -->
                        <textarea name="recipeDirection" id="recipeDirection" class="form-control" cols="30" rows="5"></textarea>
                        <?php
                        if($validation->getError('recipeDirection'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('name').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>COOKING  TIME</label>
                        <input type="text" name="recipeTime" class="form-control" />
                        <?php
                        if($validation->getError('recipeTime'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('recipeTime').'</div>';
                        }
                        ?>
                    </div>
                   
                    <div class="form-group">
                        <label>RECIPE COVER IMAGE</label>
                        <input type="file" name="file" class="form-control" id="file">
                        <?php
                        if($validation->getError('file'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('file')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>
