<title>Click Invitations - Event Details</title>
 
 @include('header');
 <!-- Main Content -->
 <div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            @foreach ($eventRecords as $value) 
            <div class="card-header">
              <h4>{{$value->name}} - {{$value->type}}</h4>
            </div>
            @endforeach
            <div class="card-body">
              <div id="accordion">
                 {{-- General Informations --}}
                @foreach ($eventRecords as $value)
                  <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1">
                      <h4 style="color: black">General Informations</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                      <div class="form-row" >
                          <div class="form-group col-md-4">
                            <label for="name">Event Name</label>
                            <input type="text" class="form-control" id="name_generalinfo" name="name" value="{{$value->name}}" readonly>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="date">Date - Time </label>
                            <input type="text" class="form-control" id="date_generalinfo" name="date" value="{{$value->date}}" readonly>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="summary">Summary</label>
                            <input type="text" class="form-control" id="summary_generalinfo" name="summary" value="{{$value->summary}}" readonly>
                          </div>
                          <button type="button"  onclick="getGeneralInfoDatafromDB('{{$value->id_event}}', '{{$value->id_user}}')" data-id="{{$value->id_event}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#eventeditModal">
                            <i data-feather="edit"></i>Edit
                          </button>
                      </div>

                    </div>

                  </div>
                @endforeach

                 {{-- Meals --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                    <h4 style="color: black">Meals</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead class="text-center">
                          <tr >
                            <th>Meal Name</th>
                            <th>Description</th>
                            <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"><i data-feather="plus"></i>
                              Add
                            </button></th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            @foreach ($mealdata as $value ) 
                              <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->description}}</td>
                                <td><button type="button"  onclick="getmealDatafromDB('{{$value->id_meal}}')" data-id="{{$value->id_meal}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#editmealmodel"> <i data-feather="edit"></i> Edit</button>
                                  <button type="button" onclick="deleteMealDatafromDB('{{$value->id_event}}', '{{$eventRecords[0]->id_user}}', '{{$value->id_meal}}')"
                                   data-id="{{$value->id_meal}}" class="btn btn-danger id_meal_delete" ><i data-feather="trash"></i>Delete</button></td>
                              </tr>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                 {{-- Guest List --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                    <h4 style="color: black">Guest List</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center">
                            <th>Guest Name</th>
                            <th>Email</th>
                            <th>No: of Members</th>
                            <th></th>
                            <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addguestlistmodel"><i data-feather="plus"></i>Add</button></th>
                          </tr>
                        </thead>
                        <tbody  class="text-center">
                          <tr >
                           @foreach ($guestdata as $value ) 
                              <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->members_number}}</td>
                               
                               <td> @if ($value->declined) 
                                <div class="badge badge-danger badge-shadow">Declined</div>
                              @endif
                            
                              @if ($value->checkin) 
                                <div class="badge badge-success badge-shadow">Check-In</div>   
                              @endif</td>
                                <td><button type="button"  onclick="getuserDatafromDB('{{$value->id_guest}}')" data-id="{{$value->id_guest}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#exampleModal3"> <i data-feather="edit"></i> Edit</button>
                                  <button type="button" onclick="deleteGuestDatafromDB('{{$value->id_event}}', '{{$eventRecords[0]->id_user}}', '{{$value->id_guest}}')"
                                    data-id="{{$value->id_guest}}" class="btn btn-danger id_meal_delete" ><i data-feather="trash"></i>Delete</button></td>
                              </tr>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                 {{-- Cards --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
                    <h4 style="color: black">Cards</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                    <form action="">
                      <div class="form-row" >
                        @if (count($cardData) > 0)
                        <input type="hidden" name="id_card" id="id_card" value="{{$cardData[0]->id_card}}">
                          <div class="form-group col-md-3">
                            <label for="title1">Title 1</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$cardData[0]->title1}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="title2">Title 2</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$cardData[0]->title2}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="title3">Title 3</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$cardData[0]->title3}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="title4">Ttile 4</label>
                            <input type="text" class="form-control" id="title4" name="title4" value="{{$cardData[0]->title4}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="titleFont">Ttile Font</label>
                            <input type="text" class="form-control" id="titleFont" name="titleFont" value="{{$cardData[0]->titleFont}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="titleColor">Title Color</label>
                            <input type="text" class="form-control" id="titleColor" name="titleColor" value="{{$cardData[0]->titleColor}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="name1">Name 1</label>
                            <input type="text" class="form-control" id="name1" name="name1" value="{{$cardData[0]->name1}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="name2">Name 2</label>
                            <input type="text" class="form-control" id="name2" name="name2" value="{{$cardData[0]->name2}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cermony">Cermony</label>
                            <input type="text" class="form-control" id="cermony" name="cermony" value="{{$cardData[0]->cermony}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cermonyFont">Cermony Font</label>
                            <input type="text" class="form-control" id="cermonyFont" name="cermonyFont" value="{{$cardData[0]->cermonyFont}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cermonyColor">Cermony Color</label>
                            <input type="text" class="form-control" id="cermonyColor" name="cermonyColor" value="{{$cardData[0]->cermonyColor}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="other1">Other 1</label>
                            <input type="text" class="form-control" id="other1" name="other1" value="{{$cardData[0]->other1}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="other2">Other 2</label>
                            <input type="text" class="form-control" id="other2" name="other2" value="{{$cardData[0]->other2}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="other3">Other 3</label>
                            <input type="text" class="form-control" id="other3" name="other3" value="{{$cardData[0]->other3}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="otherFont">Other Font</label>
                            <input type="text" class="form-control" id="otherFont" name="otherFont" value="{{$cardData[0]->otherFont}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="otherColor">Other Color</label>
                            <input type="text" class="form-control" id="otherColor" name="otherColor" value="{{$cardData[0]->otherColor}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="bgName">Background Image</label>
                            <a href="{{$cardData[0]->bgName}}">view<input type="text" class="form-control" id="bgName" name="bgName" value="{{$cardData[0]->bgName}}">
                            </a>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cardName">Card Image</label>
                            <a href="">view<input type="text" class="form-control" id="cardName" name="cardName" value="{{$cardData[0]->cardName}}" > </a>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="fontColor">Font Color</label>
                            <input type="text" class="form-control" id="fontColor" name="fontColor" value="{{$cardData[0]->fontColor}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="fontFamily">Font Family</label>
                            <input type="text" class="form-control" id="fontFamily" name="fontFamily" value="{{$cardData[0]->fontFamily}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="customCard">Custom Card</label>
                            <input type="text" class="form-control" id="customCard" name="customCard" value="{{$cardData[0]->customCard}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cardColorOut">Card Color Out</label>
                            <input type="text" class="form-control" id="cardColorOut" name="cardColorOut" value="{{$cardData[0]->cardColorOut}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="cardColorIn">Card Color In</label>
                            <input type="text" class="form-control" id="cardColorIn" name="cardColorIn" value="{{$cardData[0]->cardColorIn}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="rsvp">RSVP</label>
                            <input type="text" class="form-control" id="rsvp" name="rsvp" value="{{$cardData[0]->rsvp}}" >
                          </div>
                          <div class="form-group col-md-3">
                            <label for="msgTitle">Message Title</label>
                            <input type="text" class="form-control" id="msgTitle" name="msgTitle" value="{{$cardData[0]->msgTitle}}" >
                          </div>
                          <div class="ml-auto" style="margin-top: 30px">
                            <button type="button" class="btn btn-icon icon-left btn-light"  onclick="getCardDatafromDB('{{$cardData[0]->id_card}}')" data-id="{{$cardData[0]->id_card}}" data-toggle="modal" data-target="#editCardmodel">
                              <i data-feather="edit"></i> Edit</button>
                          </div>
                          @else
                          <div class="ml-auto">
                            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#AddCardmodel">
                              <i data-feather="plus"></i>Add</button>
                          </div>
                          @endif

                        </div>
                    </div>
                    </form>
                </div>

                 {{-- Guest Table --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-5">
                    <h4 style="color: black">Guest Tables</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
                    <div class="form-row" >
                      <table class="table table-striped" id="table-1">
                        <thead class="text-center">
                          <tr >
                            <th>ID</th>
                            <th>Name</th>
                            <th>Guest Number</th>
                            <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#guesttablemodel"><i data-feather="plus"></i>
                              Add</button></th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            @foreach ($tableData as $value) 
                              <tr>
                                <td>{{$value->id_table}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->guest_number}}</td>
                                <td><button type="button"  onclick="getGuestTableDatafromDB('{{$value->id_table}}')" data-id="{{$value->id_table}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#editguesttablemodel"> <i data-feather="edit"></i> Edit</button>
                                  <button type="button" onclick="deleteTableDatafromDB('{{$value->id_event}}','{{$eventRecords[0]->id_user}}','{{$value->id_table}}')"
                                   data-id="{{$value->id_table}}" class="btn btn-danger"><i data-feather="trash"></i>Delete</button></td>
                              </tr>
                            @endforeach
                         
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </div>
                </div>

                {{-- Gifts Table --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-6">
                    <h4 style="color: black">Gifts</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
                    <div class="form-row" >
                      <table class="table table-striped" id="table-1">
                        <thead class="text-center">
                          <tr >
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Link</th>
                            {{-- <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addgiftmodel"><i data-feather="plus"></i>
                              Add</button></th> --}}
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            @foreach ($giftData as $value) 
                              <tr>
                                <td>{{$value->id_gift}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->description}}</td>
                                <td><a href="{{$value->link}}">{{$value->link}}</a></td>
                                {{-- <td><button type="button"  onclick="getGuestTableDatafromDB('{{$value->id_gift}}')" data-id="{{$value->id_gift}}" class="btn btn-icon icon-left btn-light ml-auto" data-toggle="modal" data-target="#editgiftmodel"> <i data-feather="edit"></i> Edit</button>
                                  <button type="button" onclick="deleteTableDatafromDB('{{$value->id_event}}','{{$eventRecords[0]->id_user}}','{{$value->id_gift}}')"
                                   data-id="{{$value->id_gift}}" class="btn btn-danger"><i data-feather="trash"></i>Delete</button></td> --}}
                              </tr>
                            @endforeach
                         
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </div>
                </div>

                {{-- PhotoGallery Table --}}
                <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-7">
                    <h4 style="color: black">Photo Gallery</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-7" data-parent="#accordion">
                    <div class="form-row" >
                      <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="gallery gallery-md" style="display: flex;flex-wrap: wrap;">
                              @foreach ($photogalleryData as $key => $value)
                                <div class="" style="display: flex;justify-content: space-around;align-items: flex-start;margin-right: 10px;">
                                  <div class="gallery-item" style="margin-right: 0;"  data-image="https://clickinvitation.com/event-images/{{$value->id_event}}/photogallery/{{$value->id_photogallery}}.jpg" data-title="Image{{$key}}"></div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 </div>

{{-- All Popups ( Modal ) --}}
      <!-- General Info Edit Modal -->
      <div class="modal fade" id="eventeditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit General Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/event/update" method="post" id="generalinfoForm">
                {{ csrf_field() }}
                  <input type="text" class="form-control" name="id_event" id="id_event_generalinfo" hidden>
                  <label for="name">Event Name</label>
                  <input type="text" class="form-control" id="name_generalinfo_model" name="name" required>
                  <label for="date">Date - Time </label>
                  <input type="text" class="form-control" id="date_generalinfo_model" name="date" required>
                  <label for="summary">Summary</label>
                  <input type="text" class="form-control" id="summary_generalinfo_model" name="summary" required>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Update</button>
                  </div>
              </form>
            </div> 
          </div>
        </div>
      </div>

      <!-- Add Meal Modal -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Meal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="/meal/added" method="post" id="addmealform">
              {{ csrf_field() }}
              <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}">
              <label for="name">Meal Name</label>
              <input type="text" class="form-control" id="name_meal" name="name" required >
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description_meal" name="description" required >
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>

      <!--Update Meal Modal -->
      <div class="modal fade" id="editmealmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Meal Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/meal/updated" method="post" id="mealinfoForm">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="meal_id_event" name="id_event" value="{{$value->id_event}}">
                <input type="hidden" class="form-control" id="meal_id_meal" name="id_meal" value="">
                <label for="name">Meal</label>
                <input type="text" class="form-control" id="meal_name" name="name" required >
                <label for="text">Description</label>
                <input type="text" class="form-control" id="meal_description" name="description" required >
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
               </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Add Guest List Model -->
      <div class="modal fade" id="addguestlistmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Guests List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/guest/added" method="post" id="addguestinfoForm">
                {{ csrf_field() }}
                <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}" >
                <div class="form-row">
                  <div class="col-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name_guest_add" name="name" required>
                  </div>
                  <div class="col-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email_guest_add" name="email"required>
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone_guest_add" name="phone"  required  >
                  </div>
                  <div class="col-6">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp_guest_add" name="whatsapp" required   >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="mainguest">Main Guest</label>
                    <input type="number" class="form-control" id="mainguest_guest_add" name="mainguest"required>
                  </div>
                  <div class="col-6">
                    <label for="notes">Notes</label>
                    <input type="text" class="form-control" id="notes_guest_add" name="notes"  required  >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="allergies">Allergies</label>
                    <select name="allergies" id="allergies_guest_add" required class="form-control">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="declined">Declined</label>
                    <select  class="form-control" id="declined_guest_add" name="declined" required  >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="checkin">Check-In</label>
                    <select class="form-control" id="checkin_guest_add" name="checkin" required>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="members_number">Members Number</label>
                    <input type="number" class="form-control" id="members_number_guest_add" name="members_number"required >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="opened">Opened</label>
                    <select class="form-control" id="opened_guest_add" name="opened"required>
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                    </select>
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

      <!-- Update Guest List More Model -->
      <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Guests List Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/guest/update" method="post" id="guestinfoForm">
                {{ csrf_field() }}
                <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}" >
                <input type="hidden" class="form-control" type="text" name="id_guest" id="id_guest" >
                <div class="form-row">
                  <div class="col-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name_guest" name="name">
                  </div>
                  <div class="col-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email_guest" name="email">
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone_guest" name="phone"    >
                  </div>
                  <div class="col-6">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp_guest" name="whatsapp"    >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="mainguest">Main Guest</label>
                    <input type="text" class="form-control" id="mainguest_guest" name="mainguest">
                  </div>
                  <div class="col-6">
                    <label for="notes">Notes</label>
                    <input type="text" class="form-control" id="notes_guest" name="notes"    >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="allergies">Allergies</label>
                    <select  class="form-control" id="allergies_guest" name="allergies" >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="declined">Declined</label>
                    <select class="form-control" id="declined_guest" name="declined"   >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="checkin">Check-In</label>
                    <select  class="form-control" id="checkin_guest" name="checkin" >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="members_number">Members Number</label>
                    <input type="text" class="form-control" id="members_number_guest" name="members_number" >
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-6">
                    <label for="opened">Opened</label>
                    <select class="form-control" id="opened_guest" name="opened">
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>

      <!-- Add New Card Modal -->
      <div class="modal fade " id="AddCardmodel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Card Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/card/added" method="post" id="cardaddForm">
                {{ csrf_field() }}
              <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}">
                <input type="hidden" name="id_card" id="addcard_id_card" >
                <div class="form-row">
                  <div class="col-4">
                    <label for="title1">Title 1</label>
                    <input type="text" class="form-control" id="addcard_title1" name="title1" >
                  </div>
                  <div class="col-4">
                    <label for="title2">Title 2</label>
                            <input type="text" class="form-control" id="addcard_title2" name="title2" >
                          </div>
                  <div class="col-4">
                    <label for="title3">Title 3</label>
                            <input type="text" class="form-control" id="addcard_title3" name="title3"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="title4">Ttile 4</label>
                            <input type="text" class="form-control" id="addcard_title4" name="title4"  >
                          </div>
                  <div class="col-4">
                    <label for="titleFont">Ttile Font</label>
                            <input type="text" class="form-control" id="addcard_titleFont" name="titleFont"  >
                          </div>
                  <div class="col-4">
                    <label for="titleColor">Title Color</label>
                            <input type="text" class="form-control" id="addcard_titleColor" name="titleColor"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="name1">Name 1</label>
                            <input type="text" class="form-control" id="addcard_name1" name="name1" >
                          </div>
                  <div class="col-4">
                    <label for="name2">Name 2</label>
                            <input type="text" class="form-control" id="addcard_name2" name="name2" >
                          </div>
                  <div class="col-4">
                    <label for="cermony">Cermony</label>
                            <input type="text" class="form-control" id="addcard_cermony" name="cermony"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="cermonyFont">Cermony Font</label>
                            <input type="text" class="form-control" id="addcard_cermonyFont" name="cermonyFont"  >
                          </div>
                  <div class="col-4">
                    <label for="cermonyColor">Cermony Color</label>
                            <input type="text" class="form-control" id="addcard_cermonyColor" name="cermonyColor"  >
                          </div>
                  <div class="col-4">
                    <label for="other1">Other 1</label>
                            <input type="text" class="form-control" id="addcard_other1" name="other1">
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="other2">Other 2</label>
                            <input type="text" class="form-control" id="addcard_other2" name="other2">
                          </div>
                  <div class="col-4">
                    <label for="other3">Other 3</label>
                            <input type="text" class="form-control" id="addcard_other3" name="other3" >
                          </div>
                  <div class="col-4">
                    <label for="otherFont">Other Font</label>
                            <input type="text" class="form-control" id="addcard_otherFont" name="otherFont">
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="otherColor">Other Color</label>
                            <input type="text" class="form-control" id="addcard_otherColor" name="otherColor">
                          </div>
                  <div class="col-4">
                    <label for="bgName">Background Image</label>
                            <input type="text" class="form-control" id="addcard_bgName" name="bgName">
                            
                          </div>
                  <div class="col-4">
                    <label for="cardName">Card Image</label>
                            <input type="text" class="form-control" id="addcard_cardName" name="cardName">
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="fontColor">Font Color</label>
                            <input type="text" class="form-control" id="addcard_fontColor" name="fontColor" >
                          </div>
                  <div class="col-4">
                    <label for="fontFamily">Font Family</label>
                            <input type="text" class="form-control" id="addcard_fontFamily" name="fontFamily">
                          </div>
                  <div class="col-4">
                    <label for="customCard">Custom Card</label>
                            <input type="text" class="form-control" id="addcard_customCard" name="customCard">
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="cardColorOut">Card Color Out</label>
                            <input type="text" class="form-control" id="addcard_cardColorOut" name="cardColorOut">
                          </div>
                  <div class="col-4">
                    <label for="cardColorIn">Card Color In</label>
                            <input type="text" class="form-control" id="addcard_cardColorIn" name="cardColorIn">
                          </div>
                  <div class="col-4">
                    <label for="rsvp">RSVP</label>
                            <input type="text" class="form-control" id="addcard_rsvp" name="rsvp">
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="msgTitle">Message Title</label>
                            <input type="text" class="form-control" id="addcard_msgTitle" name="msgTitle">
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

      <!-- Update Card Modal -->
      <div class="modal fade " id="editCardmodel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Card Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/card/update" method="post" id="cardupdateForm">
                {{ csrf_field() }}
              <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}">
                <input type="hidden" name="id_card" id="card_id_card" >
                <div class="form-row">
                  <div class="col-4">
                    <label for="title1">Title 1</label>
                    <input type="text" class="form-control" id="card_title1" name="title1" >
                  </div>
                  <div class="col-4">
                    <label for="title2">Title 2</label>
                            <input type="text" class="form-control" id="card_title2" name="title2" >
                          </div>
                  <div class="col-4">
                    <label for="title3">Title 3</label>
                            <input type="text" class="form-control" id="card_title3" name="title3"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="title4">Ttile 4</label>
                            <input type="text" class="form-control" id="card_title4" name="title4"  >
                          </div>
                  <div class="col-4">
                    <label for="titleFont">Ttile Font</label>
                            <input type="text" class="form-control" id="card_titleFont" name="titleFont"  >
                          </div>
                  <div class="col-4">
                    <label for="titleColor">Title Color</label>
                            <input type="text" class="form-control" id="card_titleColor" name="titleColor"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="name1">Name 1</label>
                            <input type="text" class="form-control" id="card_name1" name="name1" >
                          </div>
                  <div class="col-4">
                    <label for="name2">Name 2</label>
                            <input type="text" class="form-control" id="card_name2" name="name2" >
                          </div>
                  <div class="col-4">
                    <label for="cermony">Cermony</label>
                            <input type="text" class="form-control" id="card_cermony" name="cermony"  >
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="cermonyFont">Cermony Font</label>
                            <input type="text" class="form-control" id="card_cermonyFont" name="cermonyFont"  >
                          </div>
                  <div class="col-4">
                    <label for="cermonyColor">Cermony Color</label>
                            <input type="text" class="form-control" id="card_cermonyColor" name="cermonyColor"  >
                          </div>
                  <div class="col-4">
                    <label for="other1">Other 1</label>
                            <input type="text" class="form-control" id="card_other1" name="other1">
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="other2">Other 2</label>
                            <input type="text" class="form-control" id="card_other2" name="other2">
                          </div>
                  <div class="col-4">
                    <label for="other3">Other 3</label>
                            <input type="text" class="form-control" id="card_other3" name="other3" >
                          </div>
                  <div class="col-4">
                    <label for="otherFont">Other Font</label>
                            <input type="text" class="form-control" id="card_otherFont" name="otherFont">
                          </div>
                </div>
                  <div class="form-row">
                  <div class="col-4">
                    <label for="otherColor">Other Color</label>
                            <input type="text" class="form-control" id="card_otherColor" name="otherColor">
                          </div>
                  <div class="col-4">
                    <label for="bgName">Background Image</label>
                            <a href="">view<input type="text" class="form-control" id="card_bgName" name="bgName">
                            </a>
                          </div>
                  <div class="col-4">
                    <label for="cardName">Card Image</label>
                            <a href="">view<input type="text" class="form-control" id="card_cardName" name="cardName"> </a>
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="fontColor">Font Color</label>
                            <input type="text" class="form-control" id="card_fontColor" name="fontColor" >
                          </div>
                  <div class="col-4">
                    <label for="fontFamily">Font Family</label>
                            <input type="text" class="form-control" id="card_fontFamily" name="fontFamily">
                          </div>
                  <div class="col-4">
                    <label for="customCard">Custom Card</label>
                            <input type="text" class="form-control" id="card_customCard" name="customCard">
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="cardColorOut">Card Color Out</label>
                            <input type="text" class="form-control" id="card_cardColorOut" name="cardColorOut">
                          </div>
                  <div class="col-4">
                    <label for="cardColorIn">Card Color In</label>
                            <input type="text" class="form-control" id="card_cardColorIn" name="cardColorIn">
                          </div>
                  <div class="col-4">
                    <label for="rsvp">RSVP</label>
                            <input type="text" class="form-control" id="card_rsvp" name="rsvp">
                          </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <label for="msgTitle">Message Title</label>
                            <input type="text" class="form-control" id="card_msgTitle" name="msgTitle">
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--Add Guest Table Modal -->
      <div class="modal fade" id="guesttablemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Guest Table</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/table/added" method="post" id="addtableform">
                {{ csrf_field() }}
                <input type="hidden" class="form-control"  name="id_event" value="{{$value->id_event}}">
                <label for="name">Table Name</label>
                <input type="text" class="form-control" id="form_name_table" name="name" required >
                <label for="number">Number</label>
                <input type="number" class="form-control" id="form_number" name="number" required >
                <label for="guest_number">Guest Numbers</label>
                <input type="number" class="form-control" id="form_guest_number" name="guest_number" required >
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
               </form>
            </div>
          </div>
        </div>
      </div>

      <!--Update Guest Table Modal -->
      <div class="modal fade" id="editguesttablemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Guest Table</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/table/updated" method="post" id="guesttableinfoForm">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="id_event2" name="id_event" value="{{$value->id_event}}">
                <input type="hidden" class="form-control" id="id_table2" name="id_table" value="">
                <label for="name">Table Name</label>
                <input type="text" class="form-control" id="form_name_table2" name="name" required >
                <label for="number">Number</label>
                <input type="number" class="form-control" id="form_number2" name="number" required >
                <label for="guest_number">Guest Numbers</label>
                <input type="number" class="form-control" id="form_guest_number2" name="guest_number" required >
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
               </form>
            </div>
          </div>
        </div>
      </div>
 {{-- End Modals --}}

