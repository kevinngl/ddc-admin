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
                        <h2>Riwayat Donasi</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_payment">
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
                            <!--end::Svg Icon-->Buat Donasi
                        </button>
                        <!--end::Filter-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                            <!--begin::Table row-->
                            <tr class="text-start text-muted text-uppercase gs-0">
                                <th class="min-w-125px">Donatur</th>
                                <th class="min-w-125px">Catatan</th>
                                <th class="min-w-125px">Total Donasi</th>
                                <th class="min-w-125px">Waktu Transaksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-bold text-gray-600">
                            <!--begin::Table row-->
                            @foreach ($donation as $item)
                                <tr>
                                    <td>{{ $item['donator']['name'] }}</td>
                                    <td>{{ $item['comment'] }}</td>
                                    <td>Rp. {{ number_format($item['payment']['amount']) }}</td>
                                    <td>{{ strftime('%e %B %Y, %H:%M', strtotime($item['payment']['transactionTime'])) }}
                                        WIB</td>
                                </tr>
                            @endforeach

                            @if (empty($donation))
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada donasi masuk</td>
                                </tr>
                            @endif
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
