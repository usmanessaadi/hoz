@extends('layouts.app')

@push('style')
    <!-- int-tel -->
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/int-tel/build/css/intlTelInput.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="main">

        <!--account menu sidebar-->
         @include('layouts.account-sidebar')
        <!-- End account menu sidebar-->

        <div class="my_account account_addresses p-0 m-0">
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title d-flex justify-content-between align-items-center">Addresses
                    <a href="#0" id="openAddNewAddressModel" data-toggle="modal" data-target="#AddAddressModel"><img src="{{asset('/assets/svg/plus_ic.svg')}}"
                                                                                         class="mr-2" alt="add address">Add a new
                        address</a>

                </h5>
                <div class="account_addresses_container">

                    @if(Auth::user()->user_default_address() != null)
                     <div class="card card_address default_address">
                        <div class="card-body">
                            <p class="address_name">
                                {{Auth::user()->user_default_address()->full_name}}
                            </p>
                            <p class="address">
                                {{Auth::user()->user_default_address()->address}}
                            </p>
                            <a href="#0" class="set_address_link default_address_link d-flex align-items-center">
                                <img src="{{asset('assets/svg/default_address_ic.svg')}}" alt="icon" class="mr-2">
                                Default address</a>
                        </div>
                        <div class="card-footer bg-white address_actions">
                            <a href="#0" class="btn ">EDIT</a>
                            <a href="{{Route('delete_address', Auth::user()->user_default_address()->id)}}"
                               class="btn"
                               onclick="event.preventDefault();
                                       document.getElementById('delete_address-form{{Auth::user()->user_default_address()->id}}').submit();"
                               style="color: red"
                            >DELETE</a>
                            <form id="delete_address-form{{Auth::user()->user_default_address()->id}}" action="{{Route('delete_address',Auth::user()->user_default_address()->id)}}" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endif
                    @forelse (Auth::user()->user_addresses as $ad )

                            @if($ad->default_address == 0)

                             <div class="card card_address ">
                                <div class="card-body">
                                    <p class="address_name">
                                        {{$ad->full_name}}
                                    </p>
                                    <p class="address">
                                        {{$ad->address}}
                                    </p>
                                    <a href="{{Route('set_default_address',$ad->id)}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('set_default_address-form{{$ad->id}}').submit();"
                                       class="set_address_link">Set As Default</a>
                                    <form id="set_default_address-form{{$ad->id}}" action="{{Route('set_default_address',$ad->id)}}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf
                                    </form>
                                </div>
                                <div class="card-footer bg-white address_actions">
                                    <a href="#0" class="btn ">EDIT</a>

                                    <a href="{{Route('delete_address',$ad->id)}}"
                                       class="btn"
                                       onclick="event.preventDefault();
                                               document.getElementById('delete_address-form{{$ad->id}}').submit();"
                                       style="color: red"
                                       >DELETE</a>
                                    <form id="delete_address-form{{$ad->id}}" action="{{Route('delete_address',$ad->id)}}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            @endif
                    @empty
                        <span>you've not added any address yet</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade confirmation_modal add_address_modal " id="AddAddressModel" tabindex="-1" role="dialog"
         aria-labelledby="AddAddressModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add A New Address</h5>
                </div>
                <div class="modal-body">
                    <form id="add_new_user_address-form" action="{{Route('add_new_user_address')}}" method="POST" >
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer01">Full Name</label>
                                <input type="text" class="form-control Dis-valid" id="validationServer01"
                                       name="full_name" value="Jhon Doe" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="phone_number">Phone number</label>
                                <input id="phone_number" type="tel" class="form-control validate @error('phone_number') is-invalid @enderror"  value="{{ old('phone_number') }}"  required >
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="street">Street</label>
                                <input type="text" class="form-control Dis-valid" id="street" name="street"
                                       value="{{old('street')}}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apartment_unit_etc">Apartment, Unit, etc</label>
                                <input type="text" class="form-control Dis-invalid" id="apartment_unit_etc"
                                       name="apartment_unit_etc" value="{{old('apartment_unit_etc')}} " required>
                                @error('apartment_unit_etc')
                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="countryId">Country</label>
                                <select name="country" class="browser-default custom-select countries order-alpha limit-pop-1000000  group-continents group-order-alpha validate" id="countryId">
                                    {{--<option value="" disabled selected>Select Country</option>--}}
                                    @if(old('country'))
                                        <option value="" disabled >Select Country</option>
                                        <option value="{{old('country')}}" selected="selected"> {{old('country')}} </option>
                                    @else
                                        <option value="" disabled selected>Select Country</option>
                                    @endif
                                </select>
                                @error('country')
                                <div class="invalid-feedback" role="alert">
                                    <strong>select country please</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stateId">State</label>
                                <select name="state" class="browser-default custom-select states order-alpha" id="stateId">
                                    {{--<option value="" disabled >Select State</option>--}}
                                    @if(old('state'))
                                        <option value="{{old('state')}}" selected="selected" >{{old('state')}}</option>
                                    @else
                                        <option value="" disabled selected>Select State</option>
                                    @endif
                                </select>
                                @error('state')
                                <div class="invalid-feedback" role="alert">
                                    <strong>select state please</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="cityId">City</label>
                                <select name="city" class="browser-default custom-select cities order-alpha" id="cityId">
                                    <option value="" disabled selected>Select City</option>
                                    @if(old('city'))
                                        <option value="{{old('city')}}" selected="selected" >{{old('city')}}</option>
                                    @else
                                        <option value="" disabled selected>Select City</option>
                                    @endif
                                </select>
                                @error('city')
                                <div class="invalid-feedback" role="alert">
                                    <strong>select city please</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationServer02">Zip Code</label>
                                <input type="text" class="form-control Dis-valid" id="validationServer02" name="zip_code"
                                       value="40050" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2 mt-2">
                            <input type="checkbox" name="default_address" class="custom-control-input" id="make_address_default" value="1" />
                            <label class="custom-control-label product_requirement pl-2" for="make_address_default">
                                Set As Default
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary save-btn mt-5 float-right">Save </button>
                        <a href="#0" class="btn btn-exit save-btn mr-2 mt-5 float-right" data-dismiss="modal">Close</a>
                        <div class="clearfix"></div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')


    @if($errors->any())
   <script type="text/javascript">

       $(document).ready(function(){
           $("#openAddNewAddressModel").trigger('click');
       });

   </script>
   @endif
    <script src="{{asset('/lib/int-tel/build/js/intlTelInput.js')}}"></script>
    <script type="text/javascript">
        var input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            //Tel Input name
            hiddenInput: "phone_number",
            preferredCountries: ['ma', 'qa','fr'],
            separateDialCode: true,
            utilsScript: "../lib/int-tel/build/js/utils.js",
        });
    </script>
    <script src="{{asset('js/geodata.js')}}" async></script>
@endpush