<title>Click Invitations - Events</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Details</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addeventmodel">
                      +Add Event
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$userData[0]->name}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{$userData[0]->surname}}" readonly>
                      </div>
                    </div>
                    
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                         <h5 style="color:black ">Events</h5>
                          <thead>
                            <tr class="text-center">
                              <th>Events Name</th>
                              <th>Event Type</th>
                              <th>Date</th>
                              <th>Paid</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @foreach ($events as $value)
                            <tr class="text-center">
                              {{-- <th>{{$value->id_event}}</th> --}}
                              <td>{{$value->name}}</td>
                              <td>{{$value->type}}</td>
                              <td>{{$value->date}}</td>
                              <td>
                                @if ($value->paid) 
                                  <div class="badge badge-success badge-shadow">Paid</div>
                                @else
                                  <div class="badge badge-danger badge-shadow">Unpaid</div>
                                @endif
                              </td>
                              <td>
                                <a href="/userevents/{{$value->id_user}}/{{$value->id_event}}" onclick="" data-id="{{$value->id_event}}" class="btn btn-primary">Details</a>
                                <button type="button"  onclick="deleteEventDatafromDB('{{$value->id_event}}')" data-id="{{$value->id_event}}" class="btn btn-danger"><i data-feather="trash"></i>Delete</button>
                            </tr>
                            @endforeach
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Add Event Modal -->
          <div class="modal fade" id="addeventmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/addnewEvent/added" method="post">
                    {{ csrf_field() }}
                    <label for="name">Event Name</label>
                    <input type="hidden" name="userID" value="{{$id_user}}"/>
                  <input type="text" id="event_name" name="name" class="form-control" required>
                  <label for="date">Date</label>
                  <input type="datetime-local" id="event_date" name="date" class="form-control" required>
                  <label for="type">Choose a Event Type</label>
                  <select style="font-size: 15px" name="type" id="event_type" class="form-control" required>
                    <option selected disabled required>Select Event</option>
                    @foreach ($eventtypesloop as $value )
                    <option value="{{$value->title}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
       @include('footer');

<script>

  // Delete Event Data
  function deleteEventDatafromDB(value)
  {swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          ///---------------
          const xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let res = JSON.parse(this.responseText);
              console.log(this.responseText);
              console.log(res);
              if(res == 1){
                //-----------
                swal("Your Event has been deleted!", {
                title:'Deleted',
                icon: "success",
                timer:1000
              }).then(()=> {
                window.location.reload();
              })
              }
        }
      };
      xhttp.open("GET","/api/deleteEvent/"+value);
      xhttp.send();
    
        }
      });
  }
</script>
       
       <style>
        button svg{
          height: 15px;
          width: 15px;
          margin-right: 5px;
        }
      </style>