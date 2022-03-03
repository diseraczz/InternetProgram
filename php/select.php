
<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  </head>
  <body>
    <?php  
      if(isset($_POST["ids"]))  
      {  
        $output = '';
        $serverName = "localhost";
        $userName = "root";
        $userPassword = "12345678";
        $dbName = "smart_jobs";

        $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
        $sql= "SELECT * FROM job_posts WHERE job_post_id = '".$_POST["ids"]."'";  
        //$sql= "SELECT * FROM job_posts 
        //INNER JOIN enterprises AS enterprises ON (job_posts.job_post_id=enterprises.enterprise_id) INNER JOIN employment_types AS emploment_types ON (job_posts.job_post_employment_type_id=emploment_types.employment_type_id)
        //INNER JOIN positions AS positions ON (job_posts.job_post_position_id=positions.position_id)";
        $query = mysqli_query($conn,$sql); 
        $output .= '  
        <div class="table-responsive">  
            <table class="table table-bordered">';  
            while($result= mysqli_fetch_array($query,MYSQLI_ASSOC))  
        {  
            $output .= '  
                  <div class="container " style="max-width: 1600px;">
                    <div class="row row-cols-1 text-start">
                      
                      <div class="col py-3 fs-1 ">งาน '.$result["position_name"].'</div>
                      
                      <div class="col-2 pt-2 bi-people-fill "> &emsp; '.$result["job_post_open_rate"].' &emsp; คน</div>
                      <div class="col-9 pt-2">ประเภทงาน : '.$result["employment_type_name"].'</div>
                      <div class="col-2 pt-2">ชื่อบริษัท : '.$result["enterprise_name_th"].'</div>
                      <div class="col-10 pt-2">อีเมลบริษัท : '.$result["enterprise_email"].'</div>
                      <div class="col-2 pt-2">เงินเดือน : '.$result["job_post_income"].'</div>
                      <div class="col-10 pt-2">เว็ปไซต์ : '.$result["enterprise_website"].'</div>
                    </div>
                    <div class="row row-cols-1 text-start pt-3">
                      <div class="col fs-3">รายละเอียดงาน</div>
                      <div class="col pt-2">'.$result["job_post_details"].'</div>
                    </div>
                  </div>
                  
            ';  
        }  
        $output .= '  
            </table>  
        </div>  
        ';  
        echo $output;  
      }  
    ?>
  <body>
 </html>
