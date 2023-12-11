<div class='links-sidebar'>
    <div class='link-sidebar'>
      <a href="/home"> <h5> <i class="fa fa-home"></i> Home</h5> </a> 
    </div>
    
    <div class="ml-3">
      <form action="/logout" method="post">
        @csrf
          <button class="link-sidebar logout-link"><h6 ><i class="fa-solid fa-arrow-turn-up"></i> <input type="submit" class="text-white fw-bold" value="LogOut" style="border:none;background-color:inherit"> </h6></button>
      </form>
    </div>
</div>