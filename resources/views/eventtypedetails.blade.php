<title>Click Invitations - Event (Cards/Backgorund)</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="row">
                  <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Cards</h4>
                        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal">
                          Add Card
                        </button>
                      </div>
                      <div class="card-body">
                        <div class="gallery gallery-md" style="display: flex;flex-wrap: wrap;">
                          @foreach ($data as $key => $value)
                            <div class="" style="display: flex;justify-content: space-around;align-items: flex-start;margin-right: 10px;">
                              <div class="gallery-item" style="margin-right: 0;"  data-image="{{asset('eventcards/'.$value->img)}}" data-title="Image{{$key}}"></div>
                              <button type="button" class="eventtypedetails_deletebtn" onclick="deletebgDatafromDB('{{$value->id}}')" data-id="{{$value->id}}">X</button>
                            </div>
                          @endforeach
                          </div>
                      </div>
                    </div>
                  </div>
                <div class="col-12 col-sm-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Background</h4>
                      <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal2">
                        Add Background
                      </button>
                    </div>
                    <div class="card-body">
                      <div class="gallery gallery-md" style="display: flex;flex-wrap: wrap;">
                        @foreach ($bgdata as $key => $value)
                          <div class="" style="display: flex;justify-content: space-around;align-items: flex-start;margin-right: 10px;">
                            <div class="gallery-item" style="margin-right: 0;"  data-image="{{asset('eventcards/'.$value->img)}}" data-title="Image{{$key}}"></div>
                            <button type="button" class="eventtypedetails_deletebtn" onclick="deletebgDatafromDB('{{$value->id}}')" data-id="{{$value->id}}">X</button>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </section>
      </div>

      <!-- Card Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/cards/added" method="POST"  enctype="multipart/form-data" id="cardsaved">
          {{ csrf_field() }}
          <input type="hidden" value='{{$eventID}}' name='eventID'/>
          <input type="hidden" value='card' name='imgType'/>
          <label for="img">Image</label>
          <input type="file" id="img" name="img" class="form-control" required>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Background Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Background</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/cards/added" method="POST"  enctype="multipart/form-data" id="bgsaved">
          {{ csrf_field() }}
          <input type="hidden" value='{{$eventID}}' name='eventID'/>
          <input type="hidden" value='background' name='imgType'/>
          <label for="img">Image</label>
          <input type="file" id="img" name="img" class="form-control" required>
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
   $('#cardsaved').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'Card Inserted',
    })
  })
  $('#bgsaved').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'Background Inserted',
    })
  })
  // Delete Images Data
  function deletebgDatafromDB(value)
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
                      swal("Your Image has been deleted!", {
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
            xhttp.open("GET","/api/deleteEventtypebackground/"+value);
            xhttp.send();
            
            //---------------
              }
            });
      }
</script>



<style>
 
  .eventtypedetails_deletebtn{
  
    border: none;
    cursor: pointer;
    /* border-radius: -2px; */
    text-align: center;
    background-color: red;
    color: white;
    /* position: absolute; */
    cursor: pointer;
    /* transform: translate(-50%, -50%); */
    font-size: 10px;
   z-index: 2;
   /* margin-left: -18px;
    top: 8px; */
  }
</style>