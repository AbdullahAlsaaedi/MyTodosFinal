<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/30
 -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../global/styles.css">
        <title>MyTodos</title>
    </head>

    <body class="body">
        
         <!-- //////// navigation //////// -->

         <?php include 'header.php'; ?>

        <div class="landing-content">

            <!-- the title of the landing page -->
            <h1>TO-DO LIST AND NOTES APP</h1>

            <!-- paragraph represents the description -->
            <p>Stay organized and keep track of your tasks and important notes with our easy-to-use app. With our
                user-friendly interface, you can create to-do lists, set deadlines, and jot down important notes, all in one
                place. Whether it's for work, school, or your personal life, our app will help you stay on top of your tasks
                and ideas.</p>
                

                <!-- button to send the user to the todo functionality -->
            <button class="starting-button"> <a href="todo1.php">Get Started ! </a></button>

            <!-- a quote -->
            <blockquote>
                "The key to getting ahead is getting <i>started</i>." - Mark Twain
            </blockquote>

            <!-- a footer descripe the authors -->
            <?php include 'footer.php'; ?>



        </div>


        

        <script src="../scripts/settings.js"></script>

    </body>
</html>