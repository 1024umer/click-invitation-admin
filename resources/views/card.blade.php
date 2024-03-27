 <title>Click Invitations - Users</title>
 @include('header');
 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-body">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <h4>Users</h4>
                             <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"
                                 data-target="#AddNewUserModal">
                                 <i data-feather="plus"></i>Add
                             </button>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped" id="table-1">
                                     <thead>
                                         <tr class="text-center">
                                             <th>ID</th>
                                             <th>Event Name</th>
                                             <th>Type</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($cards as $value)
                                             <tr class="text-center">
                                                 <td>{{ $value->id }}</td>
                                                 <td>{{ $value->title }}</td>
                                                 <td>{{ $value->type }}</td>
                                                 <td class="d-flex justify-content-center align-items-center">
                                                     {{-- <a href="#"
                                                         onclick="getuserDatafromDB('{{ $value->id }}')"
                                                         data-id="{{ $value->id }}" data-toggle="modal"
                                                         data-target=".bd-example-modal-lg"
                                                         class="btn btn-primary">Details</a> --}}
                                                     <button type="button" data-id="{{ $value->id }}"
                                                         onclick="deleteUserfromDB('{{ $value->id }}')"
                                                         class="btn btn-danger ml-2 text-white delete">Delete</button>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>

 <!--Add User Modal -->
 <div class="modal fade" id="AddNewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cross">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" action="{{ route('card.store') }}" enctype="multipart/form-data" id="adduser">
                     {{ csrf_field() }}
                     <div class="form-row">
                         <div class="col-6">
                             <label for="surname">Surname</label>
                             <select name="id_eventtype" class="form-control" id="">
                                 @foreach ($events as $item)
                                     <option value="{{ $item->id_eventtype }}">{{ $item->title }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-6">
                             <label for="surname">Surname</label>
                             <select name="type" class="form-control" id="">
                                 <option value="background">Background</option>
                                 <option value="card">Card</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-6">
                             <input type="file" name="img" class="form-control">
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal"
                             id="close">Close</button>
                         <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 {{-- Delete Modal --}}

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" id="deleteModal"
     aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="deleteModalLabel" style="color:black ">Delete User</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" id="deletecross">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>Are you sure you want to delete this user?</p>
                 <input type="hidden" id="delete_id">
                 <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal" id="deleteclose">No</button>
                 <button type="button" id="deletebtn" class="btn btn-danger">Yes</button>
             </div>
         </div>
     </div>
 </div>


 @include('footer')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     $('#adduser').submit(function() {
         swal({
             title: 'Success',
             icon: 'success',
             text: 'New User Added',
         })
     })

     function getuserDatafromDB(value) {
         console.log("this.responseText");
         const xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 console.log(this.responseText);
                 let res = JSON.parse(this.responseText);
                 res = res[0];
                 document.getElementById('get_id').value = res.id;
                 document.getElementById('get_name').value = res.name;
                 document.getElementById('get_surname').value = res.surname;
                 document.getElementById('get_email').value = res.email;
                 document.getElementById('get_phone').value = res.phone;
                 document.getElementById('get_language').value = res.language;
                 document.getElementById('get_active').options[res.active].selected = true;
                 document.getElementById('get_last_login').value = res.last_login;
                 document.getElementById('get_address').value = res.address;
                 document.getElementById('get_company').value = res.company;
                 document.getElementById('get_country').value = res.country;
                 document.getElementById('get_province').value = res.province;
                 document.getElementById('get_city').value = res.city;
                 document.getElementById('get_trial').options[res.trail].selected = true;
                 document.getElementById('get_trial_date').value = res.trail_date;
             }
         };
         xhttp.open("GET", "/users/" + value);
         xhttp.send();
         $('#userdetailupdated').submit(function() {
             swal({
                 title: 'success',
                 icon: 'success',
                 text: 'User Data Updated',
                 timer: 1500,
             });
         })
     }

     function deleteUserfromDB(id) {
         $('#delete_id').val(id);
         $('#deleteModal').modal('show');
     }

     $('#deletebtn').click(function() {
         var UserId = $('#delete_id').val();
         $(this).html(
             '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
         );
         $.ajax({
             url: "{{ route('card.delete') }}",
             type: "DELETE",
             dataType: "json",
             headers: {
                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
             },
             data: {
                 id: UserId
             },
             success: function(data) {
                 console.log(data);
                 $('#deleteModal').modal('hide');
                 window.location.reload();
             },
             error: function(data) {
                 console.log(data);
                 $('#deleteModal').modal('hide');
                 alert('Failed to delete user.');
             }
         });

         //          function closeModal(){
         //        $("#AddNewUserModal").css("display", "none");
         //        $(".modal-backdrop").css("display", "none");

         //    }

     });
 </script>
 <script>
      $document.ready(function() {
        $("#AddNewUserModal #close").click(function() {
              $("#AddNewUserModal").css("display", "none");
              $(".modal-backdrop").css("display", "none");
          });

          $("#AddNewUserModal #cross").click(function() {
              $("#AddNewUserModal").css("display", "none");
              $(".modal-backdrop").css("display", "none");
          });
     });
 </script>
 <style>
     button svg {
         height: 15px;
         width: 15px;
         margin-right: 5px;
     }
 </style>
