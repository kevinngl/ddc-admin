<x-office-layout title="Campaign">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body pt-15">
                        <!--begin::Summary-->
                        <div class="d-flex flex-center flex-column mb-5">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="assets/media/avatars/150-2.jpg" alt="image" />
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                    </div>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Name-->
                            <a href="#"
                                class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $data['title'] }}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            @if ($data['status'] === 'approved')
                                <div class="badge badge-light-success fw-bolder mb-6">Diterima</div>
                            @elseif ($data['status'] === 'request-revision')
                                <div class="badge badge-light-warning fw-bolder mb-6">Revisi</div>
                                <div class="text-muted fw-bold fs-5 mb-5">
                                    {{ $data['notes'] }}
                                </div>
                            @elseif ($data['status'] === 'rejected')
                                <div class="badge badge-light-danger fw-bolder mb-6">Ditolak</div>
                            @elseif ($data['status'] === 'waiting-for-approval')
                                <div class="badge badge-light-info fw-bolder mb-6">Menunggu</div>
                            @endif
                            <!--end::Position-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px">Rp. {{ $data['donationAchieved'] ?? '0' }}</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                        width="2" height="14" rx="1" />
                                                    <path
                                                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">Terkumpul</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px">Rp.
                                            {{ number_format($data['donationTarget']) ?? '0' }}</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                        width="2" height="14" rx="1" />
                                                    <path
                                                        d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">Target Dana</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px">{{ $data['duration'] ?? '0' }} Hari</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                        width="2" height="14" rx="1" />
                                                    <path
                                                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">Durasi</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_customer_view_details" role="button" aria-expanded="false"
                                aria-controls="kt_customer_view_details">Details
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>

                            @if (session('user')->user->role->name === 'supervisor')
                                <div class="btn-group" role="group">
                                    <button id="aksi" type="button"
                                        class="btn btn-sm btn-light btn-active-light-primary"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        aria-labelledby="aksi">
                                        <div class="menu-item px-3">
                                            <a href="javascript:;"
                                                onclick="handle_open_modal('{{ route('campaign.accept', $data['id']) }}','#ModalCreateCategory','#contentCategoryModal');"
                                                class="menu-link px-3">Approve</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="javascript:;"
                                                onclick="handle_open_modal('{{ route('campaign.reject', $data['id']) }}','#ModalCreateCategory','#contentCategoryModal');"
                                                class="menu-link px-3">Tolak</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="javascript:;"
                                                onclick="handle_open_modal('{{ route('campaign.revise', $data['id']) }}','#ModalCreateCategory','#contentCategoryModal');"
                                                class="menu-link px-3">Revisi</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($data['status'] === 'request-revision')
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Edit customer details">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#ModalUpdateCampaign">Edit</a>
                                    </span>
                                @endif
                            @endif
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Details content-->
                        <div id="kt_customer_view_details" class="collapse show">
                            <div class="py-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Kategori</div>
                                <div class="text-gray-600">{{ $data['category']['name'] }}</div>
                                <div class="fw-bolder mt-5">Durasi</div>
                                <div class="text-gray-600">{{ strftime('%e %B %Y', strtotime($data['startDate'])) }}
                                    to
                                    {{ strftime('%e %B %Y', strtotime($data['endDate'])) }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">PIC</div>
                                <div class="text-gray-600">
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary">{{ $data['pic']['name'] ?? 'N/A' }}</a>
                                </div>
                                <div class="fw-bolder mt-5">Tanggal Dibuat</div>
                                <div class="text-gray-600">
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary">{{ strftime('%e %B %Y, %H:%M', strtotime($data['createdAt'])) }}
                                        WIB</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Payment Records</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                    fill="#12131A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                    fill="#12131A" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Add payment
                                    </button>
                                    <!--end::Filter-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 pb-5">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed gy-5"
                                    id="kt_table_customers_payment">
                                    <!--begin::Table head-->
                                    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-100px">Invoice No.</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="text-end min-w-70px pe-4">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fs-6 fw-bold text-gray-600">
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Invoice=-->
                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary mb-1">9131-8282</a>
                                            </td>
                                            <!--end::Invoice=-->
                                            <!--begin::Status=-->
                                            <td>
                                                <span class="badge badge-light-success">Successful</span>
                                            </td>
                                            <!--end::Status=-->
                                            <!--begin::Amount=-->
                                            <td>$1,200.00</td>
                                            <!--end::Amount=-->
                                            <!--begin::Date=-->
                                            <td>14 Dec 2020, 8:43 pm</td>
                                            <!--end::Date=-->
                                            <!--begin::Action=-->
                                            <td class="pe-0 text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-light btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-flip="top-end">Actions
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="apps/customers/view.html"
                                                            class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Download</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                        <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <div class="modal fade" id="ModalUpdateCampaign" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="#" id="form_update_campaign" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_update_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">Ubah Kampanye</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_modal_update_customer_close"
                                class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16"
                                                height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2"
                                                rx="1" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        {{-- KEVIN --}}
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                                data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
                                data-kt-scroll-offset="300px">
                                <!--begin::User form-->
                                <div id="kt_modal_update_customer_user_info" class="collapse show">

                                    <!--begin::Input group-->
                                    <div class="mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span>Ubah Gambar</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Allowed file types: png, jpg, jpeg."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Image input wrapper-->
                                        <div class="mt-1">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url(assets/media/avatars/blank.png)">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url(assets/media/avatars/150-2.jpg)">
                                                </div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Edit-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Edit-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                        </div>
                                        <!--end::Image input wrapper-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <label for="nama_users" class="required fw-bold fs-6 mb-2">Pilih Kategori
                                            Donasi</label>
                                        <select class="form-control selectpicker " name="campaignCategoryId" required>
                                            <option selected disabled>Pilih Kategori</option>
                                            @foreach ($category as $item)
                                                <option
                                                    value="{{ $item['id'] }}"{{ $item['id'] == $data['campaignCategoryId'] ? 'selected' : '' }}>
                                                    {{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="title" class="required fw-bold fs-6 mb-2">Judul Program</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" id="title" name="title"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="Masukan judul program" value="{{ $data['title'] }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="duration" class="required fw-bold fs-6 mb-2">Batas Waktu</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="kt_daterangepicker_2" name="duration"
                                            class="form-control form-control-solid" placeholder="Masukan batas waktu"
                                            value="{{ $data['duration'] }}" />

                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="donationTarget" class="required fw-bold fs-6 mb-2">Target Dana
                                            (Rp)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="tel" id="donationTarget" name="donationTarget"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="Masukan target nominal"
                                            value="{{ $data['donationTarget'] }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="description" class="required fw-bold fs-6 mb-2">Deskripsi</label>
                                        <!--d::Label-->
                                        <!--begin::Input-->
                                        <textarea name="description" id="description" cols="30" rows="5"
                                            class="form-control form-control-solid mb-3 mb-lg-0">{{ $data['description'] }}</textarea>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::User form-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <div id="kt_modal_update_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">
                                Discard
                            </div>
                            <button id="tombol_update_campaign"
                                onclick="upload_form_modal('#tombol_update_campaign','#form_update_campaign','{{ route('campaign.update', $data['id']) }}','#ModalUpdateCampaign','PUT');"
                                class="btn btn-primary">
                                Submit
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</x-office-layout>
<script>
    ribuan('donationTarget');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    $("#kt_daterangepicker_2").flatpickr({
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
    });
</script>
