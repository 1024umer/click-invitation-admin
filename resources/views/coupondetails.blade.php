<title>Click Invitations - Coupon Details</title>
@include('header');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Coupon: {{$data[0]->coupon}}</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Code</label>
                        <input type="text" class="form-control"  value="{{$data[0]->code}}" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Start Date</label>
                        <input type="text" class="form-control" value="{{$data[0]->start_date}}" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Expire Date</label>
                        <input type="text" class="form-control"  value="{{$data[0]->expirydate}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="">Discount</label>
                        <input type="text" class="form-control" value="{{$data[0]->discount}}" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Count</label>
                        <input type="text" class="form-control"  value="{{$data[0]->count}}" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Coupon Status</label>
                        <div class="input-group">
                          @if ($data[0]->status) 
                              <input type="text" style="border-block-color:green; color:green" class="form-control" value="Enable" readonly>
                            @else
                              <input type="text" style="border-block-color:red; color:red" class="form-control" value="Disable" readonly>
                          @endif
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                               <button type="button" onclick="editDatafromDB('{{$data[0]->id}}')" data-id="{{$data[0]->id}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#editexampleModal">
                                  <i data-feather=edit></i>
                                </button>
                              </div>
                            </div>
                          </div> 
                      </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                         <h5>Events</h5>
                          <thead>
                            <tr class="text-center">
                              <th>ID</th>
                              <th>Users</th>
                              <th>Events</th>
                              <th>Event Type</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($eventsData as $value )
                            <tr class="text-center">
                              <td>{{$value->id_event}}</td> 
                              <td>{{$value->name}} {{$value->surname}}</td> 
                              <td>{{$value->eventName}}</td>  
                              <td>{{$value->type}}</td>  
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
        <!-- Edit Modal -->
    <div class="modal fade" id="editexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/coupon/updated" method="POST" id="editstatus">
            {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" class="form-control" id="get_coupon_id" name="id" >
            <label for="status">Status (Enable / Disable)</label>
            <select class="form-control" id="get_coupon_status" name="status">
              <option value="1">Enable</option>
              <option value="0">Disable</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
        </div>
      </div>
    </div>
        
        <!-- Add Event Modal -->
          {{-- <div class="modal fade" id="addeventmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          </div> --}}
       @include('footer');

<script>

  
  // Get 
  function editDatafromDB(value){
      console.log("this.responseText");
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            res = res[0];
            document.getElementById('get_coupon_id').value = res.id;
            document.getElementById('get_coupon_status').value = res.status;
          }
        };
        xhttp.open("GET", "/couponstatus/"+value);
        xhttp.send();
        $('#editstatus').submit(function(){
        swal({
          title:'Success',
          icon:'success',
          text:'Coupon Status Updated',
          timer:1500,
        })
      })
      }
</script>
       
       <style>
        button svg{
          height: 15px;
          width: 15px;
          margin-right: 5px;
        }
      </style>