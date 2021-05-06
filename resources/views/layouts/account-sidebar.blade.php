{{--load this script only in account functionnalities--}}
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

<div class="account_menu p-0 m-0">
    <div class="hoz_card top_menu px-4">
        <ul class="navbar-nav">
            <li class="nav-item @if (\Route::current()->getName() == 'account') active @endif ">
                <a class="nav-link " href="{{Route('account')}}">
                    <svg class="mr-3" id="shop_ic" xmlns="http://www.w3.org/2000/svg" width="17.333"
                         height="16.893" viewBox="0 0 17.333 16.893">
                        <path id="Combined-Shape"
                              d="M10.851,14.508a.938.938,0,0,1-1.877,0H8.035v7.508h3.754v-4.69a.937.937,0,0,1,.938-.941h1.879a.939.939,0,0,1,.938.941v4.69H19.3V14.508h-.938a.938.938,0,0,1-1.877,0H14.6a.938.938,0,0,1-1.877,0H10.851Zm0-1.877h1.877v-.939a.938.938,0,0,1,1.877,0v.939h1.877v-.939a.938.938,0,0,1,1.877,0v.939h1.2c.8,0,1.063-.361.817-1.127l-.844-2.627H7.777L6.96,11.5c-.246.766.017,1.127.817,1.127h1.2v-.939a.938.938,0,0,1,1.877,0v.939ZM21.174,14.1v8.856a.938.938,0,0,1-.939.941H7.1a.94.94,0,0,1-.939-.941V14.1a2.577,2.577,0,0,1-.985-3.166l.976-3.039A1.364,1.364,0,0,1,7.373,7H19.96a1.373,1.373,0,0,1,1.224.891l.976,3.039a2.576,2.576,0,0,1-.986,3.166Z"
                              transform="translate(-5 -7)" fill-rule="evenodd" />
                    </svg>

                    My Account<span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-orders') active @endif ">
                <a class="nav-link" href="{{Route('account-orders')}}">
                    <svg class="mr-3" id="promotions_ic" xmlns="http://www.w3.org/2000/svg" width="18.452"
                         height="17.171" viewBox="0 0 18.452 17.171">
                        <path id="Combined-Shape"
                              d="M6.192,15.311a4.194,4.194,0,0,1,0-8.387h7.3l3.269-2.6a1.193,1.193,0,0,1,2.017.979V9.44a1.677,1.677,0,1,1,0,3.355v4.152a1.191,1.191,0,0,1-2.014.979l-3.317-2.615H12.3l.99,4.006a1.461,1.461,0,0,1-1.451,1.855H9.319a1.964,1.964,0,0,1-1.854-1.452L6.376,15.311Zm2.9,4.006a.349.349,0,0,0,.226.188h2.286l-1.036-4.194H8.1Zm-1.64-7.361a.839.839,0,1,1,0-1.677h2.934V8.6h-4.2a2.516,2.516,0,0,0,0,5.032h4.2V11.956ZM17.1,6.209,14.26,8.422a.839.839,0,0,1-.518.179H12.065v5.032h1.677a.839.839,0,0,1,.52.181L17.1,16.055V11.172q0-.027,0-.055t0-.054Z"
                              transform="translate(-2 -4)" fill-rule="evenodd" />
                    </svg>

                    My Orders</a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-saved-product') active @endif ">
                <a class="nav-link" href="{{Route('account-saved-product')}}">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18.025" height="20.149"
                         viewBox="0 0 18.025 20.149">
                        <g id="digital_lock_ic" transform="translate(-401.96 -309.77)">
                            <path id="Path_362" data-name="Path 362"
                                  d="M417.468,314.885H415.78v-3.028a2.084,2.084,0,0,0-2.08-2.087h-9.66a2.083,2.083,0,0,0-2.08,2.087v15.982a2.082,2.082,0,0,0,2.08,2.08h9.66a2.082,2.082,0,0,0,2.08-2.08V319.9h1.688a2.509,2.509,0,1,0,0-5.019ZM414.3,327.839a.6.6,0,0,1-.6.6h-9.66a.6.6,0,0,1-.6-.6V311.857a.6.6,0,0,1,.6-.607h9.66a.6.6,0,0,1,.6.607v3.028h-2.006a4.256,4.256,0,1,0,0,5.019H414.3Zm-4.619-7.935h.363a2.719,2.719,0,0,1-1.177.267,2.776,2.776,0,0,1,0-5.552,2.719,2.719,0,0,1,1.177.267h-.363a2.509,2.509,0,1,0,0,5.019Zm7.787-1.48h-7.787a1.029,1.029,0,1,1,0-2.058h7.787a1.029,1.029,0,1,1,0,2.058Z"
                                  transform="translate(0)" />
                        </g>
                    </svg>

                    Saved Products</a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-recently-seen-product') active @endif ">
                <a class="nav-link" href="{{Route('account-recently-seen-product')}}">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="20.249" height="23.417"
                         viewBox="0 0 20.249 23.417">
                        <g id="doors_nd_gates_ic" transform="translate(-364.5 -306.723)">
                            <path id="Path_364" data-name="Path 364"
                                  d="M382.814,320.753a2.239,2.239,0,0,0-1.453-.6.3.3,0,0,0-.08-.007,2.278,2.278,0,0,0-2.26,2.26,2.262,2.262,0,0,0,2.26,2.26.3.3,0,0,0,.08-.007,2.239,2.239,0,0,0,1.453-.6,2.252,2.252,0,0,0,0-3.314Zm-1.453,2.456a.272.272,0,0,1-.08.007.807.807,0,1,1,0-1.613.272.272,0,0,1,.08.007.8.8,0,0,1,0,1.6Z"
                                  transform="translate(-4.756 -4.393)" />
                            <path id="Path_363" data-name="Path 363"
                                  d="M384.216,308.545l-12.132-1.8a.651.651,0,0,0-.574.133.708.708,0,0,0-.26.547v1.1h-6.066a.7.7,0,0,0-.684.7v18.411a.7.7,0,0,0,.684.7h6.066v1.1a.708.708,0,0,0,.26.547.673.673,0,0,0,.424.154,1.091,1.091,0,0,0,.15-.014l12.132-1.8a.7.7,0,0,0,.533-.687V309.225A.687.687,0,0,0,384.216,308.545Zm-12.966,18.39h-2.838v-14.64h2.838Zm0-16.042h-3.522a.69.69,0,0,0-.684.7v15.341h-1.176V309.926h5.382Zm12.132,16.182-10.764,1.488V308.3l10.764,1.488Z" />
                        </g>
                    </svg>

                    Recently Seen</a>
            </li>
        </ul>
    </div>
    <div class="hoz_card bottom_menu mt-2 px-4">
        <ul class="navbar-nav">
            <li class="nav-item @if (\Route::current()->getName() == 'account-personal-info') active @endif ">
                <a class="nav-link" href="{{Route('account-personal-info')}}">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18.004" height="21.41"
                         viewBox="0 0 18.004 21.41">
                        <g id="accessories_ic" transform="translate(-300.18 -307.72)">
                            <path id="Path_367" data-name="Path 367"
                                  d="M312.84,323.339a3.7,3.7,0,0,0-3.009,0,3.733,3.733,0,1,0,3.009,0Zm-1.5,5.72a2.31,2.31,0,1,1,2.313-2.306A2.311,2.311,0,0,1,311.336,329.059Z"
                                  transform="translate(-2.157 -4.443)" />
                            <path id="Path_369" data-name="Path 369"
                                  d="M316,307.72H302.359a2.175,2.175,0,0,0-.057,4.35v2.682a4.131,4.131,0,0,0,1.59,3.257,6.823,6.823,0,1,0,10.581,0,4.131,4.131,0,0,0,1.59-3.257V312.07a2.175,2.175,0,0,0-.057-4.35Zm-1.419,14.59a5.4,5.4,0,0,1-10.808,0,5.334,5.334,0,0,1,1.4-3.612,3.81,3.81,0,0,1,.6-.575,5.073,5.073,0,0,1,.993-.646,5.351,5.351,0,0,1,4.826,0,5.073,5.073,0,0,1,.993.646,3.857,3.857,0,0,1,.6.575A5.382,5.382,0,0,1,314.586,322.31Zm.057-7.558A2.712,2.712,0,0,1,313.457,317a6.8,6.8,0,0,0-8.551,0,2.712,2.712,0,0,1-1.185-2.242V312.2h10.921ZM316,310.658H302.359a.759.759,0,1,1,0-1.519H316a.759.759,0,1,1,0,1.519Z"
                                  transform="translate(0 0)" />
                        </g>
                    </svg>

                    Personal Information</a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-addresses') active @endif ">
                <a class="nav-link" href="{{Route('account-addresses')}}">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16.833" height="16.833"
                         viewBox="0 0 16.833 16.833">
                        <g id="hmc_ic" transform="translate(-4 -4)">
                            <path id="Combined-Shape"
                                  d="M13.258,15.362h.421a.842.842,0,0,1,0,1.683H11.154a.842.842,0,0,1,0-1.683h.421V12.837h-.418a.842.842,0,1,1,0-1.683h1.258a.843.843,0,0,1,.844.842Zm-.842,5.471a8.417,8.417,0,1,1,8.417-8.417A8.417,8.417,0,0,1,12.417,20.833Zm0-1.683a6.733,6.733,0,1,0-6.733-6.733A6.733,6.733,0,0,0,12.417,19.15Zm0-8.837A1.262,1.262,0,1,1,13.679,9.05,1.262,1.262,0,0,1,12.417,10.312Z"
                                  fill-rule="evenodd" />
                        </g>
                    </svg>


                    Addresses</a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-change-password') active @endif ">
                <a class="nav-link" href="{{Route('account-change-password')}}">
                    <svg class="mr-3" id="contact_ic" xmlns="http://www.w3.org/2000/svg" width="17.989"
                         height="17.171" viewBox="0 0 17.989 17.171">
                        <path id="Combined-Shape"
                              d="M10.994,20.171a1.635,1.635,0,1,1,1.417-2.453h1.858A1.637,1.637,0,0,0,15.9,16.081V9.54a4.906,4.906,0,0,0-9.812,0v4.5A2.044,2.044,0,0,1,2,14.04V11.584A2.044,2.044,0,0,1,4.044,9.541h.409a6.541,6.541,0,0,1,13.083,0l.409,0a2.045,2.045,0,0,1,2.044,2.043V14.04a2.044,2.044,0,0,1-2.044,2.043h-.409a3.272,3.272,0,0,1-3.267,3.271H12.411A1.635,1.635,0,0,1,10.994,20.171Zm-6.95-8.994a.409.409,0,0,0-.409.408V14.04a.409.409,0,0,0,.818,0V11.177ZM18.353,14.04V11.584a.409.409,0,0,0-.409-.408h-.409v3.271h.409A.408.408,0,0,0,18.353,14.04Zm-9.4-.41A1.227,1.227,0,1,1,10.177,12.4,1.226,1.226,0,0,1,8.95,13.63Zm4.088,0A1.227,1.227,0,1,1,14.265,12.4,1.226,1.226,0,0,1,13.039,13.63Z"
                              transform="translate(-2 -3)" fill-rule="evenodd" />
                    </svg>

                    Change Your Password</a>
            </li>
            <li class="nav-item @if (\Route::current()->getName() == 'account-communication-preferences') active @endif">
                <a class="nav-link" href="{{Route('account-communication-preferences')}}">
                    <svg class="mr-3" id="contact_ic" xmlns="http://www.w3.org/2000/svg" width="17.989"
                         height="17.171" viewBox="0 0 17.989 17.171">
                        <path id="Combined-Shape"
                              d="M10.994,20.171a1.635,1.635,0,1,1,1.417-2.453h1.858A1.637,1.637,0,0,0,15.9,16.081V9.54a4.906,4.906,0,0,0-9.812,0v4.5A2.044,2.044,0,0,1,2,14.04V11.584A2.044,2.044,0,0,1,4.044,9.541h.409a6.541,6.541,0,0,1,13.083,0l.409,0a2.045,2.045,0,0,1,2.044,2.043V14.04a2.044,2.044,0,0,1-2.044,2.043h-.409a3.272,3.272,0,0,1-3.267,3.271H12.411A1.635,1.635,0,0,1,10.994,20.171Zm-6.95-8.994a.409.409,0,0,0-.409.408V14.04a.409.409,0,0,0,.818,0V11.177ZM18.353,14.04V11.584a.409.409,0,0,0-.409-.408h-.409v3.271h.409A.408.408,0,0,0,18.353,14.04Zm-9.4-.41A1.227,1.227,0,1,1,10.177,12.4,1.226,1.226,0,0,1,8.95,13.63Zm4.088,0A1.227,1.227,0,1,1,14.265,12.4,1.226,1.226,0,0,1,13.039,13.63Z"
                              transform="translate(-2 -3)" fill-rule="evenodd" />
                    </svg>

                    Communication Preferences</a>
            </li>
            <li class="nav-item logout">
                <a class="nav-link link_white" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

