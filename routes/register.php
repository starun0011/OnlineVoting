<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../img/logo.svg"/>
    <link rel="stylesheet" href="../css/style.css" />
    <title>Register user || Voter App</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <header
      class="h-[15vh] p-5 flex justify-start items-center bg-[#1A73E8] gap-2 px-5"
    >
      <img src="../img/logo.svg" alt="logo" class="h-12 w-12 cursor-pointer" />
      <h1 class="text-base font-bold text-white cursor-pointer">
        Online Voting System
      </h1>
    </header>
    <section id="mainSection" class="flex flex-col w-full h-full">
      <div>
        <h3 class="text-center p-5 text-3xl font-bold">Register User</h3>
      </div>
      <div>
        <form
          action="../api/register.php"
          method="post"
          enctype="multipart/form-data"
          class="flex flex-col md:w-[400px] md:m-auto mx-14 py-12 px-5"
        >
          <input type="text" name="name" placeholder="Enter your name" />
          <input
            type="number"
            name="mobile"
            placeholder="Enter your mobile number"
          />

          <select name="role" class="px-4 ">
            <option value="null">----------------</option>
            <option value="voter">Voter</option>
            <option value="party">Party Member</option>
          </select>
          <div id="file">
            <label for="file" class=" ">Select profile picture: </label>
            <input type="file" name="file" class="" />
          </div>
          <input
            type="password"
            name="password"
            placeholder="Enter your password"
          />
          <input
            type="password"
            name="confirmPassword"
            placeholder="Confirm password"
          />
          <input class="mt-[20px]" type="submit" value="submit" />
          <div>
            <h6 class="text-center text-sm">
              Already registered?
              <a href="../index.php" class="text-blue-800 hover:text-blue-400"
                >Login here</a
              >
            </h6>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>
