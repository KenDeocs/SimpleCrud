@if(count($errors) > 0)
 @foreach ($errors->all() as $error)
 
     
     <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            
                 {{$error}}
                </div>
 @endforeach
@endif

@if(session('success'))

     <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h5><i class="icon fas fa-check"></i>
                  {{session('success')}}
                </div>

@endif

@if(session('error'))

         <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                 {{session('error')}}
                </div>
    
@endif