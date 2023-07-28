<x-office-layout title="Dashboard">

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Stats-->
                <div class="row g-6 g-xl-9">
                    <div class="col-lg-6 col-xxl-4">
                        <!--begin::Card-->
                        <div class="card h-100">
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Heading-->

                                <div class="fs-2hx fw-bolder">{{ $totalCampaigns }}</div>
                                <div class="fs-4 fw-bold text-gray-400 mb-7">Kampanye Saat Ini</div>
                                <!--end::Heading-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Chart-->
                                    <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                                        <canvas id="kt_project_list_chart"></canvas>
                                    </div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                            <div class="bullet bg-primary me-3"></div>
                                            <div class="text-gray-400">Aktif</div>
                                            <div class="ms-auto fw-bolder text-gray-700">{{ $activeCampaigns }}</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                            <div class="bullet bg-success me-3"></div>
                                            <div class="text-gray-400">Selesai</div>
                                            <div class="ms-auto fw-bolder text-gray-700">{{ $revisionCampaigns }}</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-bold align-items-center">
                                            <div class="bullet bg-gray-300 me-3"></div>
                                            <div class="text-gray-400">Belum Aktif</div>
                                            <div class="ms-auto fw-bolder text-gray-700">{{ $notActiveCampaigns }}</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-lg-6 col-xxl-4">
                        <!--begin::Budget-->
                        <div class="card h-100">
                            <div class="card-body p-9">
                                <div class="fs-2hx fw-bolder">Rp 10.000.000</div>
                                <div class="fs-4 fw-bold text-gray-400 mb-7">Donasi Terkumpul</div>
                                <div class="fs-6 d-flex justify-content-between mb-4">
                                    <div class="fw-bold">Donasi Tertinggi</div>
                                    <div class="d-flex fw-bolder">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-right.svg-->
                                        <span class="svg-icon svg-icon-3 me-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5"
                                                        transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553)"
                                                        x="10.6464466" y="5.85355339" width="2" height="14"
                                                        rx="1" />
                                                    <path
                                                        d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Rp 5.000.000
                                    </div>
                                </div>
                                <div class="separator separator-dashed"></div>
                                <div class="fs-6 d-flex justify-content-between my-4">
                                    <div class="fw-bold">Donasi Terendah</div>
                                    <div class="d-flex fw-bolder">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Down-left.svg-->
                                        <span class="svg-icon svg-icon-3 me-1 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5"
                                                        transform="translate(12.353553, 12.146447) rotate(-135.000000) translate(-12.353553, -12.146447)"
                                                        x="11.3535534" y="5.14644661" width="2" height="14"
                                                        rx="1" />
                                                    <path
                                                        d="M15.8890873,16.0961941 C16.441372,16.0961941 16.8890873,16.5439093 16.8890873,17.0961941 C16.8890873,17.6484788 16.441372,18.0961941 15.8890873,18.0961941 L7.40380592,18.0961941 C6.86841446,18.0961941 6.42800568,17.6745174 6.40474976,17.1396313 L6.05119637,9.00790332 C6.02720666,8.45613984 6.45505183,7.98939965 7.00681531,7.96540994 C7.55857879,7.94142022 8.02531897,8.36926539 8.04930869,8.92102887 L8.36127239,16.0961941 L15.8890873,16.0961941 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Rp 1.000.000
                                    </div>
                                </div>
                                <div class="separator separator-dashed"></div>
                                <div class="fs-6 d-flex justify-content-between mt-4">
                                    <div class="fw-bold">Total Donasi Masuk </div>
                                    <div class="d-flex fw-bolder">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-right.svg-->
                                        <span class="svg-icon svg-icon-3 me-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5"
                                                        transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553)"
                                                        x="10.6464466" y="5.85355339" width="2" height="14"
                                                        rx="1" />
                                                    <path
                                                        d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->100
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Budget-->
                    </div>
                    <div class="col-lg-6 col-xxl-4">
                        <!--begin::Clients-->
                        <div class="card h-100">
                            <div class="card-body p-9">
                                <!--begin::Heading-->
                                <div class="fs-2hx fw-bolder">49</div>
                                <div class="fs-4 fw-bold text-gray-400 mb-7">Pengguna Terdaftar</div>
                                <!--end::Heading-->

                            </div>
                        </div>
                        <!--end::Clients-->
                    </div>
                </div>
                <!--end::Stats-->
                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack my-5">
                    <!--begin::Heading-->
                    <h2 class="fs-2 fw-bold my-2">Kampanye
                        <span class="fs-6 text-gray-400 ms-1">by Status</span>
                    </h2>
                    <!--end::Heading-->
                    <!--begin::Controls-->
                    <div class="d-flex flex-wrap my-1">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <form id="campaignFilterForm">
                                @csrf
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fs-5 fw-bold mb-3">Month:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="month" class="form-select form-select-solid fw-bolder"
                                            data-kt-select2="true" data-placeholder="Select option"
                                            data-allow-clear="true" data-kt-customer-table-filter="month">
                                            <option>All</option>
                                            <option value="January">Januari</option>
                                            <option value="February">Februari</option>
                                            <option value="March">Maret</option>
                                            <option value="April">April</option>
                                            <option value="May">Mei</option>
                                            <option value="June">Juni</option>
                                            <option value="July">Juli</option>
                                            <option value="August">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="October">Oktober</option>
                                            <option value="November">December</option>
                                            <option value="December">December</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex flex-column flex-wrap fw-bold"
                                            data-kt-customer-table-filter="payment_type">
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="active" checked="checked" />
                                                <span class="form-check-label text-gray-600">Aktif</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="request-revision" />
                                                <span class="form-check-label text-gray-600">Butuh Revisi</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="rejected" />
                                                <span class="form-check-label text-gray-600">Ditolak</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="accepted" />
                                                <span class="form-check-label text-gray-600">Diterima</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true"
                                            data-kt-customer-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                            data-kt-customer-table-filter="filter" id="filterButton">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Content-->
                            </form>
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Filter-->
                    </div>
                    <!--end::Controls-->

                </div>
                <!--end::Toolbar-->
                <!--begin::Row-->
                <div class="row g-6 g-xl-9" id="campaignList">
                    <!--begin::Col-->
                    @foreach ($data as $item)
                        <div class="col-md-6 col-xl-4">
                            <!--begin::Card-->
                            <a href="{{ route('campaign.detail', $item['id']) }}"
                                class="card border border-2 border-gray-300 border-hover">
                                <!--begin:: Card body-->
                                <div class="card-body p-9">
                                    <!--begin::Name-->
                                    <div class="fs-3 fw-bolder text-dark">{{ $item['title'] }}</div>
                                    <!--end::Name-->
                                    <!--begin::Description-->
                                    <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{ $data['description'] }}
                                    </p>
                                    <!--end::Description-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-5">
                                        <!--begin::Due-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                            <div class="fs-6 text-gray-800 fw-bolder">
                                                {{ strftime('%e %B %Y', strtotime($data['endDate'])) }}</div>
                                            <div class="fw-bold text-gray-400">Berakhir</div>
                                        </div>
                                        <!--end::Due-->
                                        <!--begin::Budget-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ $data['donationAchieved'] ?? '0' }}</div>
                                            <div class="fw-bold text-gray-400">Terkumpul</div>
                                        </div>
                                        <!--end::Budget-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end:: Card body-->
                            </a>
                            <!--end::Card-->
                        </div>
                    @endforeach
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Pagination-->
                <div class="d-flex flex-stack flex-wrap pt-10">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                            <ul class="pagination">
                                <li class="page-item {{ $data->previousPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                                </li>

                                @php
                                    $currentPage = $data->currentPage();
                                    $lastPage = $data->lastPage();
                                    $startPage = max($currentPage - 1, 1);
                                    $endPage = min($currentPage + 1, $lastPage);
                                @endphp

                                @for ($page = $startPage; $page <= $endPage; $page++)
                                    <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{ $data->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end::Pagination-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</x-office-layout>

<script>
    const csrfToken = '{{ csrf_token() }}';

    // Function to handle the filter button click event
    function handleFilterButtonClick() {
        const form = document.getElementById('campaignFilterForm');
        const formData = new FormData(form);

        // Append the CSRF token to the form data
        formData.append('_token', csrfToken);

        // Make an AJAX request to the filter endpoint
        fetch('{{ route('filter') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Replace the campaign list with the filtered data
                document.getElementById('campaignList').innerHTML = data;
            })
            .catch(error => {
                console.error('Error filtering campaigns:', error);
            });
    }

    document.getElementById('filterButton').addEventListener('click', handleFilterButtonClick);
</script>
