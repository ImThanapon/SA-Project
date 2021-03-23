<?php 
    session_start();
    include_once('functions/functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            color: rgba(0, 0, 0, 0.87);
            font-size: 1.05rem;
            font-family: 'Kanit', sans-serif;
            font-weight: 400;
            line-height: 1.43;
            background-color: #fafafa;
        }
        .top-image {
            background-image: url("img/bg-thai.jpg");
            height: 900px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
            opacity: 0.8;
        }
        .form-log{
            padding-top:5%;
            width: 600px; 
            margin: auto; 
            opacity: 0.9; 
        }
    </style>
</head>
<body>
    <script>
        var rd1;
        var rd2;
        var rd3;
        var rd4;
        var accessories = 0;
        var elcet_price = 0;
        var water_price = 0;
        var sum = 0;
        var status_tv = false;
        var status_tuyen = false;
        var status_cable = false;
        var status_net = false;
        feather.replace()

        function sum(){
            sum = accessories + elcet_price + water_price;
            document.getElementById("printSum").innerHTML = sum.toFixed(2);
        }

        function radioclick() {
            rd1 = document.getElementById("rd1");
            rd2 = document.getElementById("rd2");
            rd3 = document.getElementById("rd3");
            rd4 = document.getElementById("rd4");
            if(rd1.checked==true & status_tv == false){
                accessories=accessories+200;
                status_tv = true;
                sum=sum+200;
            }
            if(rd1.checked==false & status_tv == true){
                accessories=accessories-200;
                status_tv_ = false;
                sum=sum-200
            }
            if(rd2.checked==true & status_tuyen == false){
                accessories=accessories+300;
                status_tv = true;
                sum=sum+300;
            }
            if(rd2.checked==false & status_tuyen == true){
                accessories=accessories-300;
                status_tv_ = false;
                sum=sum-300
            } 
            if(rd3.checked==true){
                accessories=accessories+100;
                sum=sum+accessories;
            }
                
            if(rd4.checked==true){
                accessories=accessories+250;
                sum=sum+accessories;
            }
            document.getElementById("printAccessories").innerHTML = accessories.toFixed(2);
        }
        function electInputFunction() {
            var elcet = document.getElementById("elect-unit").value;
            elcet_price = elcet * 8 ;
            sum=sum+elcet_price;
            document.getElementById("printelect").innerHTML = elcet_price.toFixed(2);
        }
        function waterInputFunction() {
            var water = document.getElementById("water-unit").value;
            water_price = water * 17 ;
            sum=sum+water_price;
            document.getElementById("printwater").innerHTML = water_price.toFixed(2);  
        }
        

    </script>
    <div class="pb-5 bg-index">

        <div class="form-log">
            <div class="card" style="border-radius: 15px;">
                <div class="card-header" style="text-align: center;">
                    <h2>คำนวณ</h2>
                </div>
                <form method="post">
                    <div class="card-body" style="margin-right:25px;">
                        <div class="row" style="margin-top:15px;">
                            <div class="col-4" style="text-align:right;padding-top:7px;">
                                <h5 class="card-title">หมายเลขห้องพัก</h5>                 
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" id="num_room" name="num_room" min="101" max="810" placeholder="กรอกหมายเลขห้อง"required>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-4" style="text-align:right;padding-top:7px;">
                                <h5 class="card-title">อุปกรณ์เสริม  </h5>                   
                            </div>
                            <div class="col-8" style="text-align:left;padding-top:10px;">
                            <input onclick="radioclick()" id="rd1" type="checkbox" class="form-check-input" id="exampleCheck1"> ทีวี (200 บาท)<br>
                            <input onclick="radioclick()" id="rd2" type="checkbox" class="form-check-input" id="exampleCheck1"> ตู้เย็น (300 บาท) <br>
                            <input onclick="radioclick()" id="rd3" type="checkbox" class="form-check-input" id="exampleCheck1"> Cable TV (100 บาท) <br>     
                            <input onclick="radioclick()" id="rd4" type="checkbox" class="form-check-input" id="exampleCheck1"> Internet & Wifi 5G (250 บาท)<br>               
                            </div>
                        </div>-->
                        <div class="row" style="margin-top:15px;">
                            <div class="col-4" style="text-align:right;padding-top:7px;">
                                <h5 class="card-title">หน่วยน้ำ</h5>              
                            </div>
                            <div class="col-8">
                                <input type="number"  step=0.1 class="form-control" id="water-unit" name="water-unit" min="0" max="500" 
                                oninput="waterInputFunction()" placeholder="กรอกหน่วยประปา"required>
                            </div>
                        </div>

                        <div class="row"style="padding-top:15px;">
                            <div class="col-4" style="text-align:right;padding-top:7px;">
                                <h5 class="card-title">หน่วยไฟ</h5>                     
                            </div>
                            <div class="col-8">
                                <input type="number"  step=0.1 class="form-control" id="elect-unit" name="elect-unit" min="0" max="500" 
                                oninput="electInputFunction()" placeholder="กรอกหน่วยไฟฟ้า"required>
                            </div>
                        </div>

                        <div class="row" style="margin-top:15px;">
                            <div class="col-4" style="text-align:right;padding-top:7px;">
                                <h5 class="card-title">ข้อความถึงผู้พัก</h5>                 
                            </div>
                            <div class="col-8">
                                <textarea  type="text" class="form-control" style="height:50px;text-align:top;" id="text_user" name="text_user" placeholder="แสดงความคิดเห็น" ></textarea>
                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                            ค่าน้ำ : <br>
                            ค่าไฟ : <br>
                            อุปกรณ์เสริม : <br>
                            รวมเป็นเงิน : <br>
                            </div>
                            <div class="col-2" style="text-align: right;">
                            <u><span id="printwater"></span></u><br>
                            <u><span id="printelect"></span></u><br>
                            <u><span id="printAccessories"></span></u><br>
                            <u><span id="printSum"></span></u><br>
                            <u><span id="printAccessories"></span></u><br>
                            
                            <!--echo "ราคา : ".number_format($cost,2);-->
                            </div>
                            <div class="col-2" style="text-align: right;">
                            บาท<br>บาท<br>บาท<br>บาท
                            </div>
                        </div>
                        
                       

                        

                        <div class="mt-3" style="text-align: center;">
                            <button onclick="sum()" class="btn btn-dark" >คำนวณเงิน</button>
                        </div>
                            
                        <div class="mt-3" style="text-align: center;">
                            ไปที่หน้า
                            <a href="index.php" style="color: grey;">Home Page </i></a>

                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
<footer style="text-align: center; padding-top:15px;">
            <span>Copyright &copy; 2021-2022 <a href="https://www.facebook.com/me/">Nack.OSC</a><br>เว็บเพจนี้เป็นส่วนหนึ่งของรายวิชา การวิเคราะห์และออกแบบระบบสารสนเทศ Information System Analysis and Design รหัสวิชา 02739323</span>
            <p>จัดทำโดย <u>นายธนพล วิเศษสังข์</u> รหัสนิสิต <u>6121600233</u> เลขที่ 3</p>
</footer>

</html>


