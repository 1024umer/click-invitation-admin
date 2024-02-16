<title>Click Invitations - Invoice</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Invoice</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr class="text-center">
                            <th></th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Event Name</th>
                            <th>User Name</th>
                            <th>Token</th>
                            <th>Amount</th>
                            
                            
                            
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td></td>
                            <td>{{$amountData[0]->id_event}}</td>
                            <td>{{$amountData[0]->date}}</td>
                            <td>{{$amountData[0]->name}}</td>
                            <td>{{$amountData[0]->userName}}</td>
                            <td>{{$amountData[0]->token}}</td>
                            <td>
                                @if($amountData[0]->status == 'Refunded')
                                  {{'-' .$amountData[0]->amount}}
                                  @else
                                  {{$amountData[0]->amount}}
                                  @endif
                            
                            </td>
                            
                            
                            
                            
                            
                            <td>
                              {{-- <a href="/records/{{$value->id}}" onclick="" data-id="{{$value->id}}" class="btn btn-primary">View</a>                            --}}
                              {{$amountData[0]->status}}
                            </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>______________________________</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text-center">
                                  @if($amountData[0]->status == 'Refunded')
                                  {{'-' .$amountData[0]->amount}}
                                  @else
                                  {{$amountData[0]->amount}}
                                  @endif
                                  </td>
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
      </div>
     @include('footer');