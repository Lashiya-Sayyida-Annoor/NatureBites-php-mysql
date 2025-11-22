<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_vegetables v inner join tbl_vegcategory vc on vc.vegcat_id =v.vegcat_id  inner join tbl_distributor d on d.dist_id=v.dist_id inner join tbl_place p on d.place_id=p.place_id inner join tbl_district di on p.district_id=di.district_id  where true ";
       
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND vc.vegcat_id IN(".$category.")";
        }
        if ($_GET["district"]!=null) {

            $district = $_GET["district"];

            $sqlQry = $sqlQry." AND di.district_id IN(".$district.")";
        }
        if ($_GET["place"]!=null) {

            $place = $_GET["place"];

            $sqlQry = $sqlQry." AND p.place_id IN(".$place.")";
        }
		
		if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND v.veg_name LIKE '".$name."%'";
        }
        $resultS = $con->query($sqlQry);
        
       

        if ($resultS->num_rows > 0) {
            while ($rowS = $resultS->fetch_assoc()) {

?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/Distimg/<?php echo $rowS["veg_img"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["veg_name"]; ?></h6>
                                    </div>
                                    <?php
                                    $originalPrice = $rowS['veg_rate'];
                                     $discount = 10;
                                     $discountedPrice = $originalPrice + $discount;
                                     ?>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                        <span style="text-decoration: line-through;"> INR <?php echo  $discountedPrice; ?></span> <br>
                                         INR <?php echo $rowS["veg_rate"]; ?>/- &nbsp;
                                         
                                            </h4>
                                        
                                        
											
											
											
										<?php
                                        $stock=0;
										
											$stock1 = "select sum(vegstock_quant) as stock from tbl_vegstock where veg_id = '" . $rowS["veg_id"] . "' and curdate() <= expiry_date";
											$result2 = $con->query($stock1);
                            				if($row2=$result2->fetch_assoc())
                                            {
                                                $stocka = "select sum(cart_quantity) as stock from tbl_cart where cart_status=1 and veg_id = '" . $rowS["veg_id"] . "'";
                                                $result2a = $con->query($stocka);
                                                if($row2a=$result2a->fetch_assoc())
                                                {
                                                    $stock = $row2["stock"] - $row2a["stock"] ;
                                                }
    
                                                $damastock = "SELECT damage_veg AS stock FROM tbl_vegstock WHERE veg_id = '" . $rowS["veg_id"] . "' ORDER BY veg_id DESC LIMIT 1";
                                                $damresult = $con->query($damastock );
                                              if($row2b=$damresult->fetch_assoc())
                                              {

                                                $stock = $row2["stock"] - $row2a["stock"] - $row2b["stock"];

                                              }

                                            }
											
											

											

											?>
                                            <p align="center" style="color:#F96;font-size:20px">Qty <?php echo $stock; ?>Kg-Left</p>
                                            <?php
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS['veg_id']?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else if ($stock < 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        <!--<a href="ViewMore.php?id=<?php /* echo $rowS["veg_id"]; */?>" class="btn btn-warning btn-block">View More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>