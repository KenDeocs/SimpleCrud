<template>
    <div class="container">
        <div class="row justify-content-center">

<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laravel with Vue JS</h3>

              <div class="card-tools">
               <button class="btn-sm btn-success" @click="addEmployee()">Add Employee <i class="fa fa-user-plus"></i></button>
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
                    <tr v-if="employees < 1">
                             <td colspan="5">No records found</td>
                          </tr>    
                    <tr v-for="employee in employees" :key="employee.id">
                      <td>{{ employee.id }}</td>
                      <td>{{ employee.name }}</td>
                      <td>{{ employee.email }}</td>
                      <td v-if="employee.gender == 1"> Male </td>
                      <td v-else>Female</td>
                      <td>
                          <a href="#" @click="updateEmployeeModal(employee)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <a href="#" @click="deleteEmployee(employee.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>  
                         </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
    </div>

           <!--Modal-->



<div class="modal fade" id="PopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmode ? updateEmployee() : createEmployee()">




       <div class="modal-body">
        <div class="row">

       <div class="col-sm-12">

         <div class="form-group">
        <label for="name">Name:</label><br>
        <input type="text" name="name" v-model="form.name"  width="100%" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
        <has-error :form="form" field="name"></has-error>
        </div>

        <div class="form-group">
         <label for="email">Email:</label><br>
         <input type="email" name="email" v-model="form.email"  width="100%" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
         <has-error :form="form" field="email"></has-error>
        </div>


         <div class="form-group">
        <label for="gender">Gender:</label><br>
                <select class="form-control " name="gender" v-model="form.gender"  width="100%" :class="{ 'is-invalid': form.errors.has('gender') }">
                                    <option value="" style="color:grey;">Select Gender</option>
                                    <option value="1" style="color:grey;">Male</option>         
                                    <option value="0" style="color:grey;">Female</option>
                                                        
                </select>

        <has-error :form="form" field="gender"></has-error>
        </div>

                   

     


        </div>
      </div>
     </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>

    </div>
</template>

<script>
    export default {
      data(){
        return{
          editmode: false,
          employees: {}, 
          form: new Form ({
             id: '',
             name: '',
             email: '',
             gender: ''
          })
        }
      },
      methods:{
       getEmployees(){
          axios.get('/api/employee').then(({data}) => ( this.employees = data))
       },
       addEmployee(){
          $('#PopModal').modal('show');
          this.editmode = false;
          this.form.reset();
       },
       createEmployee(){
                        this.form.post('/api/employee').then(()=> {

                  $('#PopModal').modal('hide');

                   toast.fire({
                    icon: 'success',
                    title: 'Employee successfully Created'
                   });
                   TRIGGER.$emit('AfterAction');
                  this.new_user.reset();
                  this.register = false;
              })
              .catch(() => {

              });
       },

       deleteEmployee(id){

   swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
   }).then((result) => {

       if(result.value){
         this.form.delete('/api/employee/'+id).then(()=>{
           swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success'
           )
         TRIGGER.$emit('AfterAction');
         })
       
         .catch(()=>{
           swal.fire("Failed!", "There was something wrong.", "warning")
         })
         }
     })
       },
       updateEmployeeModal(employee){
        this.editmode = true;
        $('#PopModal').modal('show');
        this.form.fill(employee);
       }, 
       updateEmployee(){
              this.form.put('api/employee/'+this.form.id)
      .then(()=>{

        TRIGGER.$emit('AfterAction');
       $('#PopModal').modal('hide');

       toast.fire({
       icon: 'success',
       title: 'Employee successfully updated'
       }) 

        })
             .catch(()=>{
        this.$Progress.fail();
          });


       }
      },
        mounted() {
            this.getEmployees();

            TRIGGER.$on('AfterAction', () =>{
             this.getEmployees();
            });
    }
    }
</script>
