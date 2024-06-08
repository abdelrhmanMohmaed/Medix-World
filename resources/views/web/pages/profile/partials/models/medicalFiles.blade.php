<div class="row my-2 w-100">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('website/web.profile-create-title') }}</th>
                <th scope="col">{{ __('website/web.profile-create-description') }}</th>
                <th scope="col">{{ __('website/web.profile-create-by') }}</th>
                <th scope="col">{{ __('website/web.profile-action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>


                    <td>
                        @if ($item->user_id == Auth::id())
                            Me
                        @else
                            <a target="__blank"
                                href="{{ route('website.search.service-provider.show', $item->serviceProvider->serviceProviderDetails->id) }}">

                                {{ $item->serviceProvider->serviceProviderDetails->name }}
                            </a>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('website.medicals.download', $item->id) }}">
                            <i class="icon fa-solid fa-download"></i>
                        </a>
                        &nbsp;
                        <a type="button" data-bs-toggle="modal" href="#editFile" data-id="{{ $item->id }}"
                            data-title="{{ $item->title }}" data-description="{{ $item->description }}"
                            title="Edit">
                            <i class="icon fa-regular fa-pen-to-square"></i>
                        </a>

                        &nbsp;
                        <a type="button" data-bs-toggle="modal" href="#deleteFile" data-id="{{ @$item->id }}"
                            title="Delete">
                            <i class="icon fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <span class="text-secondary">{{ __('website/web.profile-medical-comment') }} </span>
            @endforelse
        </tbody>
    </table>
</div>
