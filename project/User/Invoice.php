<?php
include("../Assets/Connection/Connection.php");
$oid = $_GET['oid'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
        * {
            box-sizing: border-box;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .t1 {
            border-color: #4a4a4a;
        }

        .cropped img {
            width: 400px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php
    $selqry = "select * from tbl_user u inner join tbl_booking b on u.user_id = b.user_id inner join tbl_cart c  on b.booking_id=c.booking_id inner join tbl_vegetables v on c.veg_id=v.veg_id where b.booking_id=" . $oid . " and b.booking_status= 4";
    $result = $con->query($selqry);
    $data = $result->fetch_assoc();

    ?>

    <button id="cmd" onClick="printDiv('content')"
        style="float:right;color:#FFF;background:#0C0;border:none;margin:20px;padding:10px;border-radius:10px">PDF
        Bill
    </button>
    <button id="cmd" onClick="generatePDFAndSend('content')"
        style="float:right;color:#FFF;background:#0C0;border:none;margin:20px;padding:10px;border-radius:10px">
        Email Bill
    </button>
    <br /><br /><br /><br /><br /><br />

    <section class="main-pd-wrapper" id="content">
        <div style="width: 1000px; margin: 0 auto; border: 1px solid #ddd; padding: 20px;">
            <h4 style="text-align: center; margin: 0;"></h4>
            <table style="width: 100%; border: 1px solid #ddd;">
                <tr>
                    <td style="border-right: 1px solid #ddd; padding: 20px;">
                        <div style="text-align: center; line-height: 1.5; font-size: 14px; color: #4a4a4a;">
                            <img style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;"
                                src="../Assets/Template/Main/Img/blog-2.jpg" alt="logo"><br>
                            <span
                                style="font-family: garmond; color: #234A6F; font-size: 56px;">NatureBites</span><br><br>
                        </div>
                    </td>
                    <td style="text-align: right; padding: 20px; line-height: 1.5; color: #323232;">
                        <?php
                        $selad = "select * from tbl_user cus inner join tbl_place c on cus.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where user_id =" . $data['user_id'] . "";
                        $resad = $con->query($selad);
                        $rowad = $resad->fetch_assoc();
                        ?>
                        <div style="margin-top: 5px; margin-bottom: 5px;">
                            <h4>Billing Address</h4>
                            <p style="font-size: 14px;">
                                <b>
                                    <?php echo $data["user_name"] ?>
                                </b><br>
                                <?php echo $data["user_address"] ?><br>
                                <?php echo $rowad["place_name"] ?><br>
                                <?php echo $rowad["place_pincode"] ?><br>
                                <?php echo $rowad["district_name"] ?><br>
                                Contact:
                                <?php echo $data["user_contact"] ?>
                            </p>
                        </div>
                        <div>
                            <br>
                            <h4 style="margin-top: 5px; margin-bottom: 5px;">Shipping Address</h4>
                            <p style="font-size: 14px;">
                                <?php echo $data["user_address"] ?>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="t1" style="width: 100%;">
                <?php
                // Sample data
                $bill = [
                    'booking_id' => $data['booking_id'],
                    'booking_date' => $data['booking_date'],
                ];

                // Reformat the order_date to 'YYYYMMDD'
                $orderDate = date('Ymd', strtotime($bill['booking_date']));

                // Ensure that the order ID has enough preceding zeros to fit the length
                $billOrderID = str_pad($bill['booking_id'], 4, '0', STR_PAD_LEFT);

                // Concatenate the reformatted order date and the adjusted order ID
                $billNumber = $orderDate . $billOrderID;
                ?>
                <table style="margin: 0; background: #daf0f7; padding: 15px; padding-left: 20px; width: 100%;">
                    <tr>
                        <td style="width: 50%;">
                            <p>Order Date:
                                <?php echo $data["booking_date"] ?>
                            </p>
                            <p>Ordered from: NatureBites</p>
                        </td>
                        <td style="width: 50%; text-align: right;">
                            <p style="margin: 5px 0">Invoice Generated on:
                                <?php echo date("Y-m-d"); ?>
                            </p>
                            <p>Bill number:
                                <?php echo $data["bill_num"] ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <table style="border: 1px solid #ccc; width: 100%;">
                <tr>
                    <td style="padding: 10px;">
                        <table style="border: 1px solid #ccc; width: 940px;">
                            <tr style="background-color: #f0f0f0; font-weight: bold;">
                                <th style="padding: 5px; width: 30px;">#</th>
                                <th style="padding: 5px; width: 100px;">Product</th>
                                <th style="padding: 5px; width: 50px;">Price</th>
                                <th style="padding: 5px; width: 50px;">Qty</th>
                                <th style="padding: 5px; width: 70px;">Total Price</th>
                            </tr>
                            <?php
                            $total = 0;
                            $i = 0;
                            $sel4 = "select * from tbl_booking b inner join tbl_cart c on b.booking_id=c.booking_id  inner join tbl_vegetables p on c.veg_id = p.veg_id where b.booking_id = " . $data['booking_id'] . " and b.booking_status=4";
                            $result4 = $con->query($sel4);
                            while ($res1 = $result4->fetch_assoc()) {
                                $i++;
                                ?>
                                <tr>
                                    <td style="padding: 5px; width: 30px;" align="center">
                                        <?php echo $i ?>
                                    </td>
                                    <td style="padding: 5px; width: 100px;" align="center">
                                        <?php echo $res1["veg_name"] ?>
                                    </td>
                                    <td style="padding: 5px; width: 50px;"  align="center" >
                                        <?php echo $res1["veg_rate"] ?>
                                    </td>
                                    <td style="padding: 5px; width: 50px;"  align="center">
                                        <?php echo $res1["cart_quantity"] ?>
                                    </td>
                                    <td style="padding: 5px; width: 70px;"  align="center">
                                        <?php echo $res1["veg_rate"] * $res1["cart_quantity"] ?>
                                    </td>
                                </tr>
                                <?php
                                $total += ($res1["veg_rate"] * $res1['cart_quantity']);
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px;">
                <tr>
                    <td style="background: #b4cbf0; width: 50%; height: 60px; padding: 46px;">
                        <b>Grand Total</b>
                    </td>
                    <td style="background: #b4cbf0; width: 50%; height: 60px; padding: 46px;">
                        <b>
                            <?php echo $total . " Rs" ?>
                        </b>
                    </td>
                </tr>
            </table>
        </div>
    </section>



    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
    <script>
        function printDiv(divName) {
          
            var printContents = document.getElementById(divName).innerHTML;
            
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        function generatePDFAndSend(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            

        //     $.ajax({
        //         url: "../Assets/AjaxPages/AjaxMyPdf.php",
        //         method: "POST",
        //         data: { printContents: printContents },
        //         dataType: "JSON",
        //         success: function (data) {
        //           alert(data);
        //         }
        //     })
        // }
        $.ajax({
        url: "../Assets/AjaxPages/AjaxMyPdf.php",
        method: "POST",
        data: { printContents: printContents },
        dataType: "JSON",
        success: function (data) {
            // Check if the response contains valid data
            if (data) {
                alert(data);
            } else {
                console.error('Invalid response data received.');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX request failed: ' + error);
        }
    });
        }

    </script>
</body>

</html>