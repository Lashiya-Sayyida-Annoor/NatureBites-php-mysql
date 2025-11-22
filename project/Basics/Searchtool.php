<?php
session_start();
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Tools</title>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <h6 class="text-info"> Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check" id="txt_name">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Category</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_toolcategory";
                            $result = $con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["toolcat_id"]; ?>" id="category"><?php echo $row["toolcat_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select District</h6>
                    <ul class="list-group">
					<?php                           
						 $selDist = "SELECT * from tbl_district";
                            $resultDist = $con->query($selDist);
                            while ($rowDist=$resultDist->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck(),changePlace()" class="form-check-input product_check" value="<?php echo $rowDist["district_id"]; ?>" id="district"><?php echo $rowDist["district_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Place</h6>
                    <ul class="list-group" id="selplace">
					
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Template/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Template/Search/jquery.min.js"></script>
        <script src="../Assets/Template/Search/bootstrap.min.js"></script>
<script src="../Assets/Template/Search/popper.min.js"></script>
        <script>


function changePlace()
            {
                var dist = get_filter_text('district');
                if (dist.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchPlace.php?data=" + dist,
                        success: function(response) {
                            $("#selplace").html(response);
                        }
                    });

                }
                else
                {
                    $("#subcat").html("");
                }


                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }

            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxToolCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var district = get_filter_text('district');
                    var place = get_filter_text('place');
					var name = document.getElementById('txt_name').value;
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchTool.php?action=" + action +"&category=" + category+"&district=" + district+"&place=" + place+"&name=" + name ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>
</html>



























