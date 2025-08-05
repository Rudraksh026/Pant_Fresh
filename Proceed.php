<?php
    include "./Extra/conn.php";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        session_start();
        $_POST = array_filter($_POST);
        $quantity = array();
        $id = array();
        $data = array();
        foreach($_POST as $key => $val){
            $sql = "SELECT id,name,sell_price,measure_standard FROM item_info WHERE id = $key;";
            array_push($quantity,$val);
            array_push($id,$key);
            $result = mysqli_query($conn,$sql);
            array_push($data,mysqli_fetch_row($result));
        }
        $_SESSION["id"] = $id;
    }
    $_SESSION['quantity'] = array();
    $_SESSION['proceed'] = 1;
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script/script.js"></script>
</head>

<body>
    <?php include './header.php'; ?>
    <form method="post" action="final.php">
        <div class="flex w-5/6 m-auto my-20 space-y-12 gap-x-6">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Buyer Information</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Date</label>
                        <div class="mt-2">
                            <input type="text" name="date" id="first-name" value=<?php echo '"'.date("d.m.Y").'"'; ?> readonly autocomplete="given-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">.</label>
                        <div class="mt-2">
                            <select id="country" name="designation" autocomplete="country-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                                <option>Mr.</option>
                                <option>Mrs.</option>
                                <option>Miss.</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Buyer Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                        </div>
                    </div>
                    <div class="sm:col-span-full">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Student Id (If Applicable)</label>
                        <div class="mt-2">
                            <input id="email" name="student_id" type="text" autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-full">
                        <label for="phone_no" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input id="phone_no" name="phone_no" type="number" autocomplete="phone_no"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Mode Of Payment</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="country" name="mode_of_payment" autocomplete="country-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"  required>
                                <option>Cash</option>
                                <option>Online</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <div class="mt-2 grid grid-cols-1"><br>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
        <h2 class="text-sm title-font text-gray-500 tracking-widest">Total Bill</h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Product Bill</h1>
        
        
        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-500">Product Name</span>
          <span class="ml-auto text-gray-900">Quantity</span>
          <span class="ml-auto text-gray-900">Price</span>
        </div>
        <?php
            $i = 0;
            $total = 0;
            foreach($data as $val){
        
            echo '<div class="flex border-t border-b mb-6 border-gray-200 py-2">
                <span class="text-gray-500">'.$val[1].'</span>
                <span class="ml-auto text-gray-900">'.$quantity[$i].'</span>
                <span class="ml-auto text-gray-900">₹'.$val[2]*$quantity[$i].'</span>
            </div>';
                $total = $total + $val[2]*$quantity[$i];
                array_push($_SESSION['quantity'],$quantity[$i]);
                $i++;
            }
            $i = 0;
            $_SESSION['total'] = $total;
        ?>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900">₹ <?php echo $total; ?></span>
          
          
        </div>
      </div>
            
        </div>
    </form>
</body>

</html>