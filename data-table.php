<html>
    <body>
        <h1 align="center">All Payments Record</h1>
        <h4 align="center">Sorted Latest First</h4>
        <table align="center" border="1px">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Payment ID</th>
                <th>Added On</th>
                <th>Description</th>
            </tr>
            <?php
                include ('db.php');
                $result = $conn -> query("SELECT * from Payment ORDER BY Added_On DESC");
                
                if($result -> num_rows >0){
                    while ($row = $result -> fetch_assoc()){
                        echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Amount']."</td><td>".$row['Payment_Status']."</td><td>".$row['Payment_ID']."</td><td>".$row['Added_On']."</td><td>".$row['Description']."</td></tr>";
                    }
                }
                else{
                    echo "NO RESULTS";
                }
            ?>
        </table>
    </body>
</html>