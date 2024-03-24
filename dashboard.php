<?php
    require 'dbInfo.php';

    session_start();

    if ($_SESSION["username"] === null)
    {
        $errorMessage = "Please log in.";
        header("Location: login.php?error=$errorMessage");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>

<body onload="getData(); document.getElementById('addTask').focus();">

    <div class="container">

        <div class="card my-5" style= "border-radius: 1em; background-color: gainsboro;">

            <div class="card-body py-4 px-4 px-md-5">

                <h2 style="text-align: center;">To-Do List <img src="images/icon.png" width="40" height="40" /></h2>

                
                <div class="d-flex justify-content-end mb-3">
                    <?php
                        echo "Logged in as: " . $_SESSION['username'] . "&nbsp | &nbsp";
                    ?>

                    <a href="login.php?loggedOut=true">Log out</a>
                </div>


                <!--===========================-->
                <!--------- Task Input ---------->
                <!--===========================-->
                <div class="row g-3">

                    <!-- 1st Row Start -->
                    <!-- Input task, 12 column wide -->
                    <div class="col-md-12">
                        <label for="addTask" class="form-label visually-hidden">Task to do</label>
                        <input type="text" class="form-control" id="addTask" placeholder="Enter a new task...">
                    </div>

                    <!-- 2nd Row Start -->
                    <div class="col-md-2">
                        &nbsp;
                    </div>

                    <!-- Input date label, 2 columns wide, right justify -->
                    <div class="col-md-2 text-end">
                        <label for="taskdate" class="form-label py-1">Due Date</label>
                    </div>

                    <!-- Input date selector, 2 columns wide -->
                    <div class="col-md-2">
                        <input type="date" class="form-control" id="taskdate">
                    </div>

                    <!-- Spacer -->
                    <div class="col-md-1">
                        &nbsp;
                    </div>

                    <!-- Input priority label, 1 column wide, right justified -->
                    <div class="col-md-1 text-end">
                        <label for="priority" class="form-label py-1">Priority</label>
                    </div>

                    <!-- Input priority selector, 2 columns wide -->
                    <div class="col-md-2">
                        <select class="form-select" id="priority">
                            <option value="High">High</option>
                            <option selected value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>

                    <!-- Add task button, 2 columns wide,right justified -->
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-primary" onclick="addNewTask()">Add Task</button>
                    </div>
                </div> <!-- Task Input End -->

                <!--   Divider   -->
                <hr class="my-4"> 

                <!-- Row for sort button -->
                <div class="row g-3">
                    <div class="col-md-9">
                        &nbsp;
                    </div>

                    <!-- Sort button -->
                    <div class="col-md-3">
                        <button type="button" class="btn btn-info" id="sortButton" onclick="sortList()">Sort List</button>
                    </div>
                </div> 

                <!--===========================-->
                <!--------- To Do List ---------->
                <!--===========================-->
                <!-- Table Headers -->
                <div class="pt-4">
                    Done
                    <div class="d-inline position-absolute" style="left: 10em;">Task</div>
                    <div class="d-inline position-absolute" style="right: 12em;">Due Date</div>
                    <div class="d-inline position-absolute" style="right: 6.7em;">Priority</div>
                    <div class="d-inline position-absolute" style="right: 3em;">Delete</div>
                </div>

                <!-- Tasks will be added into this list -->
                <ul id="todoList" class="list-group pt-2">
                    
                </ul>

            </div> <!-- Card-body end -->
        </div> <!-- Card end -->
    </div> <!-- Container end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

        /******************************************** Document Elements ************************************************/
        const inputBox = document.getElementById("addTask");         // Text input box
        const selectPriority = document.getElementById("priority");  // Priority dropdown
        const taskDate = document.getElementById("taskdate");        // Date input box

        const theList = document.getElementById("todoList");         // The to-do list (ul)


        /************************************************** Functions **************************************************/

        //****************************************************************
        //  addNewTask() - Function that adds a task to the to-do list,
        //                 Called when "Add Task" button is clicked
        //****************************************************************
        function addNewTask()
        {
            // Check if task or date is empty
            if (inputBox.value === '')
            {
                alert("Please input a new task!");
                inputBox.focus();
            }
            else if (taskDate.value === '')
            {
                alert("Please input a task date!");
                taskDate.focus();
            }
            else
            {
                // If not empty, add the task, date and priority to an li and append to the to-do list (ul)
                let li = document.createElement("li");
                li.innerHTML = inputBox.value;  // Add inputbox text
                li.className = selectPriority.value + " list-group-item px-5";  // Add priority to class: High, Medium, Low (for sorting, NOT the actual priority text)
                theList.appendChild(li);

                // Add task date to li created above
                let addDate = document.createElement("div");
                addDate.className = 'dateclass';
                addDate.innerHTML = taskDate.value;
                li.appendChild(addDate);

                // Add the priority text to the li above High, Low, add character to the right to make it shift to the middle
                let addPriority = document.createElement("div");
                addPriority.className = 'priorityclass';
                if (selectPriority.value === "High")
                    addPriority.innerHTML = "High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; // High, add space
                else if (selectPriority.value === "Medium")
                    addPriority.innerHTML = "Medium";  // No need for change in spacing
                else if (selectPriority.value === "Low")
                    addPriority.innerHTML = "Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  // Low, add space
                li.appendChild(addPriority);

                // Add delete button to the li
                let addDel = document.createElement("div");
                addDel.className = 'delclass';
                addDel.innerHTML = '<img src="images/delete.png" width="28" height="28" onclick=deleteTask(this)>'
                li.appendChild(addDel);

                inputBox.value = ''; // Clear the input task box
                inputBox.focus();    // Focus on the input task box
                saveData();          // Save data to local storage
            }
        }


        //****************************************************************************************************************************
        //  deleteTask(deleteImage) - Function that deletes a task from the to-do list, takes in the specific image as a parameter
        //                            Called when the "x button" (image with an x on it) beside any task is clicked
        //****************************************************************************************************************************
        function deleteTask(deleteImage)
        {
            // Remove the task from list by deleting the grandparent li element from the image clicked (li > div > img)
            (deleteImage.parentElement).parentElement.remove(); 
            saveData();          // Save data to local storage
        }


        //****************************************************************************************************************************
        //  Event listener that listens for clicks on a task marks the clicked task as done
        //****************************************************************************************************************************
        theList.addEventListener("click", function (event)
        {
            // If li element is clicked, give it the checked class for CSS
            if (event.target.tagName === "LI") 
                event.target.classList.toggle("checked");   
            saveData();          // Save data to local storage
        }, false);


        //*****************************************************************************
        //  sortList() - Function that sorts the list by priority using bubble sort, 
        //               Called when the "Sort List" button is clicked
        //*****************************************************************************
        function sortList()
        {
            var listItems, switching, needToSwitch;

            switching = true;

            // Loop until no switching has been done
            while (switching)
            {
                // Assume that no switches need to be made on the current iteration
                switching = false;

                // Get all the tasks (li elements) in the todo list (ul)
                listItems = theList.getElementsByTagName("LI");

                // Loop through all tasks
                for ( var i = 0; i < ( listItems.length - 1); i++)
                {
                    needToSwitch = false;

                    // If the next tasks's priority is higher, mark that a swap must be made, break out of the task loop and swap the two tasks
                    if ( ( listItems[i].className.includes("Low") && !listItems[i + 1].className.includes("Low") ) ||
                        ( listItems[i].className.includes("Medium") && listItems[i + 1].className.includes("High") ) )
                    {
                        needToSwitch = true;
                        break;
                    }
                }

                // If a swap was marked, swap the tasks and go through the entire loop again (by marking switching as true)
                if (needToSwitch)
                {
                    listItems[i].parentNode.insertBefore(listItems[i + 1], listItems[i]);
                    switching = true;
                }
            }
            saveData();          // save data to local storage
        }

        //*****************************************************************************
        //  sortList() - Function that saves the todo list to the database, 
        //               Called whenever the todo list is changed
        //*****************************************************************************
        function saveData()
        {
            localStorage.setItem("ul_data", theList.innerHTML);
            var datatoSave = theList.innerHTML;

            // Create a form dynamically
            var form = document.createElement('form');
            form.method = 'post';
            form.action = 'saveData.php';

            // Create an input field to hold the data
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'data';
            input.value = datatoSave;

            // Append the input field to the form
            form.appendChild(input);

            // Append the form to the document body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }

        //*************************************************************************************
        //  getData() - Function that gets the saved todo list data from the local storage,
        //              Called when the page is loaded
        //*************************************************************************************
        function getData() {
            theList.innerHTML = localStorage.getItem("ul_data");
        }
    </script>

</body>
</html>