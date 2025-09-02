<div class="row">
    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-2 fw-semibold">{{ contactusCount() ?? '' }}</h3>
                        <p class="text-muted fs-13 mb-0">Contact Us</p>

                    </div>
                    <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-danger dash ms-auto box-shadow-primary">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-2 fw-semibold">{{ countChairperson() ?? '' }}</h3>
                        <p class="text-muted fs-13 mb-0">Chairperson</p>

                    </div>
                    <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                            <i class="fa fa-internet-explorer text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-2 fw-semibold">{{ countThakali() ?? '' }}</h3>
                        <p class="text-muted fs-13 mb-0">Thakali</p>

                    </div>
                    <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                            <i class="fa fa-clipboard text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-2 fw-semibold">{{ countNotice() ?? '' }}</h3>
                        <p class="text-muted fs-13 mb-0">News And Events</p>

                    </div>
                    <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                            <i class="fa fa-list-alt text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
