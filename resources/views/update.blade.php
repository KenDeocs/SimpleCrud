
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
       
   
             <div class="container">
        <div class="row justify-content-center">

<div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Employee</h3>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">  
              <div class="col-sm-12">
              
   
              @include('inc.message')
              {!! Form::open(['action' => ['EmployeeController@update', $get_employees->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="form-group">
                       {{Form::label('name', 'First Name')}}
                       {{Form::text('name', $get_employees->name, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                   </div>

                   <div class="form-group">
                       {{Form::label('email', 'Email')}}
                       {{Form::email('email', $get_employees->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                   </div>
               
                    <div class="form-group">
                            {{Form::label('gender', 'Gender')}}
                            {{Form::select('gender', array('Select Gender' => 'Select Gender','1' => 'Male', '0' => 'Female'), $get_employees->gender, ['class' => 'form-control', 'style' => 'color:#757575;'])}}
                    </div>
                   
                  
                  
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
              </div>
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
