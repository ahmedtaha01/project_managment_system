<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha386-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title><?= (isset($title))? $title : 'home'; ?></title>
    </head>
    <body>
      <div class='container'>
        <div row='row'>
            <div class='col-sm-2 col-md-2 side-bar'>
                <div class='ml-5 head'>
                    <h2>Dashboard</h2>
                </div>
                <hr class='mx-auto w-75 head'>
                <div class='links-sidebar'>
                    <div class='link-sidebar'>
                      <a href="/adminDashboard"> <h5> <i class="fa fa-home"></i> Home</h5> </a> 
                    </div>
                    <div class='link-sidebar'>
                      <a href="/projects"><h6> <i class="fa-solid fa-diagram-project"></i> Projects</h6> </a>
                    </div>
                    <div class='link-sidebar'>
                      <a href="/project"><h6> <i class="fa-solid fa-plus"></i> Add Project</h6> </a>
                    </div>
                    <div class='link-sidebar'>
                      <a href="/task"><h6> <i class="fa-solid fa-plus"></i> Add Task</h6> </a>
                    </div>
                    <div class='link-sidebar'>
                      <a href="/user"><h6> <i class="fa-solid fa-users"></i> Users</h6> </a>
                    </div>
                    <div class="link-sidebar">
                      <a href="#"><h6><i class="fa-solid fa-address-card"></i> About</h6></a>
                    </div>
                    
                    <div class="ml-3">
                      <form action="/logout" method="post">
                        @csrf
                          <a class="link-sidebar logout-link"><h6 ><i class="fa-solid fa-arrow-turn-up"></i> <input type="submit" class="text-white fw-bold" value="LogOut" style="border:none;background-color:inherit"> </h6></a>
                      </form>
                    </div>
                </div>
            </div>    
        </div>
      </div>  
      @yield('adminContent')
    


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha386-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp6YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
