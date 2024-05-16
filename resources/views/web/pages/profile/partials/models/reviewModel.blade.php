    <!-- start update Modal -->
    <div class="modal fade" id="review" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white bg-primary">
                    <h5 class="modal-title" id="reviewLabel">
                        <i class="fa-solid fa-pen-to-square"></i>
                        {{ __('website/web.profile-ratings') }}
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
                            <label for="comment"
                                class="form-label">{{ __('website/web.profile-ratings-comment-model') }}</label>
                            <input type="text" class="form-control" id="comment" name="comment">
                            <div id="emailHelp" class="form-text">
                                {{ __('website/web.profile-ratings-comment-model-details') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end update Modal -->
