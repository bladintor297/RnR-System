@extends('layouts.main')
@section('content')

    <main class="page-wrapper">
        <!-- Page content -->
        <section class="bg-size-cover bg-position-bottom-center bg-repeat-0 py-5 bg-dark" >
          <div class="container pt-5 pb-lg-3">
            <h2 class="h1 text-center pt-1 text-white">
              {{$complain->subject}}
            </h2>
            <div class="row align-items-center pb-1 ">
              <div class="d-flex">
                  <div class="col-md-2"></div>
                  <div class="col-md-8 text-center">
                      <p class="fs-lg text-muted mb-md-0">
                        @if ($complain->status == 2)
                            <span class="ms-2 badge bg-success rounded-pill px-3">Completed</span>
                        @elseif ($complain->status == 1)
                            <span class="ms-2 badge bg-warning rounded-pill px-3">Ongoing</span>
                        @else
                            <span class="ms-2 badge bg-danger rounded-pill px-3">New</span>
                        @endif
                    </p>
                      
                  </div>
                  <div class="col-md-2"></div>

              </div>
              
            </div>
            <div class="row pt-md-2  pb-y pb-md-4">
              <div class="col-xxl-1 col-xl-5 col-lg-6 pt-3 mt-3">
                {{-- <img src="assets/img/services/complain.png" alt=""> --}}
              </div>
              <div class="col-lg-10  pt-5 pt-md-5 pt-lg-3 mt-3 rounded bg-white ">
                <form class="needs-validation p-4" method="POST" action="{{ route('complain.store') }}" novalidate>
                    @csrf
                    <div class="row g-4">
                        <div class="col-sm-3">
                                <label for="fn" class="form-label fs-base">Evidence of Resolution<span class="text-danger"> *</span></label>

                                <img 
                                @if(!$complain->proofOfResolution)
                                    src="{{ asset('assets/img/avatar/default.jpg') }}"
                                @else
                                    src="{{ asset('assets/img/avatar/'.$complain->proofOfResolution) }}" 
                                @endif
                                style="max-height: 20rem; max-width: 15rem; object-fit: cover;" alt="No image attached">

                        </div>
                        <div class="col">
                            <div class="row g-3">
                                <div class="col-8">
                                    <label for="fn" class="form-label fs-base">Full name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control form-control-lg" id="fn" name="name" value="{{ auth()->user()->name }}" disabled>
                                    <div class="invalid-feedback">Please enter your full name!</div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone" class="form-label fs-base">Phone<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="e.g. 0187679929" value="{{$complain->phone}}" disabled>
                                    <div class="invalid-feedback">Please provide a valid phone number!</div>
                                </div>
                                <div class="col-sm-5">
                                    <label for="employeeID" class="form-label fs-base">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="employeeID" name="employeeID" placeholder="e.g. SD0001" value="{{$complain->employeeID}}"  disabled>
                                    <div class="invalid-feedback">Please provide a valid staff ID!</div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="service" class="form-label fs-base">Select a Service <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="service" name="service" disabled>
                                        <option value=""  @if ($complain->service == "hr")
                                            selected
                                        @endif>- Select a service -</option>
                                        <option value="hr" @if ($complain->service == "hr")
                                            selected
                                        @endif>Human Resource</option>
                                        <option value="it" @if ($complain->service == "it")
                                            selected
                                        @endif>Information Technology</option>
                                        <option value="fs" @if ($complain->service == "fs")
                                            selected
                                        @endif>Facility and Service</option>
                                        <!-- Add more service options as needed -->
                                    </select>
                                    <div class="invalid-feedback">Please select a service!</div>
                                </div>
                                <div class="col-12 pb-2">
                                    <label for="subject" class="form-label fs-base">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="subject" name="subject" value="{{$complain->subject}}"  disabled>
                                    <div class="invalid-feedback">Please provide a valid subject!</div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        
                        <div class="col-12 pb-2">
                            <label for="detail" class="form-label fs-base">Report Detail <em>(must be specific)</em><span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-lg" id="detail" name="report_detail" rows="2"  disabled>{{$complain->report_detail}}</textarea>
                            <div class="invalid-feedback">Please provide a valid detail!</div>
                        </div>

                        <div class="col-12 pb-2">
                            <label for="request_detail" class="form-label fs-base">Request Detail</label>
                            <input type="text" class="form-control form-control-lg" id="request_detail" name="request_detail" value="{{$complain->request_detail}}" disabled>
                            <div class="invalid-feedback">Please provide a valid request detail!</div>
                        </div>
                    
                        <div class="col-12 pb-2">
                            <label for="appointment_date" class="form-label fs-base">Appointment Date</label>
                            <input type="date" class="form-control form-control-lg" id="appointment_date" name="appointment_date" value="{{$complain->appointment_date}}" disabled>
                            <div class="invalid-feedback">Please provide a valid appointment date!</div>
                        </div>
                  
                  
                        <div class="col-12">
                        <button type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto">Submit </button>
                        </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
    </main>
@endsection