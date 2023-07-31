@extends('layouts.employee')
@section('content')
    <!--  Row 1 -->
    <div class="row m-5">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row w-100">
                <div class="col-md-6">
                    <div class="card w-100">
                        <div class="card-header shadow">
                            <div class="card-title text-white fw-bold">Stress</div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-colum justify-content-center align-items-center">
                                <div>

                                </div>
                                <div class="stress-indicator w-100 px-4 py-2 d-flex justify-content-center align-items-center">
                                    <p class="m-0">Normal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header shadow">
                            <div class="card-title text-white fw-bold">Anxiety</div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="round-range-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header shadow d-flex justify-content-between align-items-center">
                            <div class="card-title text-white fw-bold">Depression</div>
                            <div class="form-group">
                                <select name="" id="" class="form-select border-0 text-white">
                                    <option value="">Weekly</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="round-range-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header shadow">
                            <div class="card-title text-white fw-bold">Booked Schedule</div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="round-range-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card w-100">
                <div class="position-relative">
                    <img src="{{asset('assets/emp/images/svgs/card-header.svg')}}" class="w-100" alt="">
                    <div class="circle position-absolute avatar-div shadow">
                        <img width="120" height="120"
                             src="{{auth()->user()->image}}"
                             alt="Avatar">
                    </div>
                </div>
                <div class="card-body mt-5">
                    <div class="d-flex justify-content-center align-items-center flex-column my-3">
                        <h2 class="fw-bold">{{auth()->user()->name}}</h2>
                        <p class="fw-bold">{{auth()->user()->designation}}</p>
                    </div>

                    <div class="d-flex just-content-between align-items-center gap-3 flex-column flex-sm-row">
                        <div class="card w-100">
                            <div class="sleep-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-white">Sleep</div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M6.352 1.14533C6.42208 1.21539 6.46977 1.3047 6.48899 1.40191C6.50822 1.49912 6.49813 1.59986 6.46 1.69133C6.15522 2.4228 5.99885 3.20756 6 3.99999C6 5.59129 6.63214 7.11741 7.75736 8.24263C8.88258 9.36785 10.4087 9.99999 12 9.99999C12.7924 10.0011 13.5772 9.84478 14.3087 9.53999C14.4001 9.50192 14.5007 9.49185 14.5978 9.51105C14.695 9.53025 14.7842 9.57785 14.8543 9.64783C14.9243 9.7178 14.972 9.807 14.9913 9.90411C15.0106 10.0012 15.0006 10.1019 14.9627 10.1933C14.4307 11.4688 13.5332 12.5584 12.3831 13.3247C11.2331 14.0911 9.88199 14.5 8.5 14.5C4.634 14.5 1.5 11.366 1.5 7.49999C1.5 4.58799 3.278 2.09199 5.80667 1.03733C5.89805 0.999339 5.99865 0.989324 6.09573 1.00855C6.1928 1.02778 6.28199 1.07538 6.352 1.14533Z"
                                                  fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="mt-3">70 hours</h2>
                            </div>
                        </div>

                        <div class="card w-100">
                            <div class="activity-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-white">Activity</div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M9.7433 1.06333C9.84092 1.11766 9.91752 1.20312 9.9609 1.30607C10.0043 1.40901 10.0119 1.52353 9.98264 1.63133L8.65464 6.5H13.5C13.5974 6.5 13.6927 6.52848 13.7742 6.58193C13.8557 6.63538 13.9198 6.71147 13.9586 6.80085C13.9974 6.89022 14.0092 6.989 13.9927 7.08502C13.9761 7.18104 13.9318 7.27013 13.8653 7.34133L6.8653 14.8413C6.78906 14.9232 6.68757 14.9771 6.57705 14.9945C6.46654 15.0119 6.35339 14.9917 6.25571 14.9372C6.15803 14.8826 6.08145 14.7969 6.03823 14.6937C5.99501 14.5906 5.98764 14.4759 6.0173 14.368L7.3453 9.5H2.49997C2.40253 9.49999 2.30721 9.47151 2.22574 9.41806C2.14426 9.36462 2.08018 9.28853 2.04137 9.19915C2.00256 9.10977 1.99071 9.011 2.00728 8.91498C2.02385 8.81895 2.06812 8.72987 2.13464 8.65866L9.13464 1.15866C9.21088 1.07709 9.31223 1.02339 9.42254 1.00611C9.53285 0.988837 9.64577 1.00898 9.7433 1.06333Z"
                                                  fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="mt-3">12 hours</h2>
                            </div>
                        </div>
                    </div>

                    <div class="mood-div">
                        <h4 class="fw-bolder">Your mood today</h4>
                        <div class="d-flex justify-content-end align-items-center gap-3 my-4">
                            <div class="mood d-flex justify-content-between w-100 align-items-center">
                                <div class="icon">
                                    <img src="{{asset('assets/emp/assets/images/fine.png')}}" alt="">
                                </div>
                                <span>Fine</span>
                            </div>
                            <div class="active-mood d-flex justify-content-between w-100 align-items-center">
                                <div class="icon">
                                    <img src="{{asset('assets/emp/assets/images/normal.png')}}" alt="">
                                </div>
                                <span>Normal</span>
                            </div>
                            <div class="mood d-flex justify-content-between w-100 align-items-center">
                                <div class="icon">
                                    <img src="{{asset('assets/emp/assets/images/sleeping.png')}}" alt="">
                                </div>
                                <span>Fine</span>
                            </div>
                        </div>
                    </div>

                    <div class="my-5">
                        <ul class="list-unstyled info-list">
                            <li class="d-flex justify-content-start gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <path d="M11.9999 13.43C12.4096 13.43 12.8153 13.3493 13.1939 13.1925C13.5724 13.0357 13.9163 12.8059 14.2061 12.5162C14.4958 12.2265 14.7256 11.8825 14.8824 11.504C15.0392 11.1254 15.1199 10.7197 15.1199 10.31C15.1199 9.90028 15.0392 9.49457 14.8824 9.11603C14.7256 8.73749 14.4958 8.39355 14.2061 8.10383C13.9163 7.81411 13.5724 7.58429 13.1939 7.4275C12.8153 7.2707 12.4096 7.19 11.9999 7.19C11.1724 7.19 10.3788 7.51872 9.79371 8.10383C9.2086 8.68894 8.87988 9.48253 8.87988 10.31C8.87988 11.1375 9.2086 11.9311 9.79371 12.5162C10.3788 13.1013 11.1724 13.43 11.9999 13.43Z"
                                          stroke="#4D5558" stroke-width="1.5"/>
                                    <path d="M3.61995 8.49C5.58995 -0.169998 18.42 -0.159997 20.38 8.5C21.53 13.58 18.37 17.88 15.6 20.54C14.632 21.4735 13.3397 21.9952 11.995 21.9952C10.6502 21.9952 9.35788 21.4735 8.38995 20.54C5.62995 17.88 2.46995 13.57 3.61995 8.49Z"
                                          stroke="#4D5558" stroke-width="1.5"/>
                                </svg>
                                <span>Petailing Jaya, Malaysia</span>
                            </li>
                            <li class="d-flex justify-content-start gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <path d="M13.5 10H17M7 15.5H17M7.5 4H16.5C17.12 4 17.67 4.02 18.16 4.09C20.79 4.38 21.5 5.62 21.5 9V15C21.5 18.38 20.79 19.62 18.16 19.91C17.67 19.98 17.12 20 16.5 20H7.5C6.88 20 6.33 19.98 5.84 19.91C3.21 19.62 2.5 18.38 2.5 15V9C2.5 5.62 3.21 4.38 5.84 4.09C6.33 4.02 6.88 4 7.5 4Z"
                                          stroke="#4D5558" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M10.095 10H10.104M7.09497 10H7.10397" stroke="#4D5558"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Since May 2021</span>
                            </li>
                        </ul>
                    </div>

                    <div class="biography-div mb-5">
                        <h4 class="fw-bolder">Biography</h4>
                        <p class="my-4">
                            The first education is a historian, after
                            some time I felt that this did not suit me
                            and decided to retrain and get a second.
                        </p>
                    </div>
                    <button class="btn custom-btn w-100 border-0 py-3 text-white">Schedule Meeting</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header shadow">
                    <div class="card-title text-white fw-bold">Upcoming Workshop & Mental Health Day</div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div id="calender"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
