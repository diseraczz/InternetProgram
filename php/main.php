<?php
require_once "connection.php";
$query = mysqli_query($conn, "set char set utf8")
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Smart JOB</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>

  <body>
  <header class="p-2 border-buttom header-bar">
  <div class="container-header">
      <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
              <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
          <div class="dropdown me-5" >
              <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../images/man (3).png" alt="mdo" width="40" height="auto" class="rounded-circle" style="border: #86b7fe solid; ">
              </a>
              <ul class="dropdown-menu " aria-labelledby="dropdownUser1" >
                  <li><a class="dropdown-item" href="user-work.html">My work</a></li>
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
    <div class="container" style="width: 720px;">
      <div class="bg-screen p-5 rounded-10 mt-5" style="height: min-content;">
        <div class="col">
            <div class="align-items-center">
                <h1 style="font-size: 2.7rem;">ค้นหางาน</h1>
            </div>
            <form>
              <div class="row">
                <div class="col">
                    <label for="exampleInputEmail1" class="fs-5 mt-4 text-white">ค้นหางาน</label>
                    <?php
                      $q = (isset($_GET['q']) ? $_GET['q'] : '');

                      $select = (isset($_GET['select']) ? $_GET['select'] : '');

                    ?>
                    <form method="get" class="form-horizontal">
                      <div class="input-group" style="z-index: 0;" >                   
                          <input type="text" name="q" class="form-control" placeholder="ค้นหางาน..." aria-label="Search" aria-describedby="button-addon2" >                     
                          <button type="submit" id="button-addon2" class="btn btn-primary bi bi-search">ค้นหา</button>
                      </div>

                      <div class="row" >
                        <div class="col">
                            <label for="exampleInputEmail1" class="fs-5 mt-4 text-white">ประเภทงาน</label>
                         
                              <select class="form-select" name="select" aria-label="Default select example" style="font-size: 1.1rem;">
                                <option disabled selected>ประเภทงาน</option>
                                <option value="Application Network">Application Network</option>
                                <option value="Business Analyst (BA)">Business Analyst (BA)</option>
                                <option value="Data Analysis">Data Analysis</option>
                                <option value="Data Engineer">Data Engineer</option>
                                <option value="Hardware">Hardware</option>
                                <option value="IT Audit">IT Audit</option>
                                <option value="IT Manager/Senior Programmer">IT Manager/Senior Programmer</option>
                                <option value="IT Project Manager">IT Project Manager</option>
                                <option value="IT Security">IT Security</option>
                                <option value="IT Support Help Desk">IT Support Help Desk</option>
                                <option value="MIS">MIS</option>
                                <option value="Programmer">Programmer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="Software Tester">Software Tester</option>
                                <option value="System Admin">System Admin</option>
                                <option value="System Analyst">System Analyst</option>
                                <option value="System Engineer and Architect">System Engineer and Architect</option>
                                <option value="งาน Mobile Wireless">งาน Mobile Wireless</option>
                                <option value="ดูแลเว็บไซต์ และ SEO">ดูแลเว็บไซต์ และ SEO</option>
                                <option value="ดูแลระบบ Network">ดูแลระบบ Network</option>
                                <option value="ที่ปรึกษาไอที">ที่ปรึกษาไอที</option>
                                <option value="นักออกแบบ UX/UI">นักออกแบบ UX/UI</option>
                              </select>
                     
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="fs-5 mt-4 text-white">ประเภทการจ้าง</label>
                            
                              <select class="form-select" name="g" aria-label="Default select example" style="font-size: 1.1rem;">
                                <option value="" selected>ประเภทการจ้าง</option>
                                <option value="งานประจำ">งานประจำ</option>
                                <option value="งานอิสระ">งานอิสระ</option>
                                <option value="ฝึกงาน">ฝึกงาน</option>
                                <!-- <option value="">งานอิสระ</option>
                                <option value="ฝึกงาน">ฝึกงาน</option> -->
                              </select>
                           
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </form> 
        </div>
      </div>
    </div>
    
    
    <div class="container" style="width: 1200px;">
        <div class="align-items-center bg-screen p-4 rounded-10 mt-5 ">
            <div class="align-items-center">
                <h1 style="font-size: 2.7rem;">งาน</h1>
            </div>
            <div class="work-content gap-4">
            <?php

              $serverName = "localhost";
              $userName = "root";
              $userPassword = "12345678";
              $dbName = "smart_jobs";
   
              $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

              $sql = "SELECT * FROM job_posts WHERE job_post_id LIKE '%$q%' OR job_post_income LIKE '%$q%' OR job_post_employment_type_id LIKE '%$q%' OR job_post_details LIKE '%$q%' OR job_post_skill_id LIKE '%$q%'
              ";
              $sqlss = "SELECT * FROM job_posts 
              INNER JOIN enterprises AS enterprises ON (job_posts.job_post_id=enterprises.enterprise_id) 
              INNER JOIN employment_types AS emploment_types ON (job_posts.job_post_employment_type_id=emploment_types.employment_type_id)
              INNER JOIN positions AS positions ON (job_posts.job_post_position_id=positions.position_id)
              ";

              
             if($_GET["select"] != "" and  $_GET["q"]  != '')
             {
             $sql .= " AND (".$_GET["select"]." LIKE '%".$_GET["q"]."%' ) ";
             } 
             
               
               
              // $objQuery = mysql_query($sql) or die ("Error Query [".$sql."]");

              $query = mysqli_query($conn,$sql);
              // echo '<font color="red">';   
              // echo 'คำค้น = ';
              // echo $_GET['q'];
              // echo '</font>';
              ?>

              <?php
              while($result= mysqli_fetch_array($query,MYSQLI_ASSOC)) 
              {
              ?>

              <tr>
                <div class="col-work p-4 text-white view_data"  name="view" value="view" id="<?php echo $result["job_post_id"]; ?>">
                    <div class="row px-3 pt-1">
                      <div class="col-3 bg-white rounded-circle" style="width: 75px; height: 75px;">
                      </div>
                      <div class="col-9  fs-4 font-weight-bold">
                      งาน 
                        <?php echo $result["position_name"];?>
                      </div>
                    </div>
                    <div class="row pt-2">
                    <td><div class="pt-2 bi bi-people-fill"><?php echo "&emsp;  ".$result["job_post_open_rate"];?>&emsp;  คน</div></td>
                    <td><div class="pt-2 bi bi-currency-dollar"><?php echo "&emsp; " .$result["job_post_income"];?>&emsp; บาท</div></td>
                    <!-- <td><div class="pt-2 "><?php echo "รายละเอียด".$result["details"];?></div></td> -->
                    <td><div class="pt-2 bi bi-clock pre "><?php echo "&emsp;  ".$result["employment_type_name"];?></div></td>
                    <td><div class="pt-2  "><?php echo "เว็บไซต์ :&emsp;  ".$result["enterprise_website"];?></div></td>
                    <td><div class="pt-2 "><?php echo $result["job_type"];?></div></td>
                    </div>
                </div>
              </tr>
              <?php
              }
              ?>
              <!-- </table> -->
              <?php
              mysqli_close($conn);
            ?>
                
            </div>
        </div>
    </div>
  
  <section>
      <div class="modal fade" id="1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered  ">
              <div class="modal-content ">
                  <div class="modal-header">
                      <h5 class="modal-title fs-15" id="exampleModalLabel" >งาน</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <h4>รายละเอียดงาน และ หน้าที่รับผิดชอบ hohohoh22222
                      </h4>


                    
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-confirm">สมัครงาน</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="Modal-confirm" tabindex="-1" aria-labelledby="work-confirm" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered d-flex justify-content-center mt-5" style="max-width: auto; margin: 10rem; ">
              <div class="col-4 modal-content modal-dialog-centered modal-sm modal-fullscreen-sm-down justify-content-center">
                  <div class="modal-body">
                      <div class="row justify-content-center mb-3 px-3" >
                          <img src="../images/checked.png" alt="mdo" width="20" height="auto" class="rounded-circle">
                      </div>
                      <h4 class="fs-15">
                          สมัครงานเรียบร้อย
                      </h4>
                  </div>
                  <div class="row modal-footer justify-content-center ">
                      <a class="btn btn-primary" href="main.html" role="button">กลับหน้าหลัก</a>
                  </div>
              </div>
          </div>
      </div>


      <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
          <div class="modal-content">  
              <!-- <div class="modal-header" id="employee_head">   
                  <h4 class="modal-title"></h4>  
                  
              </div>   -->
              <div class="modal-body" id="employee_detail">
                <h4>รายละเอียดงาน และ หน้าที่รับผิดชอบ hohohoh22222</h4> 
              </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>  
                </div>  
              </div>  
          </div>  
      </div>  
  </section>
  <script>  
 $(document).ready(function(){   
      $(document).on('click', '.view_data', function(){  
           var ids = $(this).attr("id");  
           if(ids != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{ids:ids},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
</body>

</html>
