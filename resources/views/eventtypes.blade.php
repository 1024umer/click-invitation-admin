<title>Click Invitations - Event Types</title>
@include('header');
<link rel="stylesheet" href="{{asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css')}}">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Events Types</h4>
                      <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addEventModal">
                        <i data-feather="plus"></i>Add
                      </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                            <th>ID</th>
                            <th>Event Type</th>
                            <th>Couple Event</th>
                            <th>Corporate Event</th>
                            <th>Animations</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($EventtypeData as $key => $value )
                            <tr>
                              <td>{{$key + 1}}</td>
                              <td>{{$value->title}}</td>
                              <td>
                                @if ($value->couple_event) 
                                <div>Couple Event</div>
                              @else
                                <div>Event</div>
                              @endif
                              </td>
                              <td>
                                @if ($value->corporate_event) 
                                <div>Corporate Event</div>
                              @else
                                <div>Event</div>
                              @endif
                              </td>
                              <td>{{$value->name_animation}}</td>
                              <td>
                                <a href="/eventtypedetails/{{$value->id_eventtype}}" class="btn btn-primary">Details</a>
                                <button type="button"  onclick="getEventtypeDatafromDB('{{$value->id_eventtype}}')" data-id="{{$value->id_eventtype}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#EditEventModal">
                                  <i data-feather="edit"></i>Edit
                                </button>
                                <button type="button" onclick="deleteEventtypeDatafromDB('{{$value->id_eventtype}}')" data-id="{{$value->id_eventtype}}" class="btn btn-danger" >
                                  <i data-feather="trash"></i>Delete
                                </button>
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


    <!-- Add New Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="/eventtype/added" method="post" id="addeventform">
                {{ csrf_field() }}
                <label for="title">Event Type</label>
                <input type="text" id="title" name="title" class="form-control" required >
                <label for="id_animation">Animation</label> 
                <select name="id_animation" id="id_animation" class="form-control" required><br> 
                 <option value="">Choose Aninmation</option>
                  @foreach ($animationdata as $value )
                 <option value="{{$value->id_animation}}">{{$value->name_animation}}</option>                   
                 @endforeach
                </select><br>
                <div class="pretty p-switch">
                  <input type="checkbox" id="couple_event" name="couple_event">
                  <div class="state p-primary">
                    <label>Couple Event</label>
                  </div>
                </div>
                <div class="pretty p-switch">
                  <input type="checkbox" id="corporate_event" name="corporate_event">
                  <div class="state p-primary">
                    <label>Corporate Event</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="Submit" class="btn btn-primary">Save</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- EDIT Event Modal -->
      <div class="modal fade" id="EditEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/eventtype/updated" method="post" id="eventtypegetForm">
                  {{ csrf_field() }}
                  <input type="hidden" name="id_eventtype" class="form-control" id="type_id_eventtype">
                  <label for="title">Event Type</label>
                  <input type="text" id="name_title" name="title" class="form-control" required >
                  <label for="id_animation">Animation</label> 
                  <select name="id_animation" id="get_id_animation" class="form-control" required><br>
                  <option value="">Choose Animation</option>
                  @foreach ($animationdata as $value )
                  <option value="{{$value->id_animation}}">{{$value->name_animation}}</option>                   
                  @endforeach
                  </select><br>
                  <div class="pretty p-switch">
                     <input type="checkbox"  id="couple_event_checking" name="couple_event">
                    <div class="state p-primary">
                      <label>Couple Event</label>
                    </div>
                  </div>
                  <div class="pretty p-switch">
                     <input type="checkbox"  id="corporate_event_checking" name="corporate_event">
                    <div class="state p-primary">
                      <label>Corporate Event</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    {{-- End Edit --}}

      {{-- Footer --}}
     @include('footer');
      {{-- Footer End --}}

<script>
      // Add Event Swal 
      $('#addeventform').submit(function()
      {
        swal({
          title:'success',
          icon:'success',
          text:'New Event Type Added',
        })
      });

      // Get Eventtype for edit.
      function getEventtypeDatafromDB(value){
         const xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            console.log(this.responseText);
            console.log(res);
            res = res[0];
            document.getElementById('type_id_eventtype').value = res.id_eventtype;
            document.getElementById('name_title').value = res.title;
            document.getElementById('get_id_animation').value = res.id_animation;
            if(res.couple_event == "1"){
              document.getElementById("couple_event_checking").checked = true;
            }else {
              document.getElementById("couple_event_checking").checked = false;
            }
            
            if(res.corporate_event == "1"){
              document.getElementById("corporate_event_checking").checked = true;
            }else {
              document.getElementById("corporate_event_checking").checked = false;
            }
            
          }
        };
        xhttp.open("GET","/api/eventtypeList/"+value);
        xhttp.send();
        // Updated Swal
        $('#eventtypegetForm').submit(function(){
              swal({
                title: "Updated",
                text: "Event Type Updated",
                icon: "success",
              });
      });
    }

      // Delete Event Type Data
      function deleteEventtypeDatafromDB(value)
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
                      swal("Your Event Type has been deleted!", {
                      title:'Deleted',
                      icon: "success",
                      timer:1000
                    }).then(()=> {
                      window.location.reload();
                    })
                    }
                //-------------
              }
            };
            xhttp.open("GET","/api/deleteEventtype/"+value);
            xhttp.send();
            
            //---------------
              }
            });
      }
  
</script>

{{-- Edit And Delete Button Styling --}}
<style>
  button svg{
    height: 15px;
    width: 15px;
    margin-right: 5px;
  }
</style>