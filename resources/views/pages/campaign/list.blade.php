    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_donation">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">Nama Program</th>
                <th class="min-w-125px">Batas Waktu</th>
                <th class="min-w-125px">Target Dana</th>
                <th class="min-w-125px">Waktu Dibuat</th>
                <th class="min-w-125px">PIC</th>
                <th class="min-w-125px">Status</th>
                <th class="min-w-125px">Aksi</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            <!--begin::Table row-->
            @foreach ($data as $item)
                <tr>
                    </td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ strftime('%e %B %Y', strtotime($item['startDate'])) }} to
                        {{ strftime('%e %B %Y', strtotime($item['endDate'])) }}</td>
                    <td>Rp. {{ number_format($item['donationTarget']) }}</td>
                    <td>{{ date('Y-m-d h:i', strtotime($item['createdAt'])) }} WIB</td>
                    <td>{{ $item['pic']['name'] ?? 'N/A' }}</td>
                    <td>
                        @if ($item['status'] === 'approved')
                            <div class="badge badge-light-primary fw-bolder">Diterima</div>
                        @elseif ($item['status'] === 'request-revision')
                            <div class="badge badge-light-warning fw-bolder">Revisi</div>
                        @elseif ($item['status'] === 'live')
                            <div class="badge badge-light-success fw-bolder">Aktif</div>
                        @elseif ($item['status'] === 'rejected')
                            <div class="badge badge-light-danger fw-bolder">Ditolak</div>
                        @elseif ($item['status'] === 'waiting-for-approval')
                            <div class="badge badge-light-info fw-bolder">Menunggu</div>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('campaign.detail', $item['id']) }}"
                                class="btn btn-sm btn-light btn-active-light-primary">Lihat</a>
                        </div>
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            @if (empty($data))
                <tr>
                    <td colspan="4" class="text-center">Belum ada kampanye</td>
                </tr>
            @endif
            <!--end::Table row-->
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->

    <div class="row">
        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
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
