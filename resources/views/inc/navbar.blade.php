<div class="d-flex justify-content-between bg-dark fixed-top nav">
  @auth
    <div class="d-flex justify-content-start header">
      <a href="{{ url()->previous() }}" class="btn btn-primary px-3  m-3"> <i class="bx bxs-chevron-left"></i></a>
      <span class="px-3 m-3 text-white my-auto title" style="font-size: 1rem"><b>REPORT AND REQUEST SYSTEM</b></span>
    </div>
    <div>
      <span class="px-3 m-3 text-white my-auto user" style="font-size: 1rem">
        <b>
          Hi 
          @if (Auth()->user()->role == 0)
              {{Auth()->user()->name}}
          @else
              Admin
          @endif
        </b>
        !
      </span>
      <a href="/signout" class="btn btn-primary btn-sm m-3 logout">Logout</a>
      
    </div>
  @endauth
</div>

<style>
@media (max-width: 768px) {
    .header .title {
        font-size: 0.8rem !important;
        padding: 0 !important;
    }

    .header a{
      font-size: 0.7rem !important;
      padding: 0 3px !important;
      margin: 10px 10px 10px 10px !important;
    }

    .logout {
      font-size: 0.7rem !important;
      padding: 0 0.5rem !important;
      margin: 10px 10px 10px 10px !important;
    }

    .user{
      display: none;
    }

}
</style>