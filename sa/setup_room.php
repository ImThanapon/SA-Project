<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="top-image">
        <div class="form-log">
            <div class="card" style="border-radius: 15px;">
                <div class="card-header" style="text-align: center;">
                    <h2>Setup System</h2>
                </div>
                <div style="margin-top:20px; margin-right:20px; margin-bottom:20px; margin-left:20px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" href="#">รายละเอียดหอพัก</li></li>
                    </ol>
                </nav>

                <div class="row ">
                    <form method="post">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">จำนวนห้องพัก</label>
                                <input type="text" class="form-control" id="username" name="fullname" required>
                            </div>
                            <div class="mb-3">
                            <label for="email" class="form-label">ราคาค่าน้ำประปาต่อหน่วย</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">ราคาค่าไฟฟ้าต่อหน่วย</label>
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                            


                            <button type="submit" name="insert" id="insert" class="btn btn-block btn-primary">กำหนด</button>
                    </form>
                </div>
                </div>
                
            </div>
        </div>
        
    </div>

    
    <script>
        feather.replace()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
<footer style="text-align: center; padding-top:15px;">
            <span>Copyright &copy; 2021-2022 <a href="https://www.facebook.com/me/">Nack.OSC</a><br>เว็บเพจนี้เป็นส่วนหนึ่งของรายวิชา การวิเคราะห์และออกแบบระบบสารสนเทศ Information System Analysis and Design รหัสวิชา 02739323</span>
            <p>จัดทำโดย นายธนพล วิเศษสังข์ รหัสนิสิต 6121600233 เลขที่ 3</p>
</footer>

</html>


