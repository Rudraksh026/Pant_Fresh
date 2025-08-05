<?php include './Extra/conn.php'; ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script/script.js"></script>
</head>

<body>
    <?php include './header.php';?>
    <form method="post">
        <div class="w-4/6 m-auto my-20 space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Item Information</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">name</label>
                        <div class="mt-2">
                            <input type="text" id="first-name" name="name" autocomplete="given-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Buy Price</label>
                        <div class="mt-2">
                            <input type="number" id="last-name" name="buy-price" autocomplete="family-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Sell Price</label>
                        <div class="mt-2">
                            <input type="number" id="last-name" name="sell-price" autocomplete="family-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                        </div>
                    </div>
                    <div class="sm:col-span-full">
                        <label for="text" class="block text-sm/6 font-medium text-gray-900">College Provider</label>
                        <div class="mt-2">
                            <input id="text" type="text" name="college-provider" autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Measuring Unit</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="country" name="measure-unit" autocomplete="country-name"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                                <option>Unit</option>
                                <option>Kg</option>
                                <option>ltr</option>
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
        </div>
    </form>
</body>

</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql1 = "INSERT INTO `item_info` ( `name`, `buy_price`, `sell_price`, `provider`, `quantity`, `measure_standard`) VALUES ( '".$_POST["name"]."', '".$_POST["buy-price"]."', '".$_POST["sell-price"]."', '".$_POST["college-provider"]."', '0', '".$_POST["measure-unit"]."');";
        mysqli_query($conn,$sql1);
    }
?>