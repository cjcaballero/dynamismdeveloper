<!DOCTYPE html>
<html>
    <head>
        <title>Bocadito | Hechos con Amor&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="apple-touch-icon" sizes="57x57" href="images/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/Favicon/favicon-16x16.png">
        <link rel="manifest" href="images/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>


    <body>
        <div class="container site">
                <a href="index.html"><div class="logo"></div></a>
       
                    <?php
        				require 'admin/database.php';

                        echo '<nav>
                                <ul class="nav nav-pills">';

                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM categories');
                        $categories = $statement->fetchAll();
                        foreach ($categories as $category)
                        {
                            if($category['id'] == '1')
                                echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                            else
                                echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                        }

                        echo    '</ul>
                              </nav>';

                        echo '<div class="tab-content">';

                        foreach ($categories as $category)
                        {
                           
                            echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                           
                            echo '<div class="row">';

                            $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                            $statement->execute(array($category['id']));
                            while ($item = $statement->fetch())
                            {
                                echo '<div class="col-sm-6 col-md-4 style="items-align=left">
                                        <div class="thumbnail">
                                            <img src="images/Productos/' . $item['image'] . '" alt="...">
                                            <div class="price">$ ' . number_format($item['price'], 2, '.', ''). '</div>
                                            <div class="caption">
                                                <h4>' . $item['name'] . '</h4>
                                                <p>' . $item['description'] . '</p>
                                                <a class="btn btn-order" href="cartAction.php?action=addToCart&id='. $item['id'] .'" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> AGREGAR AL CARRITO</a>
                                            </div>
                                        </div>
                                    </div>';

                             
                               
                            }

                           echo    '</div>
                                </div>';
                             
                        }
                        Database::disconnect();
                        echo  '</div>';
                    ?>
        </div>
    </body>
</html>
