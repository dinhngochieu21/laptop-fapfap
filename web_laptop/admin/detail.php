<html>
<head>
    <title>Trang admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        

        a {
            text-decoration:none;
            color: black;
        }

        body {
           
            padding-left: 50px;
            padding-top: 10px;
        }
        
    </style>
</head>
<body>

<?php
    require('../controller/connect.php');

    // query students table
    $sql = 'SELECT l.LaptopCode,l.LaptopName,SUM(od.quantityOrdered) as totalSold,SUM(od.totalPayment) AS totalMoneySold FROM laptop l JOIN orderdetails od ON od.LaptopCode = l.LaptopCode GROUP by l.LaptopCode';

    $x = mysqli_query($con, $sql);

    if(!$x) {
        die('Query error: [' . $db->error . ']');
    }
    require('header.php');   
        
       
?>
<table class="table">
    <thead>
        <tr>
        
            <th>LaptopCode</th>
            
            <th>LaptopName</th>
           
            <th>totalSold</th>

            <th>totalMoneySold</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($x, MYSQLI_ASSOC)) : ?>
            <tr>
        
                <td><?php echo $row['LaptopCode']; ?></td>
               
                <td><?php echo $row['LaptopName']; ?></td>
                
                <td><?php echo $row['totalSold']; ?></td>

                <td><?php echo $row['totalMoneySold']; ?></td>
                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>