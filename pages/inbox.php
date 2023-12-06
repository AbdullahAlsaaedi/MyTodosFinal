<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/30
 -->
 
 <?php 
 
 $dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$db = "myTodosDB"; // Replace with your database name

// Create connection
$con=mysqli_connect("$dbhost", "$dbusername", "$dbpassword", "$db");





$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = mysqli_query($con, $sql);

if ($result) {
    if(mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_array($result)) {
            $fetchedData[] = $row;
        }
    }
        
} else {
    echo "0 results";
}


?> 

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../global/styles.css">

        <title>MyTodos</title>
    </head>

    <body>

        <!-- //////// navigation //////// -->
        <?php include 'header.php'; ?>




        <div class="todos-list">

            <!-- header 1 -->
            <h1>All your To-do's</h1>

        


            <?php foreach ($fetchedData as $row): ?>
                <div class="todo">

                <input type="checkbox" name="todo-check" id="todo-check">
                <span class="todo-title"><?php echo htmlspecialchars($row['title']); ?></span>
                </div>
            <?php endforeach; ?>



        </div>

        <?php include 'footer.php'; ?>

        <script src="../scripts/settings.js"></script>

    </body>

</html>