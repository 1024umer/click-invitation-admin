<title>Click Invitations - Reseller Coupons</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Coupon Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr class="text-center">
                              <th>ID</th>
                              <th>Coupons</th>
                              <th>Code</th>
                              <th>Discount %</th>
                              <th>Date</th>
                              <th>Expire</th>
                              <th>Count</th>
                              <th>Status</th>
                              <th>Actions</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($couponData as $value )
                          <tr class="text-center">
                            <td>{{$value->id}}</td>
                            <td>{{$value->coupon}}</td>  
                            <td>{{$value->code}}</td> 
                            <td>{{$value->discount}}</td>  
                            <td>{{$value->start_date}}</td> 
                            <td>{{$value->expirydate}}</td> 
                            <td>{{$value->count}}</td> 
                            <td>@if ($value->status) 
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