<title>Click Invitations - Records</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Records</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                            <th>ID</th>
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Event Name</th>
                            <th>Token</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($amountData as $value)
                          <tr class="text-center">
                            <td>{{$value->id}}</td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->userName}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->token}}</td>
                            <td>{{$value->amount}}</td>
                            <td>{{$value->status}}</td>
                            
                            
                            <td>
                              <a href="/records/{{$value->id}}" onclick="" data-id="{{$value->id}}" class="btn btn-primary">View</a>                           
                              @if($value->status == 'Paid')
                              <button class="btn btn-warning" onclick="refund({{$value->id}})">Refund</button>
                              @elseif($value->status == 'To Be Refunded')
                              <button class="btn btn-warning" onclick="refunded({{$value->id}})">Refunded</button>
                              @endif
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
 @include('footer');

     <style>
        button svg{
          height: 15px;
          width: 15px;
          margin-right: 5px;
        }
    </style>
    
    <script>
        
         function refund(value)
        {swal({
              title: "Are you sure?",
              text: "You want to refund",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((result) => {
              if (result) {
                ///---------------
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    let res = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    console.log(res);
                    if(res == 1){
                      //-----------
                      swal("Record has be set to To Be Refunded", {
                      title:'Refunded',
                      icon: "success",
                      timer:1000
                    }).then(()=> {
                      window.location.reload();
                    })
                    }
                //-------------
              }
            };
            xhttp.open("GET","/api/refund/"+value);
            xhttp.send();
            
            //---------------
              }
            });
      }
      function refunded(value)
        {swal({
              title: "Are you sure?",
              text: "You want to mark as refunded",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((result) => {
              if (result) {
                ///---------------
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    let res = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    console.log(res);
                    if(res == 1){
                      //-----------
                      swal("Record has be set to Refunded", {
                      title:'Refunded',
                      icon: "success",
                      timer:1000
                    }).then(()=> {
                      window.location.reload();
                    })
                    }
                //-------------
              }
            };
            xhttp.open("GET","/api/refunded/"+value);
            xhttp.send();
            
            //---------------
              }
            });
      }
    </script>