@include('footer');


<script>
  // Added Guest List Swal
  $('#addguestinfoForm').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'New Guest List Added',
      timer:5000
    })
  })

  // Guests List Get Data in Model  
  function getuserDatafromDB(value){
    const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         let res = JSON.parse(this.responseText);
         console.log(this.responseText);
         console.log(res);
         res = res[0];
         document.getElementById('id_guest').value = res.id_guest;
         document.getElementById('name_guest').value = res.name;
            document.getElementById('email_guest').value = res.email;
            document.getElementById('phone_guest').value = res.phone;
            document.getElementById('whatsapp_guest').value = res.whatsapp;
            document.getElementById('mainguest_guest').value = res.mainguest;
            document.getElementById('notes_guest').value = res.notes;
            document.getElementById('allergies_guest').value = res.allergies;
            document.getElementById('declined_guest').value = res.declined;
            document.getElementById('checkin_guest').value = res.checkin;
            document.getElementById('members_number_guest').value = res.members_number;
            document.getElementById('opened_guest').value = res.opened;
       }
     };
     xhttp.open("GET","/api/guestList/"+value);
     xhttp.send();
     // Updated Swal
    $('#guestinfoForm').submit(function(){
          swal({
            title: "Updated",
            text: "Guest Updated",
            icon: "success",
          });
    });
  }

  // Delete guest from guest list Data
  function deleteGuestDatafromDB(idEvent, idUser, idGuest)
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
                swal("Your Guest Data has been deleted!", {
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
      xhttp.open("GET","/api/deleteguest/"+idUser+"/"+idEvent+"/"+idGuest);
      xhttp.send();
      
      //---------------
        }
      });
    console.log("deleteGuestDatafromDB");
  }

  // General Information Get Data in Model
  function getGeneralInfoDatafromDB(idEvent, idUser){
    const xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let res = JSON.parse(this.responseText);
        console.log(this.responseText);
        console.log(res);
        res = res[0];
        document.getElementById('id_event_generalinfo').value = res.id_event;
        document.getElementById('name_generalinfo_model').value = res.name;
        document.getElementById('date_generalinfo_model').value = res.date;
        document.getElementById('summary_generalinfo_model').value = res.summary;
      }
    };
    xhttp.open("GET","/api/generalInformation/"+idUser+"/"+idEvent);
    xhttp.send();
    // Updated Swal
    $('#generalinfoForm').submit(function(){
          swal({
            title: "Updated",
            text: "Event Updated",
            icon: "success",
          });
    });
  }

  // Added Meal Swal
  $('#addmealform').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'New Meal Added',
      timer:5000
    })
  })
  
  // Meal Get Data in Model  
  function getmealDatafromDB(value){
    const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         let res = JSON.parse(this.responseText);
         console.log(this.responseText);
         console.log(res);
         res = res[0];
         document.getElementById('meal_id_event').value = res.id_event;
         document.getElementById('meal_id_meal').value = res.id_meal;
         document.getElementById('meal_name').value = res.name;
            document.getElementById('meal_description').value = res.description;
       }
     };
     xhttp.open("GET","/api/mealdata/"+value);
     xhttp.send();
     // Updated Swal
    $('#mealinfoForm').submit(function(){
          swal({
            title: "Updated",
            text: "Meal Data Updated",
            icon: "success",
          });
    });
  }

  // Delete Meal Data
  function deleteMealDatafromDB(idEvent, idUser, idMeal)
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
                swal("Your Meal Item has been deleted!", {
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
      xhttp.open("GET","/api/deletemeal/"+idUser+"/"+idEvent+"/"+idMeal);
      xhttp.send();
      
      //---------------
        }
      });
    console.log("deleteMealDatafromDB");
  }
  
  // Card Get Data in Model  
    //   function getCardImagesfromDB(value){
    //     const xhttp = new XMLHttpRequest();
    //       xhttp.onreadystatechange = function() {
    //        if (this.readyState == 4 && this.status == 200) {
    //          let res = JSON.parse(this.responseText);
    //          console.log(this.responseText);
    //          console.log(res);
    //          res = res[0];
    //          document.getElementById('card_id_card2').value = res.id_card;
    //          document.getElementById('bg_card2').value = res.bg_card;
    //          document.getElementById('img_card2').value = res.img_card;
    //        }
    //      };
    //      xhttp.open("GET","/api/cardimages/"+value);
    //      xhttp.send();
    //      // Updated Swal
    //     // $('#cardupdateForm').submit(function(){
    //     //       swal({
    //     //         title: "Updated",
    //     //         text: "Card Updated",
    //     //         icon: "success",
    //     //       });
    //     // });
  // }

  $('#addcardimgForm').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'Card Images Added',
      timer:5000
    })
  })

  // Added Card Swal
  $('#cardaddForm').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'Card Details Added',
      timer:5000
    })
  })
    // Card Get Data in Model  
  function getCardDatafromDB(value){
    const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         let res = JSON.parse(this.responseText);
         console.log(this.responseText);
         console.log(res);
         res = res[0];
         document.getElementById('card_id_card').value = res.id_card;
         document.getElementById('card_title1').value = res.title1;
            document.getElementById('card_title2').value = res.title2;
            document.getElementById('card_title3').value = res.title3;
            document.getElementById('card_title4').value = res.title4;
            document.getElementById('card_titleFont').value = res.titleFont;
            document.getElementById('card_titleColor').value = res.titleColor;
            document.getElementById('card_name1').value = res.name1;
            document.getElementById('card_name2').value = res.name2;
            document.getElementById('card_cermony').value = res.cermony;
            document.getElementById('card_cermonyFont').value = res.cermonyFont;
            document.getElementById('card_cermonyColor').value = res.cermonyColor;
            document.getElementById('card_other1').value = res.other1;
            document.getElementById('card_other2').value = res.other2;
            document.getElementById('card_other3').value = res.other3;
            document.getElementById('card_otherFont').value = res.otherFont;
            document.getElementById('card_otherColor').value = res.otherColor;
            document.getElementById('card_bgName').value = res.bgName;
            document.getElementById('card_cardName').value = res.cardName;
            document.getElementById('card_fontColor').value = res.fontColor;
            document.getElementById('card_fontFamily').value = res.fontFamily;
            document.getElementById('card_customCard').value = res.customCard;
            document.getElementById('card_cardColorOut').value = res.cardColorOut;
            document.getElementById('card_cardColorIn').value = res.cardColorIn;
            document.getElementById('card_rsvp').value = res.rsvp;
            document.getElementById('card_msgTitle').value = res.msgTitle;
            document.getElementById('card_bg_card').value = res.bg_card;
            document.getElementById('card_img_card').value = res.img_card;
       }
     };
     xhttp.open("GET","/api/cardList/"+value);
     xhttp.send();
     // Updated Swal
    $('#cardupdateForm').submit(function(){
          swal({
            title: "Updated",
            text: "Card Updated",
            icon: "success",
          });
    });
  }

  // Added Guest Table Swal
  $('#addtableform').submit(function(){
    swal({
      title:'Success',
      icon:'success',
      text:'New Guest Table Added',
      timer:5000
    })
  })

  // Guest Table Get Data in Model  
  function getGuestTableDatafromDB(value){
    const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         let res = JSON.parse(this.responseText);
         console.log(this.responseText);
         console.log(res);
         res = res[0];
         document.getElementById('id_event2').value = res.id_event;
         document.getElementById('id_table2').value = res.id_table;
         document.getElementById('form_name_table2').value = res.name;
            document.getElementById('form_number2').value = res.number;
            document.getElementById('form_guest_number2').value = res.guest_number;
       }
     };
     xhttp.open("GET","/api/tableList/"+value);
     xhttp.send();
     // Updated Swal
    $('#guesttableinfoForm').submit(function(){
          swal({
            title: "Updated",
            text: "Guest Table Updated",
            icon: "success",
          });
    });
  }

  // Delete Guest Table Data
  function deleteTableDatafromDB(idEvent, idUser, idTable)
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
                swal("Your Guest Table has been deleted!", {
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
      xhttp.open("GET","/api/deletetable/"+idUser+"/"+idEvent+"/"+idTable);
      xhttp.send();
      
      //---------------
        }
      });
    console.log("deleteTableDatafromDB");
  }

 // function updateGeneralInfo(valueID){
  //     document.getElementById('id_event_generalinfo').value = valueID;
  //     document.getElementById('name_generalinfo_model').value = document.getElementById('name_generalinfo').value;
  //     document.getElementById('date_generalinfo_model').value = document.getElementById('date_generalinfo').value;
  //     document.getElementById('summary_generalinfo_model').value =  document.getElementById('summary_generalinfo').value;
  // }
</script>

    {{-- Edit Delete button Styling --}}
    <style>
      button svg{
        height: 15px;
        width: 15px;
        margin-right: 5px;
      }
    </style>
    