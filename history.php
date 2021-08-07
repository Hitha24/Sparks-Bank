<!DOCTYPE html>
<html>
<head>
<Title>Transaction history</Title>

    <style>
        
        table {
            border-collapse: collapse;
            width: 100%;
            color:black;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color:#24a4c4;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2}

        #sideNav{
            width: 250px;
            height: 100vh;
            position: fixed;
            right: -250px;
            top:0;
            background:#24a4c4;
            z-index: 2;
            transition: .5s;
        }
        nav ul li{
            list-style: none;
            margin: 50px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color: #fff;
        }
        #menuBtn{
            width: 50px;
            position: fixed;
            right: 65px;
            top: 35px;
            z-index: 2;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div style="   font-size: 40px;
        text-align: center;
        margin: 20px;
        color:#24a4c4;
    }">Transaction History</div>
    <table>
    <tr>
    <th>Sender</th>
    <th>S.Account</th>
    <th>Reciever </th>
    <th>R.Account </th>
    <th>Amount</th>
    <th>Date and Time</th>
    </tr>

    <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }


        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
                 echo "</tr>";
        }
        echo "</table>";
        }
    ?>


    <nav id="sideNav">
        <ul>
            <li><a href="main.html">HOME</a></li>
            <li><a href="users.php">OUR CUSTOMERS</a></li>
            <li><a href="history.php">TRANSACTION HISTORY</a></li>
            <li><a href="users.php">TRANSFER MONEY</a></li>
            <li><a href="Regi.php">NEW USER</a></li>
        </ul>
    </nav>
    <div id="hojaplz">
        <img src="images/images.png" id="menuBtn">
    </div>

    <script>
        let menuBtn = document.querySelector('#hojaplz');
        let sideNav = document.querySelector('#sideNav')
        let condition = true;
        menuBtn.addEventListener('click',function(){
            if(condition){
                 sideNav.style.right = '0px';
                 condition = false;
            }
            else{
                sideNav.style.right = '-250px';
                condition = true;
            }
            })
    </script>
    </table>
    </body>
</html>