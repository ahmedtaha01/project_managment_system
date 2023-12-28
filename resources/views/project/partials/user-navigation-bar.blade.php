<div class='links-sidebar'>
    <div class='link-sidebar'>
      <a href="{{ route('user.home') }}"> <h5> <i class="fa fa-home"></i> Home</h5> </a> 
    </div>
    
    <div class="link-sidebar">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-white" style="background: none;border-style:none">
          <i class="fa-solid fa-right-from-bracket m-2"></i>Logout</button>
      </form>
    </div>
</div>