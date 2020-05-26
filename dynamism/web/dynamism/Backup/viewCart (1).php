<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

    <?php 

        include 'Cart.php';
        $cart = new Cart;

    ?>

    <title>Bocadito | Hechos con Amor&#174;</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

     <style>
    
        input[type="number"]{width: 30%;}

    </style>

    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('No fue posible actualizar el Carrito, Intente de nuevo.');
            }
        });
    }
    </script>

</head>

 <body>
        <div class="container">
                <a href="index.php"><div class="logo"></div></a>       
                    <div class="container admin">
                          <div class="row">
                                  <h1><strong>Tu Pedido</strong></h1>
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                         <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>&nbsp;</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($cart->total_items() > 0){
                                                //get cart items from session
                                                $cartItems = $cart->contents();
                                                foreach($cartItems as $item){
                                            ?>
                                            <tr>
                                                <td><?php echo $item["name"]; ?></td>
                                                <td><?php echo '$'.$item["price"].' MXN'; ?></td>
                                                <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                                <td><?php echo '$'.$item["subtotal"].' MXN'; ?></td>
                                                <td>
                                                    <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quiere remover el Producto seleccionado?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } }else{ ?>
                                            <tr><td colspan="5"><p>El Carrito esta Vacio :(</p></td>
                                            <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continuar Comprando</a></td>
                                            <td colspan="2"></td>
                                            <?php if($cart->total_items() > 0){ ?>
                                            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' MXN'; ?></strong></td>
                                            <td><a href="shippingAddress.php" class="btn btn-success btn-block">Confirmar Orden <i class="glyphicon glyphicon-menu-right"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                  </table>
                          </div>
                    </div>
        </div>
    </body>
</html>