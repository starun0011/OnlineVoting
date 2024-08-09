<?php
session_start();
if (!isset($_SESSION['userData'])) {
  header("location:../index.php");
} 
$groupData = $_SESSION['groupData'];
$user = $_SESSION['userData'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../img/logo.svg" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <title>Home || Voter App</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body{
      height: 100%;
    }
    #mainSection {
      background-color: whitesmoke;
    }

    .active {
      display: none;
    }
  </style>
</head>

<body>
  <header class="flex justify-between items-center px-5  bg-[#1A73E8] ">
    <div class="h-[15vh] flex justify-start items-center bg-[#1A73E8] gap-2 ">
      <img src="../img/logo.svg" alt="logo" class="h-10 sm:h-12  cursor-pointer" />
      <h1 class="text-sm sm:text-base font-bold text-white cursor-pointer">
        Online Voting System
      </h1>
    </div>
    <!-- <div>
      <button onclick="active()" id="menubtn" class=""><i class="fa-solid fa-bars text-2xl text-white"></i></button>
      <button onclick="active()" id="menubtn" class=""><i class="fa-solid fa-xmark text-2xl text-white"></i></button>

    </div> -->
    <div>
      <a href="../api/logout.php"><button class="px-4 py-2 bg-blue-500 rounded-2xl hover:bg-blue-600 text-white">Log out</button></a>
    </div>
  </header>
  <section id="mainSection" class="flex flex-col items-center px-10 sm:px-0 sm:flex-row sm:items-start w-full h-full">

    <div id="profile" class=" w-full sm:w-[400px] md:w-[500px] sm:h-screen  sm:shadow-xl border-b border-black sm:border-b-none  py-5 ">
      <div class="flex  items-center justify-evenly px-7 ">

        <h1 class="text-2xl font-bold">User Profile</h1>
        <img id="profileImage" src="../uploads/<?php echo $user["picture"]; ?>" alt="profile" class="h-16 w-16   rounded-[50%]" />

      </div>

      <div class="flex flex-col  px-10 sm:px-3 pt-5 gap-5">
        <p><b>Name: </b> <?php echo $user["name"]; ?></p>
        <p><b>Mobile: </b><?php echo $user["mobile"]; ?> </p>
        <p><b>Role:</b> <?php echo $user["role"]; ?></p>
        <p><b>Status: </b><?php
                          if ($user["status"] == 1) {
                            echo '<span class="font-bold text-green-500">Voted</span>';
                          } else {
                            echo '<span class="font-bold text-red-500">Not voted</span>';
                          }
                          ?></p>
      </div>
    </div>
    <div id="groups" class="w-full flex items-center flex-col sm:ml-5  p-5">
      <?php
      if($groupData){
        foreach($groupData as $group){
          ?>
            <div id="groupPanel" class="flex justify-between p-5  w-full border-b-2 border-slate-400">
              <div class="flex flex-col gap-5">
              <p><b>Party Name: </b> <?php echo $group["name"]; ?></p>
              <p><b>Votes: </b> <?php echo $group["votes"]; ?></p>
              <form action="../api/voting.php" method="POST">
                <?php
                if($user["status"]==0){
                 ?>
                <input type="hidden" name="gvotes" value="<?php echo $group["votes"]?>">
                <input type="hidden" name="gmobile" value="<?php echo $group["mobile"] ?>">
                <input type="submit" value="Vote" class="px-6 py-2 rounded-[15px] font-bold bg-blue-600 hover:bg-blue-800 text-white">
                  <?php
                }
                else{
                  ?>
                  <button disabled class="px-6 py-2 rounded-[15px] font-bold bg-green-600 hover:bg-green-800 text-white">Voted</button>
                  
                  <?php
                }
                ?>
              </form>
              
              </div>
              <div><img src="../uploads/<?php echo $group["picture"];?>" alt="profile" class="h-16 w-16 rounded-[50%]"></div>
              
            </div>
          <?php

        }

      }
      else{
        ?>
        <p class="text-2xl font-bold">No groups found!</p>
        <?php
      }
      
      
      ?>
    </div>
  </section>

  <script>
    const active = () => {
      let menu = document.getElementById('menubtn');
      menu.classList.toggle("active");
    }
  </script>
</body>

</html>