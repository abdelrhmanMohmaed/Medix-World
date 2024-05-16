@extends('web.layouts._app')

@section('title', __('website/web.medix-welcome'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        .vertical-tabs {
            border-left: 1px solid #dee2e6;
            height: 100%;
        }

        .modal-body input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
        }

        .profile .nav-link {
            color: black
        }

        .badge {
            border-radius: 50%;
            background-color: red;
            color: white;
            padding: 5px 10px;
        }
    </style>
@endsection

@section('main')

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->

    <section id="#profile">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Nav -->
                <div class="col-md-3 mt-3 mb-5">
                    <div class="profile nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile"
                            aria-selected="true">{{ __('website/web.profile-data') }}</button>
                        <button class="nav-link" id="appointments-tab" data-bs-toggle="pill" data-bs-target="#appointments"
                            type="button" role="tab" aria-controls="appointments" aria-selected="false">
                            {{ __('website/web.profile-appointment') }}
                            <span class="badge">{{ count($booking) }}</span>
                        </button>
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="pill" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">
                            {{ __('website/web.profile-ratings') }}
                            <span class="badge">{{ count($user->clientBook) }}</span>
                        </button>
                        <button class="nav-link" id="medical_history-tab" data-bs-toggle="pill"
                            data-bs-target="#medical_history" type="button" role="tab" aria-controls="medical_history"
                            aria-selected="false">
                            {{ __('website/web.profile-medical-history') }}
                            <span class="badge">{{ count($user->clientMedicalFiles) }}</span>
                        </button>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-md-9 mt-3 mb-5">

                    <div class="tab-content profile" id="v-pills-tabContent">

                        @include('web.pages.profile.partials.profileData')
                        @include('web.pages.profile.partials.appointment')
                        @include('web.pages.profile.partials.review')
                        @include('web.pages.profile.partials.medicalHistory')

                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--  Model --}}
    @include('web.pages.profile.partials.models.createMedicalModel')
    @include('web.pages.profile.partials.models.editMedicalFileModel')
    @include('web.pages.profile.partials.models.deleteMedicalFileModel')
    @include('web.pages.profile.partials.models.reviewModel')
    {{--  Model --}}
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
    <script>
        const stars = document.querySelectorAll('.rating input[type="radio"]');

        stars.forEach(star => {
            star.addEventListener('change', (event) => {
                const selectedStar = event.target;
                const rating = parseInt(selectedStar.value);
                for (let i = 0; i < stars.length; i++) {
                    if (i < rating) {
                        stars[i].previousElementSibling.style.color =
                            'gold';
                    } else {
                        stars[i].previousElementSibling.style.color = '#ddd';
                    }
                }
            });
        });

        // get a areas with axios request
        $('#specification').change(function() {
            var major = $(this).val();

            var axiosUrl = "{{ route('website.medicals.index', ':major') }}";
            axiosUrl = axiosUrl.replace(':major', major);

            axios.get(axiosUrl)
                .then(function(response) {
                    console.log(response.data);
                    var regionsHtml = response.data;

                    $('.specialty').html(regionsHtml);
                })
                .catch(function(error) {
                    console.error('Error fetching areas: ' + error);
                });
        });
        // get a areas with axios request
    </script>
    <!-- Models -->
    <script>
        // Review
        $('#review').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_id = button.data('service')
            var modal = $(this)

            modal.find('.modal-body #book_id').val(id);
            modal.find('.modal-body #user_id').val(user_id);
        })

        // <!-- start update --> 
        $('#editFile').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var description = button.data('description')
            var modal = $(this)

            modal.find('.modal-body #file_id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #description').val(description);
        })
        // <!-- end update -->

        // <!-- start delete --> 
        $('#deleteFile').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)

            modal.find('.modal-body #file').val(id);
        })
    </script>
    {{-- <!-- end delete -->  --}}

@endsection
