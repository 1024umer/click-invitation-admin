<title>Click Invitations - Prices</title>

@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">

            <form action="/prices/updated" method="post" id="saved">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Canada</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                          <h5 style="color:black; margin-top:10px"> Sub Total  </h5>&nbsp;
                          <input type="hidden" id="id_data" name="id_data" style="width:20%" class="form-control incolor" value="{{$data[0]->id_data}}" >
                          <input type="number" id="subcan1" name="subcan1" style="width:20%" class="form-control incolor" value="{{$data[0]->subcan1}}" > <h2 style="color:black"> . </h2>
                        <input type="number" id="subcan2" name="subcan2" style="width:20%" value="{{$data[0]->subcan2}}" class="form-control incolor">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <h5 style="color:black; margin-top:10px">TPS</h5>&nbsp;
                          <input type="number" id="tpscan1" name="tpscan1" style="width:20%"  value="{{$data[0]->tpscan1}}" class="form-control incolor"> <h2 style="color:black"> . </h2>
                        <input type="number"  id="tpscan2" name="tpscan2" style="width:20%"  value="{{$data[0]->tpscan2}}" class="form-control incolor">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <h5 style="color:black; margin-top:10px">TVQ</h5>&nbsp;
                          <input type="number" id="tvqcan1" name="tvqcan1" style="width:20%"  value="{{$data[0]->tvqcan1}}" class="form-control incolor"> <h2 style="color:black"> . </h2>
                        <input type="number" id="tvqcan2" name="tvqcan2"  style="width:20%"  value="{{$data[0]->tvqcan2}}" class="form-control incolor">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>USA</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                          <h5 style="color:black; margin-top:10px">Sub Total</h5>&nbsp;
                          <input type="number" id="subusa1" name="subusa1" style="width:20%"  value="{{$data[0]->subusa1}}" class="form-control incolor"> <h2 style="color:black"> . </h2>
                        <input type="number" id="subusa2" name="subusa2" style="width:20%"  value="{{$data[0]->subusa2}}" class="form-control incolor">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <h5 style="color:black; margin-top:10px">TPS</h5>&nbsp;
                          <input type="number" id="tpsusa1" name="tpsusa1" style="width:20%"  value="{{$data[0]->tpsusa1}}" class="form-control incolor"> <h2 style="color:black"> . </h2>
                        <input type="number" id="tpsusa2" name="tpsusa2" style="width:20%"  value="{{$data[0]->tpsusa2}}" class="form-control incolor">
                        </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <h5 style="color:black; margin-top:10px">TVQ</h5>&nbsp;
                            <input type="number" id="tvqusa1" name="tvqusa1" style="width:20%"  value="{{$data[0]->tvqusa1}}" class="form-control incolor"> <h2 style="color:black"> . </h2>
                          <input type="number" id="tvqusa2" name="tvqusa2" style="width:20%"  value="{{$data[0]->tvqusa2}}" class="form-control incolor">
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
            </div>
            <button style="width:100%" class="btn btn-primary" type="submit">Save</button>
            </form>
          </div>
        </section>
      </div>
     @include('footer');
     <style>
      .incolor{
        color: black;
      }
     </style>

<script>
  $('#saved').submit(function()
  {
    swal({
      title:'Success',
      icon:'success',
      text:'Prices Updated',
    })
  })
 </script>