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
    $query1 = "SELECT * FROM `item_info`";
?>

<body>
    
<?php include './header.php'; ?>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full ">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Item To buy</h1>
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
                                Sell Price</th>
                            
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                College provider</th>
                                <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Available Quantity</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Quantity</th>
                            
                        </tr>
                    </thead>
                    <tbody>
            <form method="post" action="./Proceed.php">

                    <?php
                    $result1 = mysqli_query($conn, $query1);
                    while ($data1 = mysqli_fetch_assoc($result1)) {

                    ?>

                        <tr>
                                <td class="px-4 py-3"><?php echo $data1["id"]; ?></td>
                                <td class="px-4 py-3"><?php echo $data1["name"]; ?></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo "₹" . $data1["sell_price"]; ?></td>
                                
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo $data1["provider"] ?></td>
                                
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo $data1["quantity"]." ".$data1["measure_standard"] ?></td>
                                 <form method="post">
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">
                                
                              
                                
                                <?php 
                                
                                    echo '
                                    <input type="number" class="border-2 border-solid w-1/2" step="any" name="'.$data1["id"].'" id="" value="">  '. $data1["measure_standard"]; 
                                
                                ?>
                            

                            </td>
                                    
                                
                            </tr>

                        

                    <?php
                    }
                    ?>
                     <?php
                             echo '<button class="border-2 border-solid p-2  rounded-md bg-sky-500 hover:bg-sky-700 text-white" >Check Out</button>';
                                 ?>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>
