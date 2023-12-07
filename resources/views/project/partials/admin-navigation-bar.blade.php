<div class='links-sidebar'>
    <div class='link-sidebar'>
      <a href="/dashboard"> <h5> <i class="fa fa-home"></i> Home</h5> </a> 
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
      <form action="{{ route('logout') }}" method="post">
        @csrf
          <a class="link-sidebar logout-link"><h6 ><i class="fa-solid fa-arrow-turn-up"></i> <input type="submit" class="text-white fw-bold" value="LogOut" style="border:none;background-color:inherit"> </h6></a>
      </form>
    </div>
</div>