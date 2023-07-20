<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Imported data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    {{-- @if($error->any())
        <h5 style="color: red">Following Error Exists in your csv file!!</h5>
        {{-- <ol> --}}
            {{-- @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ol> --}}
    {{-- @endif --}} 
   
    
  
    
          
            
                    
        <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                
                <img src="assets/img/logo.png" alt="">
            <span span class="d-none d-lg-block">UPRAISE SACCO</span>
            </a>
        </div>
                
                
            {{-- @endforeach --}}
            <div class="card-body">
                <h5 class="card-title">Imported csv File<span></span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">NIN</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Points</th>
                        <th scope="col">Location</th>
                        <th scope="col">Gender</th>
                    
                     
                    </tr>
                  </thead>
                  @php
                  $i=0;
              @endphp
                  <tbody>
                    @foreach($customers as $customer)
                    <tr> 
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->Name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->NIN}}</td>
                        <td>{{$customer->Amount}}</td>
                        <td>{{$customer->Points}}</td>
                        <td>{{$customer->Location}}</td>
                        <td>{{$customer->Gender}}</td>
                    </tr>

                    @empty($customer)
                   
                    <tr colspan="6">No Customer </tr> 
                    
                    @endempty
                    
                    @endforeach
                    {{-- <tr>
                      <th scope="row"><a href="#">#2147</a></th>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                      <td>$47</td>
                      <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    
                    <tr>
                      <th scope="row"><a href="#">#2049</a></th>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                      <td>$147</td>
                      <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Angus Grady</td>
                      <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                      <td>$67</td>
                      <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                      <td>$165</td>
                      <td><span class="badge bg-success">Approved</span></td>
                    </tr> --}}
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <!-- End Recent Sales -->
          <div>
            {{-- <aside id="sidebar" class="sidebar"> --}}
              <li class="nav-item">
             <a class="nav-link collapsed" href="/home">
              <i class="bi bi-box-arrow-in-left"></i>
              <span>Back</span>
              </a>
                </li></div>
            {{-- </aslide> --}}
</body>
</html>