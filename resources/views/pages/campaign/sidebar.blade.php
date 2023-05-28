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
                        <img src="{{ $data['image']['filePath'] ?? 'https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg' }}"
                            alt="image" />
                        <div
                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                        </div>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Name-->
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $data['title'] }}</a>
                <!--end::Name-->
                <!--begin::Position-->
                @if ($data['status'] === 'approved')
                    <div class="badge badge-light-success fw-bolder mb-6">Diterima</div>
                @elseif ($data['status'] === 'request-revision')
                    <div class="badge badge-light-warning fw-bolder mb-6">Butuh perbaikan</div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2"
                                            height="14" rx="1" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2"
                                            height="14" rx="1" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2"
                                            height="14" rx="1" />
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
                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details"
                    role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Detail
                    <span class="ms-2 rotate-180">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                    @if ($data['status'] == 'request-revision' || $data['status'] == 'waiting-for-approval')
                        <div class="btn-group" role="group">
                            <button id="aksi" type="button"
                                class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
                                        onclick="handle_confirm('Apakah Anda Yakin Ingin Menyetujui?','Yakin','Tidak','PUT','{{ route('campaign.approve', $data['id']) }}');"
                                        class="menu-link px-3">Setuju</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                        data-bs-target="#ModalReviseCampaign">Revisi</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin Ingin Menolak?','Yakin','Tidak','PUT','{{ route('campaign.reject', $data['id']) }}');"
                                        class="menu-link px-3">Tolak</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    @if ($data['status'] === 'request-revision' || $data['status'] === 'waiting-for-approval')
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalUpdateCampaign">Edit</a>
                        </span>
                    @elseif ($data['status'] === 'approved')
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                            <a href="javascript:;"
                                onclick="handle_confirm('Apakah Anda Yakin Ingin Membuat Kampanye Menjadi Live?','Yakin','Tidak','PUT','{{ route('campaign.setToLive', $data['id']) }}');"
                                class="menu-link px-3">Set To Live</a>
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
                    <div class="fw-bolder mt-5">Deskripsi</div>
                    <div class="text-gray-600">{{ $data['description'] }}</div>
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
