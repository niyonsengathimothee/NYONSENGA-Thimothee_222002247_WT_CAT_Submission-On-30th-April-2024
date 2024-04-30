<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    button{
      background-color:blue;
      border: none;
    }
    .forms{
      margin-left: 990px;
    }

  </style>
  
<header>
   

</head>

<body>
  <form class="forms" role="search" action="search.php">
      <input  type="text" placeholder="Search" aria-label="Search">
      <button  type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
  </li>
    </li><br><br><li style="display: inline; margin-right: 10px;"><a href="./home.php">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.php">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.php">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./customer_table.php">CUSTOMER</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./room.php">ROOM</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./payment.php">PAYMENT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./staff.php">STAFF</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./reservation.php">RESERVATION</a>
  </li>
   
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
</body>
</html>