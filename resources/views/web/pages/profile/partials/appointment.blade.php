<div class="tab-pane fade" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">
    <!-- Content for appointments Tab -->
    <h4>
        <i class="icon fa-regular fa-calendar-check"></i>
        {{ __('website/web.profile-appointment') }}
    </h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('website/web.profile-dr-name') }}</th>
                <th scope="col">{{ __('website/web.profile-schedule') }}</th>
                <th scope="col">{{ __('services/services.register-services-address-detailed') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($booking as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a target="__blank"
                            href="{{ route('website.search.service-provider.show', $item->user->serviceProviderDetails->id) }}">
                            @if ($item->user->gender == 1)
                                {{ __('website/web.provider-male') }}
                            @else
                                {{ __('website/web.provider-female') }}
                            @endif
                            <span class="h5">{{ $item->name }}</span>:
                            {{ $item->user->serviceProviderDetails->name }}
                        </a>
                    </td>
                    <td>
                        {{ $item->start_time }} -
                        {{ $item->end_time }}
                    </td>
                    <td>
                        {{ $item->user->serviceProviderDetails->city->name }}:
                        {{ $item->user->serviceProviderDetails->region->name }}
                        {{ $item->user->serviceProviderDetails->address }}
                    </td>
                </tr>
            @empty
                <span class="text-secondary">{{ __('website/web.profile-appointment-comment') }}</span>
            @endforelse
        </tbody>
    </table>
</div>
