<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {font-family: Arial;}

        
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        .tab button:hover {
        background-color: #ddd;
        }

        .tab button.active {
        background-color: #ccc;
        }

        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        }
        </style>
        </head>
        <body>
            <style>
                fieldset{
                    text-align: right;
                    border: 1px solid rgb(255,2,57);
                    width: 1300px;
                    margin: auto;
                    horizontal-align:right;
                }
            
            </style>
            <fieldset>      
                <label >Logged as</label>
                <label ><?php echo $_SESSION["firstname"] .' '.$_SESSION["lastname"] ; ?></label>
                <br>
            </fieldset>
        <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'searchUsers')">Search Users</button>
        <button class="tablinks" onclick="openTab(event, 'viewUsers')">View Users</button>
        <button class="tablinks" onclick="openTab(event, 'searchBirthdays')">Search Birthdays</button>
        <button class="tablinks" onclick="openTab(event, 'upcomingbirthday')">Upcoming Birthdays</button>
        <button class="tablinks" onclick="openTab(event, 'organizeTreats')">Organize Treats</button>
        <button class="tablinks" onclick="openTab(event, 'manageOrganizers')">Manage Organizers</button> 
        <button class="tablinks" onclick="openTab(event, 'logout')">Log Out</button>
    
        </div>

        <div id="searchUsers" class="tabcontent">
            <h3>Search Users</h3>
            <form method="POST" action="searchbirthday.php" name="SearchByName">
                <label>First Name</label>
                <input type="text" name="txtName" id="name"> 
                <input type="submit" value="submit"><br><br>

            </form>
        </div>

        <div id="viewUsers" class="tabcontent">
            <form method="GET" action="listUsers.php" name="listUsers">
                <input type="submit" value="Show all"><br><br>
            </form>
        </div>

        <div id="searchBirthdays" class="tabcontent">
            <form method="POST" action="searchdob_date.php" name="SearchBYDate">
                <label>Birthday</label>
                <input type="date" name="txtDate" id="datees"> 
                <input type="submit" value="Search by Date"><br><br>
            </form>
        </div>

        <div id="upcomingbirthday" class="tabcontent">
            <form name="xxx">
                <li><a href="today.php">Today birthdays</a></li>
                <li><a href="tomorrow.php">Birthdays in tomorrow</a></li>
                <li><a href="dayaftertomorrow.php">Birthdays in day after tomorrow</a></li>
                <li><a href="nextweek.php">Birthdays in next week</a></li>   
            </form>
        </div>

        <div id="organizeTreats" class="tabcontent">
            <form name="xxx">
                <input type="date" name="txtDate" id="datees"> 

            </form>
        </div>

        <div id="manageOrganizers" class="tabcontent">
            <form name="xxx">


            </form>
        </div>

        <div id="logout" class="tabcontent">
            <li><a href="index.html">Logout</a></li>
        </div>
        

        <script>
            function openTab(evt, getTab) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(getTab).style.display = "block";
            evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html> 
