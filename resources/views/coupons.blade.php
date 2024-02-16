<title>Click Invitations - Coupons</title>
@include('header');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Coupons</h4>
                  <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal">
                    <i data-feather="plus"></i>Add
                </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                            <th>ID</th>
                            <th>Coupon</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $value )
                          <tr class="text-center">
                            <td>{{$value->id}}</td>  
                            <td>{{$value->coupon}}</td>  
                            <td>{{$value->code}}</td>  
                            <td>
                              @if ($value->status) 
                                <div class="badge badge-success badge-shadow">Enable</div>
                              @else
                                <div class="badge badge-danger badge-shadow">Disable</div>
                              @endif
                            </td>
                            <td><a href="/coupon/{{$value->id}}" onclick="" data-id="{{$value->id}}" class="btn btn-primary">Details</a>
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
      

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/coupon/add" method="post" id="addForm">
          {{ csrf_field() }}
          <label for="name">Name</label>
          {{-- <input type="text" id="id_user" name="id_user" class="form-control"> --}}
          <select name="id_user" id="name" class="form-control" required>
            <option value="">Choose Any Reseller</option>
            @foreach ($usersdata as $value)
            <option value='{{$value->id}}'>{{$value->name}}</option>
            @endforeach
          </select>
          <label for="coupon">Coupon Name</label>
          <input type="text" id="coupon" name="coupon" class="form-control" required>
          <label for="code">Code</label>
          <input type="text" id="code" name="code" class="form-control" readonly placeholder="Auto Generated" required>
          <label for="">Start Date</label>
          <input type="date" id="start_date" name="start_date" class="form-control" required>
          <label for="">Expire Date</label>
          <input type="date" id="get_expiredate" name="expirydate" class="form-control" required>
          <label for="">Discount</label>
          <input type="number" id="get_discount" name="discount" class="form-control" required>
          <label for="">Count</label>
          <input type="number" id="get_count" name="count" class="form-control" required>
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

      // Added Guest List Swal
  $('#addForm').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'New Coupen Added',
      timer:5000
    })
  })

  // Get Data
      function getDatafromDB(value){
         const xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            console.log(this.responseText);
            console.log(res);
            res = res[0];
            document.getElementById('get_id_code').value = res.id_code;
            document.getElementById('get_coupon').value = res.coupon;
            document.getElementById('get_code').value = res.code;
            document.getElementById('get_type').value = res.type;
            document.getElementById('get_expiredate').value = res.expiredate;
            document.getElementById('get_discount').value = res.discount;
            document.getElementById('get_count').value = res.count;
            
          }
        };
        xhttp.open("GET","/api/coupon/"+value);
        xhttp.send();
        // Updated Swal
        $('#getForm').submit(function(){
              swal({
                title: "Updated",
                text: "Code Updated",
                icon: "success",
              });
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