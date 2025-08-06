<?php include "./Extra/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Total Sales Bills</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Tailblocks Default Theme Support -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4f46e5',
            secondary: '#818cf8'
          }
        }
      }
    };
  </script>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Header -->
  <?php include 'header.php'; ?>

  <!-- Main Section -->
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
      <div class="text-center mb-8">
        <h1 class="sm:text-3xl text-2xl font-bold title-font text-gray-900 mb-4">Total Sales Bills</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">Overview of all billing transactions</p>
      </div>

      <!-- Bills Table -->
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr class="text-sm font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-300">
              <th class="px-6 py-3">Bill ID</th>
              <th class="px-6 py-3">Customer</th>
              <th class="px-6 py-3">Date</th>
              <th class="px-6 py-3">Amount</th>
              <th class="px-6 py-3">Mode of Payment</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <?php
                $sql_query = "SELECT DISTINCT sell_id_info.sell_id, item_sell_table.buyer_name, sell_id_info.sell_date,sell_id_info.total, item_sell_table.mode_of_payment FROM `sell_id_info` INNER JOIN item_sell_table ON sell_id_info.sell_id = item_sell_table.sell_id";
                $result = mysqli_query($conn,$sql_query);
                $total = 0;
                $count = 0;
                while($data = mysqli_fetch_row($result))
                {
                    $total += $data[3];
                    $count++;

            ?>
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4">#<?php echo $data[0]; ?></td>
              <td class="px-6 py-4"><?php echo $data[1]; ?></td>
              <td class="px-6 py-4"><?php echo $data[2]; ?></td>
              <td class="px-6 py-4">₹<?php echo $data[3]; ?></td>
              <td class="px-6 py-4 text-green-600"><?php echo $data[4]; ?></td>
            </tr>
            <?php } ?>
            
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>

      <!-- Summary Card -->
      <div class="mt-10 max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Summary</h2>
        <div class="flex justify-between text-gray-700">
          <span>Total Bills:</span>
          <span><?php echo $count; ?></span>
        </div>
        <div class="flex justify-between text-gray-700 mt-2">
          <span>Total Revenue:</span>
          <span>₹<?php echo $total; ?></span>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-gray-600 body-font">
    <div class="container px-5 py-4 mx-auto text-center">
      <p class="text-sm text-gray-500">© 2025 Sales System — All Rights Reserved</p>
    </div>
  </footer>
</body>
</html>
