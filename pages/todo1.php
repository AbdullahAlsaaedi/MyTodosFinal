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
$db = "myTodosDB"; 

// Create connection
$con=mysqli_connect("$dbhost", "$dbusername", "$dbpassword", "$db");

$today = date("Y-m-d");

if(isset($_POST['inp'])) {
    $inp = $_POST['inp']; 

    echo $myinp;
    // Prepare and bind
    $sql = "INSERT INTO todos (title, date) VALUES ('$inp', '$today')";
    $query = mysqli_query($con, $sql);

} 


if(isset($_POST['todo-edit-title']) && isset($_POST['todo-edit-description']) && isset($_POST['todo-edit-list-select']) && isset($_POST['dueDateTime'])) {

    $inpedit = $_POST['todo-edit-title'];
    $inpdesc = $_POST['todo-edit-description'];  
    $list = $_POST['todo-edit-list-select'];
    
    
    // Assuming the form method is POST
    $datetimeValue = $_POST['dueDateTime'];
    
    echo $datetimeValue;

    $sql = "INSERT INTO todos (title, description, list, date) VALUES ('$inpedit', '$inpdesc', '$list', '$datetimeValue')";
    $query = mysqli_query($con, $sql);
} 



$sql = "SELECT * FROM todos WHERE date = '$today' ORDER BY id DESC";
$result = mysqli_query($con, $sql);

if ($result) {
    if(mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_array($result)) {
            $fetchedData[] = $row;
        }
    }
        
} 


$sql2 = "SELECT * FROM todos WHERE list = 'Personal' ORDER BY id DESC";

$result2 = mysqli_query($con, $sql2);

if ($result2) {
    if(mysqli_num_rows($result2) > 0) {

        while($row2 = mysqli_fetch_array($result2)) {
            $fetchedData2[] = $row2;
        }
    }
        
} 


$sql3 = "SELECT * FROM todos WHERE list = 'Work' ORDER BY id DESC";

$result3 = mysqli_query($con, $sql3);

if ($result3) {
    if(mysqli_num_rows($result3) > 0) {

        while($row3 = mysqli_fetch_array($result3)) {
            $fetchedData3[] = $row3;
        }
    }
        
} 




$sql4 = "SELECT * FROM todos WHERE list = 'College' ORDER BY id DESC";

$result4 = mysqli_query($con, $sql4);

if ($result4) {
    if(mysqli_num_rows($result4) > 0) {

        while($row4 = mysqli_fetch_array($result4)) {
            $fetchedData4[] = $row4;
        }
    }
        
} 





// fetch based on date 


// upcoming

$sql5 = "SELECT * FROM todos WHERE date > '$today' ORDER BY id DESC";

$result5 = mysqli_query($con, $sql5);

if ($result5) {
    if(mysqli_num_rows($result5) > 0) {

        while($row5 = mysqli_fetch_array($result5)) {
            $fetchedData5[] = $row5;
        }
    }
        
} 


// due
$sql6 = "SELECT * FROM todos WHERE date < '$today' ORDER BY id DESC";

$result6 = mysqli_query($con, $sql6);

if ($result6) {
    if(mysqli_num_rows($result6) > 0) {

        while($row6 = mysqli_fetch_array($result6)) {
            $fetchedData6[] = $row6;
        }
    }
        
} 

?>


<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/5
 -->

 <!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyTodos</title>

        <link rel="stylesheet" href="../global/styles.css">

    </head>


    

    <body>

        <!-- //////// navigation //////// -->

        <?php include 'header.php'; ?>



        <!-- ////// Main /////// -->
        
        <div class="todo-main">

            <!-- side bar -->
            <aside class="todo-aside">

                <!-- title of side bar-->
                <h2 class="menu">Menu</h2>

                <!-- tasks container -->
                <div class="tasks">tasks</div>

                <!-- unorder list-->
                <ul class="tasks-list">
                    <li><button class="today-btn">Today</button></li>
                    <li><button class="upcoming-btn">Upcoming</button> </li>
                    <li><button class="due-btn">due</button></li>

                </ul>

                <!-- unorder list-->
                <div class="lists">Lists</div>
                <ul class="lists-list">
                    <li><button class="personal-btn">Personal</button></li>
                    <li><button class="work-btn" href="work.html">Work</button></li>
                    <li><button class="college-btn" href="college.html">College</button></li>
                </ul>

                
            </aside>

            <div class="todos-list today">

                <h1>Today</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData as $row): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="todos-list upcoming hidden">

                <h1>Upcoming</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData5 as $row5): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row5['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>


            <div class="todos-list due hidden">

                <h1>Due</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData6 as $row6): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row6['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="todos-list personal">

                <h1>personal</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData2 as $row2): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row2['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>


            <div class="todos-list work">

                <h1>Work</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData3 as $row3): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row3['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>


             <div class="todos-list college">

                <h1>College</h1>

                <!-- form to send  the todo-->
                <form method="post" class="todo-form">
                    <!-- input of type text that contains the content of the todo-->
                    <input type="text" name="inp" id="inp" placeholder="+  Add New Task">
                    <input type="submit" id="inpbtn" submit" value="+" class="todo-in-btn">
                </form> 

                <?php foreach ($fetchedData4 as $row4): ?>

                    <div class="todo">
                        <input type="checkbox" name="todo-check" id="todo-check">
                        <span class="todo-title"> 
                            <?php echo htmlspecialchars($row4['title']); ?>
                        </span>
                        <button class="todo-details"> > </button>
                    </div>

                <?php endforeach; ?>

            </div>


            


            <!-- container for editing the todo -->
            <div class="todo-edit">

                <!-- title -->
                <h2>Task</h2>

                <!-- form for any editing inputs-->
                <form method="POST" >
                    <input type="text" name="todo-edit-title" class="todo-edit-title" placeholder="Name of the task">
                    </input>

                    <!-- text area for the todo description-->
                    <textarea type="text" name="todo-edit-description" class="todo-edit-description" placeholder="Description"></textarea>
                    

                    <!-- the list of the todo container-->
                    <div class="todo-edit-list">

                        <!-- label for the input -->
                        <label for="todo-edit-list-select"> List</label>

                        <!-- select element of the lists, and options element inside it-->
                        <select value="personal" name="todo-edit-list-select" id="todo-edit-list-select">
                            <option value="Personal">Personal</option>
                            <option value="work">Work</option>
                            <option value="college">College</option>
                        </select>
                        
                    </div>

                    <!-- selecting the time, we used the type datatime-local as an input-->
                    <div class="todo-edit-time">
                        <label for="dueDateTime">Due time</label>
                        <input type="date" id="dueDateTime" name="dueDateTime">
                    </div>

                    <!-- buttons -->
                    <div class="todo-edit-btns">
                        <input type="reset" class="todo-edit-btn delete-btn"></input>
                        <button class="todo-edit-btn save-btn">Save Changes</button>

                    </div>
                </form>
            </div>

        </div>


         
        <?php include 'footer.php'; ?>

        <script src="../scripts/settings.js"></script>
        <script src="../scripts/app.js"></script>
    </body>

</html>


