@extends('layouts.main')
@section('content')

    <main class="page-wrapper">
        <!-- Page content -->
        <section class="bg-size-cover bg-position-bottom-center bg-repeat-0 py-5 bg-dark" >
          <div class="container pt-5 pb-lg-3">
            <h2 class="h1 text-center pt-1 text-white">
              NEW COMPLAIN FORM
            </h2>
            <div class="row align-items-center pb-1 ">
              <div class="d-flex">
                  <div class="col-md-2"></div>
                  <div class="col-md-8 text-center">
                      <p class="fs-lg text-muted mb-md-0">
                          "Streamlining Communication and Issue Resolution for a Seamless Workplace.
                          Your Bridge to Effortless Communication and Swift Issue Resolution, Enhancing Workplace Harmony and Efficiency.
                          "
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
                <form class="needs-validation p-4 " method="POST" action="{{ route('complain.store') }}" novalidate>
                  @csrf
                  <div class="row g-4 ">
                    <div class="col-sm-5">
                      <label for="fn" class="form-label fs-base">Full name<span class="text-danger"> *</span></label>
                      <input type="text" class="form-control form-control-lg" id="fn" name="name" value="{{ auth()->user()->name }}" disabled>
                      <div class="invalid-feedback">Please enter your full name!</div>
                    </div>
                    {{-- <div class="col-sm-4">
                      <label for="email" class="form-label fs-base">Email</label>
                      <input type="email" class="form-control form-control-lg" id="email" value="{{ auth()->user()->email }}" disabled>
                      <div class="invalid-feedback">Please provide a valid email address!</div>
                    </div> --}}
                    <div class="col-sm-3">
                      <label for="phone" class="form-label fs-base">Phone<span class="text-danger"> *</span></label>
                      <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="e.g. 0187679929" required>
                      <div class="invalid-feedback">Please provide a valid phone number!</div>
                    </div>
                    <div class="col-sm-4">
                      <label for="employeeID" class="form-label fs-base">Employee ID <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="employeeID" name="employeeID" placeholder="e.g. SD0001" required>
                      <div class="invalid-feedback">Please provide a valid staff ID!</div>
                    </div>
                    <div class="col-sm-4">
                        <label for="service" class="form-label fs-base">Select a Service <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg" id="service" name="service" required>
                            <option value="" disabled selected>- Select a service -</option>
                            <option value="hr">Human Resource</option>
                            <option value="it">Information Technology</option>
                            <option value="fs">Facility and Service</option>
                            <!-- Add more service options as needed -->
                        </select>
                        <div class="invalid-feedback">Please select a service!</div>
                    </div>
                    <div class="col-8 pb-2">
                      <label for="subject" class="form-label fs-base">Subject <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="subject" name="subject" required>
                      <div class="invalid-feedback">Please provide a valid subject!</div>
                    </div>
                  
                    

                    
                    <div class="col-12 pb-2">
                        <label for="detail" class="form-label fs-base">Report Detail <em>(must be specific)</em><span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-lg" id="detail" name="report_detail" rows="2" required></textarea>
                        <div class="invalid-feedback">Please provide a valid detail!</div>
                    </div>

                    <div class="col-12 pb-2">
                      <label for="request_detail" class="form-label fs-base">Request Detail</label>
                      <input type="text" class="form-control form-control-lg" id="request_detail" name="request_detail" >
                      <div class="invalid-feedback">Please provide a valid request detail!</div>
                    </div>
                  
                    <div class="col-12 pb-2">
                        <label for="appointment_date" class="form-label fs-base">Appointment Date</label>
                        <input type="date" class="form-control form-control-lg" id="appointment_date" name="appointment_date" >
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