<?php 
    session_start();
    include './Extra/conn.php';
    // print_r($_SESSION["quantity"]);
    // print_r($_POST);
    $student_id = $_POST['student_id'];
    if($_POST['student_id'] == ""){
        $student_id = NULL;
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['proceed'] == 1){
        $sql1 = "INSERT INTO `sell_id_info` (`sell_date`, `sell_time`,`total`) VALUES ( '".date("Y-m-d")."', '".date("h:i:s")."',".$_SESSION['total'].");";
        $result1 = mysqli_query($conn,$sql1);
        if($result1 != NULL){
            $sql2 = "SELECT sell_id FROM `sell_id_info` ORDER BY sell_id DESC LIMIT 1;";
            $result2 = mysqli_query($conn,$sql2);
            $data = mysqli_fetch_row($result2);
            $i = 0;
            foreach($_SESSION["id"] as $id){
                $str = $_POST['designation']." ".$_POST['name'];
                $sql5 = "SELECT quantity from `item_info` WHERE `item_info`.`id` = ".$id.";";
                $result5 = mysqli_query($conn,$sql5);
                $data2 = mysqli_fetch_row($result5);
                $sql3 = "INSERT INTO `item_sell_table` (`id`, `sell_id`, `buyer_name`, `student_id`, `phone_no`, `mode_of_payment`,`quantity`) VALUES ( ".$id.", ".$data[0].", '".$str."', '".$student_id."', '+91 ".$_POST['phone_no']."', '".$_POST['mode_of_payment']."',".$_SESSION['quantity'][$i].");";
                $sql4 = "UPDATE `item_info` SET `quantity` = ".$data2[0]-$_SESSION['quantity'][$i]." WHERE `item_info`.`id` = ".$id.";";
                $result3 = mysqli_query($conn,$sql3);
                $result4 = mysqli_query($conn,$sql4);
                $i++;
            }
            $i=0;
        }
        $_SESSION['proceed'] = 0;
    }

    
    $sql_outer1 = "SELECT * FROM `sell_id_info` ORDER BY sell_id DESC LIMIT 1;";
    $result_outer1 = mysqli_query($conn,$sql_outer1);
    $data_outer1 = mysqli_fetch_row($result_outer1);
    // print_r($data_outer1);
    $sql_outer2 = "SELECT buyer_name,student_id,phone_no,mode_of_payment FROM `item_sell_table` INNER JOIN item_info ON item_info.id = item_sell_table.id WHERE sell_id = ".$data_outer1['0'].";";
    $result_outer2 = mysqli_query($conn,$sql_outer2);
    $data_outer2 = mysqli_fetch_row($result_outer2);
    // print_r($data_outer2);
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Bill</title>
    <script src="script/script.js"></script>
</head>
<body>
    
    <section id="printSection" class="text-gray-600 body-font">
  <div class="container px-5 py-5 mx-auto">
    <div class="flex flex-col  w-full mb-5">
      <h1 class="sm:text-4xl mx-auto text-3xl font-medium title-font  text-gray-900">Pant Fresh</h1> <br>
      <p class="lg:w-3/3  leading-relaxed text-base">Bill Number: <?php echo $data_outer1['0']; ?></p>
      <p class="lg:w-3/3  leading-relaxed text-base">Date : <?php echo $data_outer1['1']; ?></p>
      <p class="lg:w-3/3  leading-relaxed text-base">Buyer name: <?php echo $data_outer2['0']; ?></p>
      <p class="lg:w-3/3  leading-relaxed text-base">Student Id: <?php echo $data_outer2['1']; ?></p>
      <p class="lg:w-3/3  leading-relaxed text-base">Phone Number: <?php echo $data_outer2['2']; ?></p>
      <p class="lg:w-3/3  leading-relaxed text-base">Mode Of Payment: <?php echo $data_outer2['3']; ?></p>
    </div>
    <div class="lg:w-3/3 w-full overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Sno</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Quantity</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Price</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Total </th>
          </tr>
        </thead>
        <tbody>
        <?php
            $sql_outer3 = "SELECT item_sell_table.quantity,item_info.name,item_info.measure_standard,item_info.sell_price FROM `item_sell_table` INNER JOIN item_info ON item_info.id = item_sell_table.id WHERE sell_id = ".$data_outer1['0'].";";
            $result_outer3 = mysqli_query($conn,$sql_outer3);
            $i = 1;
            $total = 0;
            while($data_outer3 = mysqli_fetch_row($result_outer3)){
                // print_r($data_outer3);
            
        ?>

          <tr>
            <td class="px-4 py-3"><?php echo $i; ?></td>
            <td class="px-4 py-3"><?php echo $data_outer3[1]; ?></td>
            <td class="px-4 py-3"><?php echo $data_outer3[0]."/".$data_outer3[2] ; ?></td>
            <td class="px-4 py-3"><?php echo "₹ ".$data_outer3[3]."/".$data_outer3[2] ; ?></td>
            <td class="px-4 py-3 text-lg text-gray-900"><?php echo "₹ ".$data_outer3[0]*$data_outer3[3] ; ?></td>
          </tr>
          
          <?php
          $total = $total + $data_outer3[0]*$data_outer3[3];
          $i++;
          } 
          ?>

          <tr>
            <hr>
            <td class="px-4 py-3"></td>
            <td class="px-4 py-3"></td>
            <td class="px-4 py-3"></td>
            <td class="px-4 py-3">Grand Total</td>
            <td class="px-4 py-3 text-lg text-gray-900"><?php echo "₹ ".$total ; ?></td>
          </tr>
          
        </tbody>
        <hr>
      </table>
      <hr>
      <hr>
    </div>
  </div>
</section>
<div class="flex pl-4 mt-4 lg:w-3/3 w-full mx-auto">
    <form action="CheckOut.php">
        <button onclick="" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Go Home</button>
    </form>
      <button onclick="print_bill()" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Print Bill</button>
    </div>


<script>
function print_bill() {
    var printContents = document.getElementById('printSection').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

</script>
</body>
</html>
