<?php 

    session_start();
    include_once('functions/functions.php'); 
    $roomdata = new DB_con();
    if ($_SESSION['id'] == "" || $_SESSION['status'] == "user" ) {
        header("location: welcome.php");
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .sidebar{
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0,0,0,0.1);
        }
        @media (max-width: 768px){
            .sidebar{
                top: 11.5rem;
                padding: 0;
            }
        }
        .navbar{
            box-shadow: inset 0-1px 0 0 rgba(0,0,0,0.1);
        }

        @media (min-width: 768px){
            .navbar{
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }
        .sidebar .nav-link{
            color: #333;
        }
        .sidebar .nav-link.active{
            color: #0d6efd;
        }
    </style>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            
            <a href="#" class="navbar-brand" style="font-size:30px;"><i data-feather="pie-chart"></i> PermSub</a>

            <button class="navbar-toggler d-md-none collapsed md-3" type="button" data="collapsed"
            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!--<div class="col-12 col-md-4 col-lg-2" >
            <input type="text" class="form-control form-control-dark" placeholder="ค้นหา" aria-label="Search">
        </div>-->

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-expanded="false">Hello, <?php echo $_SESSION['fname'];?> </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a href="#" class="dropdown-item"> Settings</a></li>
                <li><a href="#" class="dropdown-item"> Messages</a></li>
                <li><a href="logout.php" class="dropdown-item"> Sign Out</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collpase">
                <div class="position-sticky">
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link" aria-current="page"> 
                                <i data-feather="pie-chart"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="insert.php" class="nav-link " aria-current="page"> 
                                <i data-feather="user-plus"></i>
                                <span class="ml-2">Add / เพิ่มสมาชิก</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="edit_room.php" class="nav-link active" aria-current="page"> 
                                <i data-feather="grid"></i>
                                <span class="ml-2">Edit Room</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="nav-link " aria-current="page"> 
                                <i data-feather="trello"></i>
                                <span class="ml-2">Insert / บันทึกมาตร</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="btn btn-sm btn-warning ml-3 mt-2 " aria-current="page"> 
                                <i data-feather="printer"></i>
                                <span class="ml-2">Report</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="btn btn-sm btn-primary ml-3 mt-2 " aria-current="page"> 
                                <i data-feather="database"></i>
                                <span class="ml-2">Back Up</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" href="#">Home</li>
                        <li class="breadcrumb-item active"aria-current="page" href="#">Overview</li>
                    </ol>
                </nav>

                <h1 class="h2">Dashboard</h1>
                <p>This is the homepage of a simple admin interface which is part of a tutorial</p>
                
                <div class="row my-4">
                    
                    <?php
                        $roomdata->pull_room("Nack","001");
                        $roomdata->pull_room("Pim","002");
                        $roomdata->pull_room("Pim","003");
                        $roomdata->pull_room("Pim","004");
                        $roomdata->pull_room("Pim","005");
                        $roomdata->pull_room("Pim","006");
                        $roomdata->pull_room("Pim","007");
                        $roomdata->pull_room("Pim","008");
                        $roomdata->pull_room("Pim","009");
                        $roomdata->pull_room("Pim","010");
                        $roomdata->pull_room("Pim","011");
                        $roomdata->pull_room("Pim","012");
                    ?>
                    
                </div>




                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright &copy; 2021-2022 <a href="https://www.facebook.com/nack.osc/">Nack.OSC</span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary" aria-current="page">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary" >Term and Condition Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary" >Contect</a>
                        </li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>


<?php 

}
?>
    