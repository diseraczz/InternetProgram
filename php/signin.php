<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOG IN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    <style>
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
    </style>
  </head>

  <body>
    <header class="p-2 border-buttom header-bar" style="position: sticky; top: 0; box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.356); height: 65px;">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="main.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" style="margin-left: 1.05rem ;">
          </a>
          <div class="dropdown" style="margin-right: 2.5rem;">
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../images/man (3).png" alt="mdo" width="40" height="auto" class="rounded-circle" style="border: #86b7fe solid; ">
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownUser1" style="font-size: 1rem;">
              <li><a class="dropdown-item" href="#">My work</a></li>
              <li><a class="dropdown-item" href="user-profile.html">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign Out</a></li>
            </ul>
          </div>
          <ul class="nav nav-pills">
            <a class="btn btn-primary-search" href="main.html" role="button">ค้นหางาน</a>
          </ul>
        </div>
      </div>
    </header>    
    
    <form action="login.php" method="post">
      <div class="container p-4 bg-white mt-100 rounded-30" style="width: 600px;">

        <div class="success text-center mb-3 rounded-25 p-2">
          <img src="../images/meIT2.png" alt="" width="auto" height="130">
        </div>

        <div class="container ">
          <label for="email" class="fs-4"><b>Username</b></label>
          <input class="rounded-25" type="text" placeholder="Enter Username" name="email" required autofocus>

          <label for="password" class="fs-4"><b>Password</b></label>
          <input class="rounded-25" type="password" placeholder="Enter Password" name="password" required>

          <button class="btn btn-lg btn-primary rounded-pill mt-3 w-100" type="submit" name="submit">LOG IN</button>
          
          <div class="text-end d-flex mt-3" style="font-size: 1.rem;">
            <p class="pr-5 font-weight-light">Don't have an account?</p></p>  
            <a href="register.php" class=" px-3" style="color: #bd0058">Register</a>
          </div>
        </div>

      </div>
    </form>
  
  </body>
</html>
