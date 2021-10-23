
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
        
        <h2 class="text-center mt-4 mb-4">Recipe</h2>
        <div class="container">
            <a href="/">Home</a>
            <a href="<?php echo base_url('home/appitizer') ?>">Appetizer </a>
            <a href="<?php echo base_url('home/soup') ?>">Soup </a>
            <a href="<?php echo base_url('home/main') ?>">Main Dish</a>
            <a href="<?php echo base_url('home/dessert') ?>">Dessert </a>
        </div>

        <?php

        $session = \Config\Services::session();

        if($session->getFlashdata('success'))
        {
            echo '
            <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
            ';
        }

        ?>


        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <?php foreach ($user_data as $item) : ?>
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('uploads/'.$item['recipeImg']);?>" width="100px" height="100px">
                                </div>
                                <div class="col-lg-8">
                                    <h3><?= $item['recipeName'] ?></h3>
                                    <h6><?= $item['category'] ?></h6>

                                    <h5>Ingredients</h5>
                                    <p><?= $item['recipeIngridients'] ?></p>
                                    <a href="<?php echo base_url('home/readmore/'.$item["id"]); ?>">Read More</a>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <a href="<?php echo base_url("/home/add")?>" class="btn btn-success btn-sm">Submit a Recipe</a>
                        
                        <h2>Featured Recipe</h2>
                        <?php $i = 0; foreach ($user_data as $item) : ?> 
                            <?php for ($i; $i < 1; $i++) : ?>
                                <img src="<?php echo base_url('uploads/'.$item['recipeImg']);?>"  width="100%" height="100%">
                                <h2><?= $item['recipeName'] ?></h2>
                                <a href="<?php echo base_url('home/readmore/'.$item["id"]); ?>">Read More</a>
                            <?php endfor; ?>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div>
                        <?php

                        if($pagination_link)
                        {
                            $pagination_link->setPath('home');

                            echo $pagination_link->links();
                        }
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
 
</body>
</html>
<style>
.pagination li a
{
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>


