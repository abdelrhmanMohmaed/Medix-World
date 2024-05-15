@extends('web.layouts._app')

@section('title', __('website/web.medix-welcome'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
        }
    </style>
@endsection

@section('main')

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->
    @foreach($errors->all() as $error)
    <li>{{ $error }} </li>
@endforeach
    <span>User Profile
        <br>
        <a href="{{ route('website.logout') }}">logout</a>



        @foreach ($user->clientBook as $item)
            <span>{{ $item->serviceProvider->name }}</span>
            <br>
            <span>{{ $item->schedule->start_time }}</span>
            <br>
            <span>{{ $item->schedule->end_time }}</span>
            <br>
            <a type="button" data-bs-toggle="modal" href="#review" data-id="{{ $item->id }}" data-service="{{ $item->user_id }}" >
                Add Review
            </a>
        @endforeach
    </span>
    <!-- start update Modal -->
    <div class="modal fade" id="review" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white bg-warning">
                    <h5 class="modal-title" id="reviewLabel">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Review
                    </h5>
                </div>

                <form action="{{ route('website.profile.book-review') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="book_id" name="book_id">
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="mb-3 rating">
                            <label for="star1"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star2"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star3"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star4"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star5"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star5" name="rating" value="5">
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <input type="text" class="form-control" id="comment" name="comment">
                            <div id="emailHelp" class="form-text">Make your comment constructive.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end update Modal -->
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

        $('#review').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_id = button.data('service')
            var modal = $(this)

            modal.find('.modal-body #book_id').val(id);
            modal.find('.modal-body #user_id').val(user_id);
        })
    </script>
@endsection
