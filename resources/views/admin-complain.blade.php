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
                  <h1 class="h2 mb-sm-0">All Complains</h1>
                </div>
                
                @if (count($complains)>0)
                    @foreach ($complains as $complain)
                        <!-- Item -->
                        <div class="card border-0 shadow-sm overflow-hidden mb-4">
                            <div class="card border-0 shadow-sm overflow-hidden mb-4">
                                <div class="row g-0">
                                    <div class="col-sm-4">
                                        <div class="text-center pt-5">
                                            <div class="d-table position-relative mx-auto mb-3">
                                                <form action="{{ route('complain.update', ['complain' => $complain]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT') 
                                                    <img 
                                                    @if(!$complain->proofOfResolution)
                                                        src="assets/img/avatar/default.jpg"
                                                    @else
                                                        src="assets/img/avatar/{{$complain->proofOfResolution}}"
                                                    @endif
                                                    
                                                    id="proofOfResolution-{{$complain->id}}" class="d-block h-100 " style="object-fit: cover; max-height: 20rem;" alt="John Doe">
                                                    
                                                    <div class="position-relative">
                                                        <input type="file" id="imageUploadInput-{{$complain->id}}" name="image_proof" style="display: none;" accept="image/*">
                            
                                                        <button type="button" id="changePictureBtn-{{$complain->id}}" class="changePictureBtn btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 start-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture">
                                                            <i class="bx bx-refresh"></i>
                                                        </button>
                                                        
                                                        <!-- Save button -->
                                                        <button type="submit" id="savePictureBtn-{{$complain->id}}" class="btn btn-success px-2 btn-sm rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Save picture">
                                                            <i class="bx bx-save"></i>
                                                        </button>
                            
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <a href="#" class="col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url({{ asset('assets/img/account/'.$complain->service.'.png') }}); min-height: 13rem;"></a> --}}
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
                                        <p  align="justify"><b>Request Detail: </b>{{$complain->request_detail}}</p>
                                        <p class="mb-4" align="justify"><b>Feedback: </b><span class="badge bg-primary px-2 ms-1 ">{{$complain->feedback}}</span></p>
                                        <div class="d-flex">
                                            <a href="{{ route('complain.show', ['complain' => $complain->id]) }}" class="btn btn-outline-primary px-3 px-lg-4 me-3">
                                                <i class="bx bxs-file-blank fs-xl me-xl-2"></i>
                                                <span class="d-none d-xl-inline">View</span>
                                            </a>
                                            
                                            <a href="#" class="btn btn-outline-danger px-3 px-lg-4 me-3" data-bs-toggle="modal" data-bs-target="#feedbackModal{{$complain->id}}">
                                                <i class="bx bx-edit fs-xl me-xl-2"></i>
                                                <span class="d-none d-xl-inline">Feedback</span>
                                            </a>
                                            
                                            {{-- Feedback Modal --}}
                                            <div class="modal fade" id="feedbackModal{{$complain->id}}" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="feedbackModalLabel">Feedback Form</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                            
                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form action="{{ route('complain.update', ['complain' => $complain]) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                            
                                                                <!-- Add your feedback input fields here -->
                                                                <div class="form-group">
                                                                    <label for="feedback">Feedback</label>
                                                                    <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
                                                                </div>
                                            
                                                                <!-- Add any other form fields you need -->
                                            
                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
            
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
                        </div>
                    @endforeach
                @else
                        <p>No complain recorded</p>
                    
                @endif
                
                
  
              </div>
            </div>
          </div>
        </section>
    </main>

@endsection