<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title> 
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
  </head>
  <body style="background-color: #101214b6;">
    <header class="p-2 border-buttom header-bar">
      <div class="container-header">
          <div class="d-flex flex-wrap align-items-center justify-content-start">
              <a href="DashboardWork.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
                  <img src="../images/meIT2.png" alt="" width="170" height="auto" >
              </a>
              <div class="dropdown me-5" >
                <div class="border border-primary rounded-pill d-block link-light text-decoration-none dropdown-toggle p-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: .15rem;" >  
                  <img src="../images/office-building.png" alt="pic" width="37" height="auto" class="rounded-circle">
                </div>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                  <li><a class="dropdown-item" href="enterprise_profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Response</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                </div>
              </div>
          </div>
      </div>
    </header>

    <div class="container">
      <div class="p-4 w-100 rounded-30 bg-white justify-content-center mt-5">
          <div class="row">
            <div class="col">
              <div class="work">
                <label for="TextInput" class="form-label fs-1" >รับสมัครงาน</label>
              </div>
            </div>
          </div>
          
          <form action="recruitment_code.php" method="post">
            <div class="row mt-2">
              <div class="col">
                <label for="job_post_position_id" class="form-label">ตำแหน่งงาน</label>
                <select name="job_post_position_id"  class="form-select">
                  <option selected>-กรุณาเลือก-</option>
                  <option value="Application Network">Application Network</option>
                  <option value="Business Analyst (BA)">Business Analyst (BA)</option>
                  <option value="Data Analysis">Data Analysis</option>
                  <option value="Data Engineer">Data Engineer</option>
                  <option value="Hardware">Hardware</option>
                  <option value="IT Audit">IT Audit</option>
                  <option value="IT Manager/Senior Programme">IT Manager/Senior Programmer</option>
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
                <label for="job_post_employment_type_id" class="form-label">ประเภทการจ้าง</label>
                <select name="job_post_employment_type_id"  class="form-select">
                  <option selected>-กรุณาเลือก-</option>
                  <option value="งานประจำ">งานประจำ</option>
                  <option value="งานพาร์ทไทม์">งานพาร์ทไทม์</option>
                  <option value="ฝึกงาน">ฝึกงาน</option>
                </select>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label for="job_post_open_rate" class="form-label">อัตราที่เปิดรับ</label>
                  <input type="text" name="job_post_open_rate" class="form-control">
                </div>
                <div class="col">
                    <label for="job_post_income" class="form-label">รายได้</label>
                    <input type="text" name="job_post_income" class="form-control">
                    </div>
                </div>
              </div> 
              <div class="row mt-2">
                <div class="col">
                  <label for="job_post_details" class="form-label">รายละเอียดงาน</label>
                  <textarea class="form-control" rows="4" name="job_post_details"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <label for="job_post_skill_id" class="form-label">ทักษะ</label>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="HTML">HTML
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="CSS">CSS
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="JavaScript">JavaScript
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="SQL">SQL
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="PHP">PHP
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="Python">Python
                    </div>
                    <div class="form-check">                    
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="Java">Java
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="Back End">Back End
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="Java">Web page Design
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="MS.Office">MS.Office
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="OS">OS
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="Network">Network
                    </div>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2 rounded-pill mt-4" name="submit">โพสต์งาน</button>
                <a class="btn btn-danger me-md-2 rounded-pill mt-4" href="dashboar_dwork.php" type="button">ยกเลิกโพสต์งาน</a>
              </div> 
            </div>
          </form>
      </div>
    </div>
  </body>
</html>

