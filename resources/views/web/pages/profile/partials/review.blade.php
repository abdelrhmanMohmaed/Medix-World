<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <h4>
        <i class="icon fa-solid fa-star "></i>
        {{ __('website/web.profile-ratings') }}
    </h4>
    <!-- Reviews Tab -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('website/web.profile-dr-name') }}</th>
                <th scope="col">{{ __('website/web.profile-schedule') }}</th>
                <th scope="col">{{ __('website/web.profile-ratings') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user->clientBook as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a target="__blank"
                            href="{{ route('website.search.service-provider.show', $item->serviceProvider->serviceProviderDetails->id) }}">
                            @if ($item->serviceProvider->gender == 1)
                                {{ __('website/web.provider-male') }}
                            @else
                                {{ __('website/web.provider-female') }}
                            @endif
                            :
                            {{ $item->serviceProvider->serviceProviderDetails->name }}
                        </a>

                    </td>
                    <td>
                        {{ $item->schedule->start_time }} -
                        {{ $item->schedule->end_time }}
                    </td>
                    <td>
                        <a type="button" data-bs-toggle="modal" href="#review" data-id="{{ $item->id }}"
                            data-service="{{ $item->user_id }}">
                            {{ __('website/web.profile-add-review') }}
                        </a>
                    </td>
                </tr>
            @empty
                <span class="text-secondary">{{ __('website/web.profile-ratings-comment') }} </span>
            @endforelse
        </tbody>
    </table>
</div>
