<title>Click Invitations - Reseller</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Resellers</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#AddNewUserModal">
                      <i data-feather="plus"></i>Add
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Province</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($userData as $value)
                          <tr class="text-center">
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}} {{$value->surname}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->province}}</td>
                            <td>
                              @if ($value->active) 
                                <div class="badge badge-success badge-shadow">Active</div>
                              @else
                                <div class="badge badge-danger badge-shadow">Deactive</div>
                              @endif
                            </td>
                            <td>
                              <a href="#" onclick="getuserDatafromDB('{{$value->id}}', 'details')" data-id="{{$value->id}}" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary">Details</a>
                              <button type="button" onclick="getuserDatafromDB('{{$value->id}}', 'single')" data-id="{{$value->id}}"  class="btn btn-info ml-auto" data-toggle="modal" data-target="#addcouponModal">
                              Add Coupon</button>
                              <a href="/resellercoupondetails/{{$value->id}}" onclick="" data-id="{{$value->id}}" class="btn btn-success">Coupons</a>
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
    <div class="modal fade" id="AddNewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Reseller</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/reseller/added" id="addedreseller">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="col-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-6">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" name="surname"required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email"required>
                </div>
                <div class="col-6">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password"required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-6">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone"  required  >
                </div>
                <div class="col-6">
                  <label for="language">Language</label>
                  <input type="text" class="form-control" id="language" name="language" required   >
                </div>
              </div>
              <div class="form-row">
                <div class="col-6">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" id="company" name="company"required>
                </div>
                <div class="col-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address"required >
                </div>
                <div class="col-6">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city"required>
                </div>
                <div class="col-6">
                  <label for="province">Province</label>
                  <input type="text" class="form-control" id="province" name="province"required >
                </div>
              </div>
              <div class="form-row">
                <div class="col-6">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" name="country"  required  >
                </div>
                <div class="col-6">
                  <label for="active">Active</label>
                  <select class="form-control" name="active" id="active">
                    <option value="0">Deactive</option>
                    <option value="1">Active</option>                 
                  </select>
                </div>
                <div class="col-6">
                  <label for="">User Trial</label>
                  {{-- <input type="text" class="form-control" id="trial" name="trial" required> --}}
                  <select name="trial" id="role" class="form-control" required>
                    <option value="0">NO</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
                
                 <div class="col-6">
                  <label for="">Trial Expiry Date</label>
                  <input type="date" class="form-control" id="trial_date" name="trial_date" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- details btn Modal --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reseller Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/resellers/update" id="userdetailupdated">
              {{ csrf_field() }}
              <input class="form-control" type="text" name="id" id="get_id" hidden >
              <div class="form-row">
                <div class="col-4">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="get_name" name="name">
                </div>
                <div class="col-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Enter new Password here" name="password">
                </div>
                <div class="col-4">
                  <label for="">Surname</label>
                  <input type="text" class="form-control" id="get_surname" name="surname">
                </div>
                <div class="col-7">
                  <label for="">Email</label>
                  <input type="text" class="form-control" id="get_email" name="email" readonly>
                </div>
              
                <div class="col-5">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="get_phone" name="phone"    >
                </div>
                <div class="col-4">
                  <label for="language">Language</label>
                  <input type="text" class="form-control" id="get_language" name="language"    >
                </div>
                <div class="col-4">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" id="get_company" name="company">
                </div>
              
                <div class="col-4">
                  <label for="last_login">Last Login</label>
                  <input type="date" class="form-control" id="get_last_login" name="last_login"    >
                </div>
                <div class="col-4">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="get_address" name="address" >
                </div>
                <div class="col-4">
                  <label for="active">Active</label>
                  <select class="form-control" name="active" id="get_active">
                    <option value="0">Deactive</option>
                    <option value="1">Active</option>
                  </select>
                </div>
              
                <div class="col-4">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="get_country" name="country"    >
                </div>
                <div class="col-4">
                  <label for="province">Province</label>
                  <input type="text" class="form-control" id="get_province" name="province" >
                </div>
                <div class="col-4">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="get_city" name="city">
                </div>
                <div class="col-4">
                  <label for="">Change Account Type</label>
                  <select name="role" id="role" class="form-control">
                    <option value="2">Reseller</option>
                    <option value="1">User</option>
                  </select>
                </div>
                
                <div class="col-4">
                  <label for="">User Trial</label>
                  {{-- <input type="text" class="form-control" required> --}}
                  <select name="get_trial" id="get_trial" class="form-control" required>
                    <option value="0">NO</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
                
                 <div class="col-4">
                  <label for="">Trial Expiry Date</label>
                  <input type="date" class="form-control" id="get_trial_date" name="get_trial_date" value="" required>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="updatebtn" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Coupon Modal -->
    <div class="modal fade" id="addcouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/resellercoupon/added" method="post" id="addcouponForm">
              {{ csrf_field() }}
              <input class="form-control" type="hidden" name="id_user" id="get_coupon_user_id"  >
              <label for="coupon">Coupon Name</label>
              <input type="text" id="coupon" name="coupon" class="form-control" required>
              <label for="code">Code</label>
              <input type="text" id="code" name="code" class="form-control" readonly placeholder="Auto Generated" >
              <label for="">Start Date</label>
              <input type="date" id="start_date" name="start_date" class="form-control" required>
              <label for="">Expire Date</label>
              <input type="date" id="get_expiredate" name="expirydate" class="form-control" required>
              <label for="">Discount ( % )</label>
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

    

     @include('footer')

<script>
  $('#addedreseller').submit(function()
  {
    swal({
      title:'Success',
      icon:'success',
      text:'New Reseller Added',
    })
  })

  $('#addcouponForm').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'New Coupen Added',
      timer:5000
    })
  })

  // Get Reseller Data
     function getuserDatafromDB(value, type){
      // console.log("this.responseText");
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            res = res[0];
            if(type == 'details') {
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
            }else if(type == 'single'){
              document.getElementById('get_coupon_user_id').value = res.id;
            }
          }
        };
        xhttp.open("GET", "/resellers/"+value);
        xhttp.send();
        $('#userdetailupdated').submit(function(){
        swal({
          title:'Success',
          icon:'success',
          text:'Reseller Data Updated',
          timer:1500,
        });
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