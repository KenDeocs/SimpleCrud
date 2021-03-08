
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel</title>

 <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>   
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">


  <!-- /.navbar -->




    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-light">@yield('title')</h1>
          </div><!-- /.col -->

          <!--
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>-->
          
          <!-- /.col -->



        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
       
             <employee></employee>
    
             <div class="container">
        <div class="row justify-content-center">

<div class="col-12">

@include('inc.message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laravel</h3>

              <div class="card-tools">
               <button class="btn-sm btn-success" onclick="window.location.href='/create'">Add Employee <i class="fa fa-user-plus"></i></button>
           </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                 
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                 
                  </thead>
                  <tbody>
                  @if(count($employees) > 0)
                  <?php
                      $get_employee1=1;
                      $get_employee2=1;
                  ?>
                  @foreach($employees as $employee)
                    <tr>
                      <td>{{$employee->id}}</td>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->email}}</td>
                      <td> 
                           @if($employee->gender == 1)
                            Male
                           @else
                            Female
                           @endif  
                       </td>
                   
                      <td>
                          <a href="/update/{{$employee->id}}">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <a href="#"type="button" data-toggle="modal" data-target="#exampleModal{{++$get_employee1}}">
                              <i class="fa fa-trash red"></i>
                          </a>

              <!-- Modal -->
<div class="modal fade" id="exampleModal{{++$get_employee2}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <center><h1>Do you want to delete this employee?</h2>
       {!!Form::open(['action' => ['EmployeeController@destroy',  $employee->id], 'method' => 'POST', 'class' => 'in-line'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Yes', [ 'class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
       </center>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
   
      </div>
    </div>
  </div>
</div>   
                      </td>  
                         </tr>

                    <!-- Button trigger modal -->


  
                     @endforeach    
                     @else
                     <tr>
                     <td colspan="5">No records found</td>
                     </tr>
                     @endif  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
    </div>
    </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}"></script>

@yield('script')
</body>
</html>
