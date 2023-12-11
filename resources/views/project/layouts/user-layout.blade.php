<!doctype html>
<html lang="en">
    @include('project.partials.header')
    <body>
      <div class='container'>
        <div row='row'>
            <div class='col-sm-2 col-md-2 side-bar'>
                <div class='ml-5 head'>
                    <h2>Dashboard</h2>
                </div>
                <hr class='mx-auto w-75 head'>
                @include('project.partials.user-navigation-bar')
            </div>    
        </div>
      </div>  
      @yield('user-content')
    

      @include('project.partials.footer')
    </body>
</html>