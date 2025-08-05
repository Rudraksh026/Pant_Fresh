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
        $query1 = "SELECT * FROM `item_info` WHERE name LIKE '%".$_POST["full-name"]."%'";
    }
    else{
        $query1 = "SELECT * FROM `item_info`";
    }
?>

<body>
    <?php include './header.php'; ?>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full ">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">List Of Items</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Item List that are present are ready to sell</p>
            </div>

            <section class="text-gray-600 body-font">
                <div class="container px-5 py-7 mx-auto">
                    <form method="post" action="./Inventory.php"
                        class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                        <div class="relative flex-grow w-full">
                            <label for="full-name" class="leading-7 text-sm text-gray-600">Item Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
                    </form>
                </div>
            </section>
            

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
                        </tr>
                    </thead>

    <?php
        $result1 = mysqli_query($conn,$query1);
        while($data1 = mysqli_fetch_assoc($result1)){
        
    ?>
    
                    <tbody>
                        <tr>
                            <td class="px-4 py-3"><?php echo $data1["id"]; ?></td>
                            <td class="px-4 py-3"><?php echo $data1["name"]; ?></td>
                            <td class="px-4 py-3"><?php echo "₹".$data1["buy_price"]; ?></td>
                            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo "₹".$data1["sell_price"]; ?></td>
                            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo "₹".$data1["sell_price"]-$data1["buy_price"]; ?></td>
                            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo $data1["provider"] ?></td>
                            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><?php echo $data1["quantity"]." ".$data1["measure_standard"]; ?></td>
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