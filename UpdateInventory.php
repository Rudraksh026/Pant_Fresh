<?php
include './Extra/conn.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script/script.js"></script>
</head>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $query2 = "UPDATE `item_info` SET `quantity` = '".$_POST['quantity']."' WHERE `item_info`.`id` = ".$_POST['id'].";";
        mysqli_query($conn,$query2);
    }

    $query1 = "SELECT * FROM `item_info`";
?>

<body>
    <?php include './header.php'; ?>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full ">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Update Inventory</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
            </div>



            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Id</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Name</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Buy Price</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Sell Price</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Profit Per Unit</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                College provider</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Quantity</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Check out</th>
                        </tr>
                    </thead>

                    <?php
                    $result1 = mysqli_query($conn, $query1);
                    while ($data1 = mysqli_fetch_assoc($result1)) {

                    ?>

                        <tbody>
                            <tr>
                                <td class="px-4 py-3"><?php echo $data1["id"]; ?></td>
                                <td class="px-4 py-3"><?php echo $data1["name"]; ?></td>
                                <td class="px-4 py-3"><?php echo "₹" . $data1["buy_price"]; ?></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo "₹" . $data1["sell_price"]; ?></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo "₹" . $data1["sell_price"] - $data1["buy_price"]; ?></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo $data1["provider"] ?></td>
                                 <form method="post">
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">
                                
                              
                                
                                <?php 
                                
                                    echo ' 
                                        <input type="number" style="display:none" class="border-2 border-solid w-1/2" name="id" id="" value="'.$data1["id"].'"> 
                                    <input type="number" class="border-2 border-solid w-1/2" step="any" name="quantity" id="" value="'.$data1["quantity"].'">  '. $data1["measure_standard"]; 
                                
                                ?>
                            

                            </td>
                                <td class="px-4 py-3 text-lg text-gray-900">

                                <?php
                             echo '<button class="border-2 border-solid p-2  rounded-md bg-sky-500 hover:bg-sky-700 text-white" >Check Out</button>';
                                 ?>
                                </td>
                                </form>
                            </tr>

                        </tbody>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>
