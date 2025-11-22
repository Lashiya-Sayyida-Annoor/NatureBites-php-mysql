<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <?php

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");



?>

    <head>
       
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
            />
            <style>
            .product-image {
                float: left;
                width: 15%;
                text-align: center;

            }

            .product-details {
                float: left;
                width: 20%;
                text-align: center;

            }

            .product-price {
                float: left;
                width: 12%;
            }

            .product-quantity {
                float: left;
                width: 16%;
            }

            .product-removal {
                float: left;
                width: 9%;
            }

            .product-line-price {
                float: left;
                width: 12%;
                text-align: right;
            }

            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .product:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                content: "";
                display: table;
            }

            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                clear: both;
            }

            .group,
            .shopping-cart,
            .column-labels,
            .product,
            .totals-item {
                zoom: 1;
            }

            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .product .product-price:before,
            .product .product-line-price:before,
            .totals-value:before {
                content: "₹";
            }

            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }

            h1 {
                font-weight: 100;
            }

            label {
                color: #aaa;
            }

            .shopping-cart {
                margin-top: -45px;
            }

            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            .column-labels .product-image,
            .column-labels .product-details,
            .column-labels .product-removal {
                /* text-indent: -9999px; */
            }

            /* Product entries */
            .product {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .product .product-image {
                text-align: center;
                width: 15%;

            }
            .product .product-image img {
                width: 100px;
            }
            .product .product-details .product-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .product .product-details .product-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .product .product-quantity input {
                width: 40px;
            }
            .product .remove-product {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
            }
            .product .remove-product:hover {
                background-color: #a44;
            }

            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #6b6;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }

            .checkout:hover {
                background-color: #494;
            }

            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 0px solid #eee;
                }

                .column-labels {
                    display: none;
                }

                .product-image {
                    float: right;
                    width: auto;
                }
                .product-image img {
                    margin: 0 0 10px 10px;
                }

                .product-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }

                .product-price {
                    clear: both;
                    width: 70px;
                }

                .product-quantity {
                    width: 100px;
                }
                .product-quantity input {
                    margin-left: 20px;
                }

                .product-quantity:before {
                    content: "x";
                }

                .product-removal {
                    width: auto;
                }

                .product-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .product-removal {
                    float: right;
                }

                .product-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }

                .product .product-line-price:before {
                    content: "Item Total: ₹";
                }

                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }


            label{
                margin: 0px 15px;
            }

            .m15{
                margin: 0px 15px;

            }



            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }

            .switch2-checked{
                background-color: #2ecc71;
            }


        </style>
    </head>
<?php
       
        if (isset($_POST["btn_checkout"]) != "") {
                 
                 
              
                 
                 
                $amt = $_POST["carttotalamt"];
                 
               
                
               $selC = "select * from tbl_booking where user_id='" .$_SESSION['uid']. "' and booking_status='0'";
                $rsC = $con->query($selC);
                if($rsc=$rsC->fetch_assoc())
				{
                
                    
                    
               $upQry = "update tbl_booking set booking_date=curdate(),booking_total='".$amt."' where user_id='" .$_SESSION['uid']. "'and booking_id='".$rsc["booking_id"]."'";
               
                if($con->query($upQry))
                {
                  // $updQry = "update tbl_cart set cart_status = '1' where booking_id='".$rsc["booking_id"]."'";
                    //if($con->query($updQry))
					//{
					?>
                     <script>
					 alert("Redirecting")
					// window.location="Payment.php ";
                    window.location = "Payment.php?booking_id1=<?php echo $rsc['booking_id']; ?>";
					 </script>
                    <?php	
					
                    
                }
                 
                $_SESSION["bid"]= $rsc["booking_id"];
                 
				}
                 
          
                
              
           
           
        }


    ?>
    <body onload="recalculateCart()">
    <h1>Cart</h1>
    <form method="post">
        <div class="shopping-cart" style="margin-top: 50px">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity(kg)</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>
            <?php
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id='" . $_SESSION['uid'] . "' and booking_status=0";
            $rs = $con->query($sel);
            while ($rss = $rs->fetch_assoc()) {
                $selDress = "select * from tbl_vegetables where veg_id='" . $rss["veg_id"] . "'";
                $rsDress = $con->query($selDress);

                if ($rsd = $rsDress->fetch_assoc()) {
                    $selDressStock = "select sum(vegstock_quant) as stock from tbl_vegstock where veg_id = '" . $rss["veg_id"] . "' and curdate() <= expiry_date";
                    $rsDressStock = $con->query($selDressStock);
                    $damastock = "select sum(damage_veg) as stock from tbl_vegstock where veg_id = '" . $rss["veg_id"] . "'";
                    $damresult = $con->query($damastock);

                    if ($rsds = $rsDressStock->fetch_assoc()) {
                        $stock1 = $rsds["stock"];
                        if ($rsdss = $damresult->fetch_assoc()) {
                            $stock2 = $rsdss["stock"];
                        }
                        $stock = $stock1 - $stock2;
                    }
            ?>
                    <div class="product">
                        <div class="product-image m15">
                            <img src="../Assets/Files/Distimg/<?php echo $rsd["veg_img"] ?>" />
                        </div>
                        <div class="product-details m15">
                            <div class="product-title"><?php echo $rsd["veg_name"] ?></div>
                        </div>
                        <div class="product-price m15"><?php echo $rsd["veg_rate"] ?></div>
                        <div class="product-quantity m15">
                            <input alt="<?php echo $rss["cart_id"] ?>" type="number" value="<?php echo $rss["cart_quantity"] ?>" min="1" max="<?php echo $stock ?>" />
                        </div>
                        <div class="product-removal m15">
                            <button class="remove-product" value="<?php echo $rss["cart_id"] ?>">Remove</button>
                        </div>
                        <div class="product-line-price m15">
                            <?php
                            $pr = $rsd["veg_rate"];
                            $qty = $rss["cart_quantity"];
                            $tot = (float) $pr * (float) $qty;
                            echo $tot;
                            ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value="<?php echo $tot; ?>" />
                </div>
            </div>

            <span>Card Payment</span>
            <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
        </div>
    </form>
        <!-- partial -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        /* Set rates + misc */
        var fadeTime = 300;

        /* Assign actions */
        $(".product-quantity input").change(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxVCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);

        });

        $(".product-removal button").click(function() {

            $.ajax({
                url: "../Assets/AjaxPages/AjaxVCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });

        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });

            /* Calculate totals */
            var total = subtotal;

            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }

        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });

        }

        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </body>
    <?php
include("Foot.php");
ob_flush();
?>
</html>
