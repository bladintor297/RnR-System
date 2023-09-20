@extends('layouts.main')
@section('content')

    <main class="page-wrapper">
        <!-- Page content -->
        <section class="container pt-5">
          <div class="row">
            <!-- Account collections -->
            <div class="col-md-12  pb-5 mb-lg-2 pt-md-5 mt-n3 mt-md-0">
              <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
                <div class="d-sm-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-3">
                  <h1 class="h2 mb-sm-0">My Complains</h1>
                </div>
  
                @if(count($complains)>0)
                @foreach ($complains as $complain)
                    <!-- Item -->
                    <div class="card border-0 shadow-sm overflow-hidden mb-4">
                        <div class="row g-0">
                        <a href="#" class="col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url({{ asset('assets/img/account/'.$complain->service.'.png') }}); min-height: 13rem;"></a>
                        <div class="col-sm-8">
                            <div class="card-body">
                            <div class="fs-sm text-muted mb-1">
                                {{date('M d, Y', strtotime($complain->created_at))}}

                                @if ($complain->status == 2)
                                  <span class="ms-2 badge bg-success rounded-pill px-3">Completed</span>
                                @elseif ($complain->status == 1)
                                  <span class="ms-2 badge bg-warning rounded-pill px-3">Ongoing</span>
                                @else
                                  <span class="ms-2 badge bg-danger rounded-pill px-3">New</span>
                                @endif

                            </div>
                            <h2 class="h4 pb-1 mb-2">
                                <a href="{{ route('complain.show', ['complain' => $complain->id]) }}">{{$complain->subject}}</a>
                            </h2>
                            <p  align="justify">{{$complain->report_detail}}</p>
                            <p class="" align="justify"><b>Request Detail: </b>{{$complain->request_detail}}</p>
                            <p class="mb-4" align="justify"><b>Feedback: </b><span class="badge bg-primary rounded-pill px-2">{{$complain->feedback}}</span></p>
                            <div class="d-flex">
                                <a href="{{ route('complain.show', ['complain' => $complain->id]) }}" class="btn btn-outline-primary px-3 px-lg-4 me-3">
                                    <i class="bx bx-edit fs-xl me-xl-2"></i>
                                    <span class="d-none d-xl-inline">View</span>
                                </a>

                                <a  href="{{ route('complain.edit', ['complain' => $complain->id]) }}" class="btn btn-success px-3 px-lg-4 
                                  @if ($complain->status === 2)
                                    disabled
                                  @endif
                                  "
                                
                                >
                                    <i class="bx bx-power-off fs-xl me-xl-2"></i>
                                    <span class="d-none d-xl-inline">Resolved</span>
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach

                @else
                <p>No complains recorded</p>
                @endif
                
  
              </div>
            </div>
          </div>
        </section>
    </main>

@endsection