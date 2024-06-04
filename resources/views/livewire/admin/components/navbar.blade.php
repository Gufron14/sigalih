<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-start align-items-center border-end" href="./index.html">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/1.png') }}" alt="" style="width: 30px"> &nbsp;&nbsp;
                <span class="fw-black text-uppercase fs-4 lh-1">sigalih</span>
            </div>
        </a>
        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

            <!-- Search Bar and Menu Toggle-->
            <div class="d-flex align-items-center">

                <!-- Menu Toggle-->
                <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
                    <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Close menu"></i>
                    <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Open Menu"></i>
                </div>
                <!-- / Menu Toggle-->

                <!-- Search Bar-->
                <form class="d-none d-md-flex bg-light rounded px-3 py-1">
                    <input class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-link p-0 text-muted" type="submit"><i class="ri-search-2-line"></i></button>
                </form> <!-- / Search Bar-->

            </div>
            <!-- / Search Bar and Menu Toggle-->

            <!-- Right Side Widgets-->
            <div class="d-flex align-items-center">

                <!-- Notifications-->
                <div class="d-none d-sm-flex dropdown mx-1">
                    <button class="btn-action text-muted" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="f-w-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-100">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </span>
                        <span
                            class="position-absolute top-0 start-50 p-1 bg-success border border-3 border-white rounded-circle mt-n1">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg" aria-labelledby="notificationsDropdown">
                        <div class="dropdown-header d-flex justify-content-between align-items-center">
                            <p class="fw-bolder m-0 text-body">Notifications</p>
                            <span class="badge bg-success-faded text-success rounded-pill">4 new</span>
                        </div>
                        <div class="simplebar-wrapper">
                            <div data-pixr-simplebar>
                                <ul class="list-unstyled m-0 pb-4">
                                    <li class="d-flex py-2 align-items-start">
                                        <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">O</button>
                                        <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                            <div>
                                                <p class="lh-1 mb-2 fw-semibold text-body">Order #123-5567</p>
                                                <p class="text-muted lh-1 mb-2 small">Placed by John Doe at 11:23
                                                    AM</p>
                                            </div>
                                            <small
                                                class="text-muted text-uppercase tracking-wide fw-bold fs-xs">2min</small>
                                        </div>
                                    </li>
                                    <li class="d-flex py-2 align-items-start">
                                        <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">M</button>
                                        <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                            <div>
                                                <p class="lh-1 mb-2 fw-semibold text-body">Mike Johnston</p>
                                                <p class="text-muted lh-1 mb-2 small">Hi Jack, can we setup a
                                                    meeting...</p>
                                            </div>
                                            <small class="text-muted text-uppercase tracking-wide fw-bold fs-xs">1
                                                hr</small>
                                        </div>
                                    </li>
                                    <li class="d-flex py-2 align-items-start">
                                        <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">D</button>
                                        <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                            <div>
                                                <p class="lh-1 mb-2 fw-semibold text-body">Daily Backup</p>
                                                <p class="text-muted lh-1 mb-2 small">Backup completed at 11:59 PM
                                                </p>
                                            </div>
                                            <small
                                                class="text-muted text-uppercase tracking-wide fw-bold fs-xs">3hr</small>
                                        </div>
                                    </li>
                                    <li class="d-flex py-2 align-items-start">
                                        <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">E</button>
                                        <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                            <div>
                                                <p class="lh-1 mb-2 fw-semibold text-body">Event: Staff Review</p>
                                                <p class="text-muted lh-1 mb-2 small">Monthly staff review starts
                                                    in...</p>
                                            </div>
                                            <small
                                                class="text-muted text-uppercase tracking-wide fw-bold fs-xs">4hr</small>
                                        </div>
                                    </li>
                                    <li class="d-flex py-2 align-items-start">
                                        <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">O</button>
                                        <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                            <div>
                                                <p class="lh-1 mb-2 fw-semibold text-body">Order #123-3322</p>
                                                <p class="text-muted lh-1 mb-2 small">Placed by Sally Smith at
                                                    10:07 AM</p>
                                            </div>
                                            <small
                                                class="text-muted text-uppercase tracking-wide fw-bold fs-xs">1d</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div><a class="dropdown-item text-primary fw-bolder text-center border-top pt-3"
                                href="#">See more &rarr;</a></div>
                    </div>
                </div> <!-- / Notifications-->

                <!-- Activity-->
                <button class="btn-action mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivity"
                    aria-controls="offcanvasActivity">
                    <span class="f-w-4 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </span>
                </button> <!-- / Activity-->

                <!-- Messages-->
                <button class="btn-action mx-1" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasMessage" aria-controls="offcanvasMessage">
                    <span class="f-w-4 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </span>
                </button> <!-- / Messages-->

                <!-- Apps-->
                <div class="d-none d-sm-flex dropdown mx-1">
                    <button class="btn-action mx-1" type="button" id="appsDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="f-w-4 text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg" aria-labelledby="appsDropdown">
                        <div class="dropdown-header d-flex justify-content-between align-items-center">
                            <p class="fw-bolder m-0 text-body">My Applications</p>
                        </div>
                        <div class="simplebar-wrapper">
                            <div data-pixr-simplebar>
                                <div class="row g-2 pb-3">
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-1.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Figma</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-2.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Sketch</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-3.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Adobe XD</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-4.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Netlify</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-5.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-6.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Gitlab</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-7.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Click Up</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-8.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Atlassian</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-9.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-10.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Photoshop</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-11.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Illustrator</span>
                                        </a>
                                    </div>
                                    <div class="col-4 h-100">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center flex-column bg-light-hover rounded-2 px-2 py-3 transition-all">
                                            <span class="d-block f-h-8">
                                                <picture>
                                                    <img class="h-100" src="./assets/images/logos/logo-12.svg"
                                                        alt="">
                                                </picture>
                                            </span>
                                            <span class="small fw-bolder text-body mb-0 mt-3">Adobe CC</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><a class="dropdown-item text-primary fw-bolder text-center border-top pt-3"
                                href="#">See more &rarr;</a></div>
                    </div>
                </div> <!-- / Apps-->

                <!-- Profile Menu-->
                <div class="dropdown ms-1">
                    <button class="btn btn-link p-0 position-relative" type="button" id="profileDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <picture>
                            <img class="f-w-10 rounded-circle"
                                src="{{ asset('admin/src/assets/images/profile-small.jpeg') }}"
                                alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <span
                            class="position-absolute bottom-0 start-75 p-1 bg-success border border-3 border-white rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Set Visibility</a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Edit Profile</a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Edit Settings</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="d-flex py-2 align-items-start">
                            <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">J</button>
                            <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                <div>
                                    <p class="lh-1 mb-2 fw-semibold text-body">John Daniels</p>
                                    <p class="text-muted lh-1 mb-2 small">john@email.com</p>
                                </div>
                                <small class="badge bg-success-faded text-success rounded-pill">Pro</small>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Account Settings</a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Logout</a></li>
                    </ul>
                </div> <!-- / Profile Menu-->

            </div>
            <!-- / Notifications & Profile-->
        </div>
    </div>
</nav>
