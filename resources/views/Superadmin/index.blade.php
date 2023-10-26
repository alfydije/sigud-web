@extends('Superadmin.app', ['title' => 'Dashboard'])
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Dashboard Gudang</h4>
            </div>
        </div>
    </div>
</div>
<div class="row match-height">
    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card card-statistics px-0">
            <div class="card-header d-block px-2">
                <h4 class="card-title">Selamat Datang, {{ Auth::user()->username ?? '' }}</h4>
                <span class="card-subtitle text-gray">Informasi Dashboard</span>
            </div>
            <div class="card-body statistics-body">
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-sm-6 col-12 mb-3">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="box" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0 loader" id="#">763</h4>
                                <p class="card-text font-small-3 mb-0">Barang Masuk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="shopping-bag" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0 loader" id="#">230.821</h4>
                                <p class="card-text font-small-3 mb-0">Barang Keluar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12 mb-3">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="users" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0 loader" id="#">1.259</h4>
                                <p class="card-text font-small-3 mb-0">Member Aktif</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12 mb-3">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="folder-plus" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0 loader" id="#">57</h4>
                                <p class="card-text font-small-3 mb-0">Permintaan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>
{{-- <div class="content-body">
    <!-- Basic table -->
    <section id="">
        <div class="row">
            <div class="col-12">
                <div class="card" id="monthIncomesCard">
                    <div class="card-header d-block">
                        <h4 class="card-title">Pendapatan Perbulan (2022)</h4>
                        <span class="card-subtitle text-gray">Grafik Total Pendapatan Perbulan</span>
                    </div>
                    <div class="card-body">
                        <div id="chartPendapatanPerbulan"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card" id="todayIncomesCard">
                    <div class="card-header d-block">
                        <h4 class="card-title">Pendapatan Perhari ({{ date('d-m-Y') }})</h4>
                        <span class="card-subtitle text-gray">Grafik Total Pendapatan Perhari</span>
                    </div>
                    <div class="card-body">
                        <h3>Rp. <span id="totalTodayIncomes">0</span>,-</h3>
                        <div id="chartPendapatanPerhari"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" id="storeIncomesCard">
                    <div class="card-header d-block">
                        <h4 class="card-title">Toko Pendapatan Tertinggi</h4>
                        <span class="card-subtitle text-gray">Total Pendapatan Toko Tertinggi</span>
                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <input type="text" class="form-control flatpickr-basic mt-2" id="dateStoreIncomes" placeholder="00-00-0000" value="{{ date('d-m-Y') }}"/>
                            </div>
                            <div class="col-sm-5 align-self-center mt-2">
                                <button type="button" class="btn btn-primary" id="filterStoreIncomes"><i data-feather="filter"></i> Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Toko</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="storeIncomes"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" id="bestSellingPerfumesCard">
                    <div class="card-header d-block">
                        <h4 class="card-title">Perfume Terlaris</h4>
                        <span class="card-subtitle text-gray">Jumlah Perfume Terlaris (ML)</span>
                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <input type="text" class="form-control flatpickr-basic mt-2" id="dateBestSellingPerfumes" placeholder="00-00-0000" value="{{ date('d-m-Y') }}"/>
                            </div>
                            <div class="col-sm-5 align-self-center mt-2">
                                <button type="submit" class="btn btn-primary" id="filterBestSellingPerfumes"><i data-feather="filter"></i> Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Perfume</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="bestSellingPerfumes"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic table -->
</div> --}}
@endsection
@section('scripts')
<script>
    $(function () {

        let isRtl = $('html').attr('data-textdirection') === 'rtl'
        
        let chartColors = {
            column: {
                series1: '#826af9',
                series2: '#d2b0ff',
                bg: '#f8d3ff'
            },
            success: {
                shade_100: '#7eefc7',
                shade_200: '#06774f'
            },
            donut: {
                series1: '#ffe700',
                series2: '#00d4bd',
                series3: '#826bf8',
                series4: '#2b9bf4',
                series5: '#FFA1A1'
            },
            area: {
                series3: '#a4f8cd',
                series2: '#60f2ca',
                series1: '#7367f0'
            }
        };

        // CHART PENDAPATAN PERBULAN

        let chartPendapatanPerbulan = document.querySelector('#chartPendapatanPerbulan')

        let chartPendapatanPerbulanConfig = {
            chart: {
                height: 400,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: 'smooth'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            colors: [chartColors.area.series1],
            series: [],
            xaxis: {
                categories: [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ]
            },
            // fill: {
            //     opacity: 0,
            //     type: 'solid'
            // },
            tooltip: {
                shared: false
            },
            yaxis: {
                opposite: isRtl,
                labels: {
                    formatter: function (value) {
                        return value.toLocaleString("id-ID", {style: "currency", currency: "IDR"})
                    }
                },
            }
        };

        let areaChartMonth

        if (typeof chartPendapatanPerbulan !== undefined && chartPendapatanPerbulan !== null) {
            areaChartMonth = new ApexCharts(chartPendapatanPerbulan, chartPendapatanPerbulanConfig);
            areaChartMonth.render();
        }

        let chartPendapatanPerbulanData = function () {

            $.ajax({
                type: "GET",
                dataType: "json",
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                beforeSend: function () {
                    $('#monthIncomesCard').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                },
                complete: function () {
                    $('#monthIncomesCard').unblock()
                },
                success: function (response) {
                    console.log(response)

                    let data = new Array(12).fill(0)
                    response.data.forEach(e => {
                        data[e.month - 1] = e.total
                    });

                    areaChartMonth.updateSeries([{
                        name: 'Total Pendapatan',
                        data: data
                    }])
                }
            })
        }

        chartPendapatanPerbulanData()

        // END CHART PENDAPATAN PER BULAN

        // CHART PENDAPATAN PERHARI

        let chartPendapatanPerhari = document.querySelector('#chartPendapatanPerhari')

        let chartPendapatanPerhariData = function () {

            $.ajax({
                type: "GET",
                dataType: "json",
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                beforeSend: function () {
                    $('#todayIncomesCard').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                },
                complete: function () {
                    $('#todayIncomesCard').unblock()
                },
                success: function (response) {
                    console.log(response)

                    let data = new Array(24).fill(0)
                    response.data.forEach(e => {
                        data[e.hour] = e.total
                    });

                    $('#totalTodayIncomes').text(displayCurrency(response.total, ''))

                    chartPendapatanPerhariConfig['series'] = [
                        {
                            name : 'Total Pendapatan',
                            data: data
                        }
                    ]

                    if (typeof chartPendapatanPerhari !== undefined && chartPendapatanPerhari !== null) {
                        var areaChart = new ApexCharts(chartPendapatanPerhari, chartPendapatanPerhariConfig);
                        areaChart.render();
                    }
                }
            })
        }

        chartPendapatanPerhariData()

        let chartPendapatanPerhariConfig = {
            chart: {
                height: 400,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: 'smooth'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            colors: [chartColors.area.series1],
            xaxis: {
                categories: [
                    '00.00',
                    '01.00',
                    '02.00',
                    '03.00',
                    '04.00',
                    '05.00',
                    '06.00',
                    '07.00',
                    '08.00',
                    '09.00',
                    '10.00',
                    '11.00',
                    '12.00',
                    '13.00',
                    '14.00',
                    '15.00',
                    '16.00',
                    '17.00',
                    '18.00',
                    '19.00',
                    '20.00',
                    '21.00',
                    '22.00',
                    '23.00',
                ]
            },
            // fill: {
            //     opacity: 0,
            //     type: 'solid'
            // },
            tooltip: {
                shared: false
            },
            yaxis: {
                show: false,
                opposite: isRtl,
                labels: {
                    formatter: function (value) {
                        return value.toLocaleString("id-ID", {style: "currency", currency: "IDR"})
                    }
                }
            }
        };

        // END CHART PENDAPATAN PERHARI

        // load data

        const getDashboard = async function () {

            $('.loader').html(`
                <div class="text-primary">
                    <div class="spinner-border spinner-border-sm" role="status"></div>
                </div>
            `)

            const response = await $.ajax({
                method: 'GET',
                dataType: 'json',
                success:function (response) {
                    console.log(response)
                    setTimeout(() => {
                        loadDashboard(response)
                    }, 300);
                }
            }).catch((err) => {
                Swal.fire({
                    title: 'Terjadi kesalahan!',
                    text: 'Server Error',
                    icon: 'error'
                })
            })
        }

        getDashboard()

        function loadDashboard(response) {
            $('.loader').html('')
            $('#liquidItemTotal').text(displayCurrency(response.data.liquid_items ?? 0, ''))
            $('#solidItemTotal').text(displayCurrency(response.data.solid_items ?? 0, ''))
            $('#memberTotal').text(displayCurrency(response.data.members ?? 0, ''))
            $('#storeTotal').text(displayCurrency(response.data.stores ?? 0, ''))
            $('#orderTotal').text(displayCurrency(response.data.orders ?? 0, ''))
            $('#stockOrderTotal').text(displayCurrency(response.data.stock_orders ?? 0, ''))
            $('#storeTransactionTotal').text(displayCurrency(response.data.store_transactions ?? 0, ''))
            $('#bookingTransactionTotal').text(displayCurrency(response.data.booking_transactions ?? 0, ''))
            $('#onlineTransactionTotal').text(displayCurrency(response.data.online_transactions ?? 0, ''))
        }

        // TOKO PENDAPATAN TERTINGGI

        let getStoreIncomes = function () {

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    date: $('#dateStoreIncomes').val(),
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    $('#storeIncomesCard').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                },
                complete: function () {
                    $('#storeIncomesCard').unblock()
                },
                success: function (response) {
                    $('#storeIncomes').html(``)
                    let row = ''
                    
                    if (response.data.length > 0) {
                        response.data.forEach(e => {
                            row += `<tr>`
                            row += `<td>${e.store_name}</td>`
                            row += `<td>Rp. ${generateCurrency(e.total, '')},-</td>`
                            row += `</tr>`
                        })
                    } else {
                        row += `<tr>`
                        row += `<td colspan="2" class="text-center p-1">
                                    <div class="alert alert-primary mb-0" role="alert">
                                        <div class="alert-body">Tidak ada transaksi pada tanggal <br /><strong>${$('#dateStoreIncomes').val()}</strong></div>
                                    </div>
                                </td>`
                        row += `</tr>`
                    }

                    $('#storeIncomes').append(row)
                }
            })
        }

        getStoreIncomes()

        $('#filterStoreIncomes').on('click', function () {
            getStoreIncomes()
        })

        // END TOKO PENDAPATAN TERTINGGI

        // PERFUME TERLARIS

        let getBestSellingPerfumes = function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    date: $('#dateBestSellingPerfumes').val(),
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    $('#bestSellingPerfumesCard').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                },
                complete: function () {
                    $('#bestSellingPerfumesCard').unblock()
                },
                success: function (response) {
                    console.log(response)
                    $('#bestSellingPerfumes').html(``)
                    let row = ''
                    
                    if (response.data.length > 0) {
                        response.data.forEach(e => {
                            row += `<tr>`
                            row += `<td>${e.item_name}</td>`
                            row += `<td>${displayCurrency(e.total_sold, '')} ${e.item_unit_name}</td>`
                            row += `</tr>`
                        })
                    } else {
                        row += `<tr>`
                        row += `<td colspan="2" class="text-center p-1">
                                    <div class="alert alert-primary mb-0" role="alert">
                                        <div class="alert-body">Tidak ada transaksi pada tanggal <br /><strong>${$('#dateBestSellingPerfumes').val()}</strong></div>
                                    </div>
                                </td>`
                        row += `</tr>`
                    }

                    $('#bestSellingPerfumes').append(row)
                }
            })
        }

        getBestSellingPerfumes()

        $('#filterBestSellingPerfumes').on('click', function () {
            getBestSellingPerfumes()
        })

        // setInterval(() => {
        //     getBestSellingPerfumes()
        //     getStoreIncomes()
        //     getDashboard()
        //     chartPendapatanPerbulanData()
        //     chartPendapatanPerhariData()
        // }, 60000);

        // END PERFUME TERLARIS
    })
</script>
@endsection