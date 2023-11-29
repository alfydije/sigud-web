    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <div class="preloader flex-column justify-content-center align-items-center">
        <img src="{{ asset('app-assets/preloaders/purple-dual-ring-loader.gif') }}" height="100" width="100">
    </div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">Copyright &copy; 2022 - {{ date('Y') }}<a class="ms-25" href="#" target="_blank">Sistem Inventory Gudang</a><span class="d-none d-sm-inline-block"></span></span><span class="float-md-end d-none d-md-block"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

     {{-- Summernote JS link --}}
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
     {{-- Summernote JS link --}}
     <!-- Contoh penggunaan CDN untuk jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Contoh penggunaan CDN untuk Pickadate -->
<script src="https://cdn.jsdelivr.net/npm/pickadate/lib/picker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pickadate/lib/picker.date.js"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-apex.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>

    <!-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> -->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-checkout.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('app-assets/js/custom.js') }}"></script>
    <script src="{{ asset('app-assets/js/socketio.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            const SELECTOR_PRELOADER = '.preloader'

            const $preloader = $(SELECTOR_PRELOADER)
            if ($preloader) {
                $preloader.css('height', 0)
                $preloader.children().hide()
            }
        })
        function generateCurrency(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }
        function displayCurrency(n, currency) {
            return currency + n.toFixed(0).replace(/./g, function(c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
            });
        }

        $(".alert-success, .alert-danger, .alert-info").fadeTo(3000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        })

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        })

        $('#logout, #logout-app').on('click', function (e) {
            Swal.fire({
                title: 'Konfirmasi?',
                html: `Apakah anda yakin akan logout?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Logout',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    window.location.href = "#"
                }
            });
        })

        @if($message = Session::get('forbidden_admin'))
            $.blockUI({
                message: '<div class="p-1 bg-danger"><h4 class="mb-0 text-white">{{ $message }}</h4></div>',
                timeout: 2000,
                css: {
                    backgroundColor: 'transparent',
                    color: '#fff',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            })
        @endif

        @if($message = Session::get('forbidden_branch'))
            $.blockUI({
                message: '<div class="p-1 bg-danger"><h4 class="mb-0 text-white">{{ $message }}</h4></div>',
                timeout: 2000,
                css: {
                    backgroundColor: 'transparent',
                    color: '#fff',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            })
        @endif

        @if($message = Session::get('forbidden_warehouse'))
            $.blockUI({
                message: '<div class="p-1 bg-danger"><h4 class="mb-0 text-white">{{ $message }}</h4></div>',
                timeout: 2000,
                css: {
                    backgroundColor: 'transparent',
                    color: '#fff',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            })
        @endif

        CKEDITOR.replaceAll('editor', {
            height: 400,
        });

        $(document).ready(function() {
            $("#summernote").summernote();
            $('.dropdown-toggle').dropdown();
        })

        const firebaseConfig = {
            apiKey: "AIzaSyCTwXRI7uOWu-qw5NE7zSwylQDY5gPDVIk",
            authDomain: "tania-perfume-app.firebaseapp.com",
            projectId: "tania-perfume-app",
            storageBucket: "tania-perfume-app.appspot.com",
            messagingSenderId: "594410471176",
            appId: "1:594410471176:web:27b3ebd8e397a87a4176bd",
            measurementId: "G-DDV45BNZZN"
        };

        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();

        messaging.onMessage((payload) => {
            console.log('Message received. ', payload);
            let audio = new Audio("{{ asset('') }}app-assets/notif.mp3");
            audio.play()
                .then(() => {
                    console.log('is playing');
                })
                .catch(error => {
                    console.log(error);
                })

            Swal.fire({
                title: payload.data.title,
                text: payload.data.body,
                icon: 'info'
            })
        });

        function alertDelete(title, action){
            Swal.fire({
                title: `Konfirmasi hapus ${title}?`,
                html: `Data akan ${title} dihapus!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    action()
                }
            });
        }

    </script>

    @yield('scripts')
</body>

</html>
