<div class='links-sidebar'>
    <div class='link-sidebar'>
      <a href="{{ route('dashboard') }}"> <h5> <i class="fa fa-home"></i> Home</h5> </a> 
    </div>
    <div class='link-sidebar'>
      <a href="{{ route('projects.index') }}"><h6> <i class="fa-solid fa-diagram-project"></i> Projects</h6> </a>
    </div>
    <div class='link-sidebar'>
      <a href="{{ route('projects.create') }}"><h6> <i class="fa-solid fa-plus"></i> Add Project</h6> </a>
    </div>
    <div class='link-sidebar'>
      <a href="{{ route('tasks.create') }}"><h6> <i class="fa-solid fa-plus"></i> Add Task</h6> </a>
    </div>
    <div class='link-sidebar'>
      <a href="{{ route('users.index') }}"><h6> <i class="fa-solid fa-users"></i> Users</h6> </a>
    </div>
    <div class="link-sidebar">
      <a href="{{ route('users.create') }}"><h6><i class="fa-solid fa-plus"></i> Add User</h6></a>
    </div>
    
    <div class="link-sidebar">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-white" style="background: none;border-style:none">
          <i class="fa-solid fa-right-from-bracket m-2"></i>Logout</button>
      </form>
    </div>
</div>