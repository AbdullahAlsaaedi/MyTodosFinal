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




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(isset($_POST['notetitle']) && isset($_POST['notetext'])) {

        $notetitle = $_POST['notetitle']; 
        $notetext = $_POST['notetext']; 
        $notedat = date("Y-m-d"); // Format: YYYY-MM-DD

        echo $notetitle;
        // Prepare and bind
        $sql = "INSERT INTO notes (name, content, date) VALUES ('$notetitle', '$notetext', '$notedat')";
        $query = mysqli_query($con, $sql);
        
        

    } 


    // Redirect to the same page or a different one
    header('Location: notes.php');
    exit;
}

// Normal page loading logic here



// Get value from POST request





$sql = "SELECT * FROM notes ORDER BY id DESC";
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




<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/5
 -->

<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" href="../global/styles.css">
    <link rel="stylesheet" href="../global/print.css" media="print">

    

        <title>MyTodos</title>

    </head>

    <body>

       <!-- //////// navigation //////// -->

       
       <?php include 'header.php'; ?>

        <!-- container of all the elements -->
        <div class="note-container" >


        <!-- container for notes textarea -->
        <form method="post" class="notes">
                <h2>Add a Note</h2>
                
                <input type="text" name="notetitle" id="notetitle" placeholder="title"> 
                <textarea name="notetext" id="notetext" rows="4" cols="50" placeholder="content"></textarea><br>
                <input type="submit" name="notesubmit" id="notesubmit" class="add-button" value="save"></input>
                <input class="add-button" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" type="reset" name="" id="" value="reset">
            </form>

            
            <!-- table that hold all the notes -->
            <table>
                <caption ><h1 style="text-align: left;">List of all notes</h1></caption>


                
                <tr>
                    <th>note<br>number</th>
                    <th colspan="2" >the note</th>
                    <th >note date</th>
                </tr>



                <?php foreach ($fetchedData as $row): ?>

                <tr>
                    <td <?php echo 'class="id-' . htmlspecialchars($row['id']) . '"' ?>
                    >
                    <?php echo htmlspecialchars($row['id']); ?>
                    </td>

                    <td colspan="2"  <?php echo 'class="name-' . htmlspecialchars($row['id']) . '"' ?>
                    >
                    <?php echo htmlspecialchars($row['name']); ?>
                    </td>

                    <td rowspan="3" <?php echo 'class="date-' . htmlspecialchars($row['id']) . ' notedate"' ?>
                    ><?php echo htmlspecialchars($row['date']); ?>

                    <button style="padding:3px" data-id="<?php echo htmlspecialchars($row['id']); ?>" class="opennote">open</button>

                    </td>


                    
                    <td <?php echo 'class="content-' . htmlspecialchars($row['id']) . ' hidden"' ?>
                    ><?php echo htmlspecialchars($row['content']); ?>
                    </td>

                    
                    
                </tr>  

                <?php endforeach; ?>


            </table>
            

            
            

        </div>

        <?php include 'footer.php'; ?>

        <script src="../scripts/settings.js"></script>          
        <script src="../scripts/notes.js"></script>
    </body>

</html>