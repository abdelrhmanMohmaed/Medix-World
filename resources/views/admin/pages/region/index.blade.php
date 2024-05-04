@extends('admin.layouts._app')


@section('title', __('dashboard.region-index'))

@section('main')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('dashboard.name-region-en') }}</th>
                <th scope="col">{{ __('dashboard.name-region-ar') }}</th>
                <th scope="col">{{ __('dashboard.name-city-' . app()->getLocale()) }}</th>
                <th scope="col">{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->getTranslation('name', 'en') }}</td>
                    <td>{{ $item->getTranslation('name', 'ar') }}</td>
                    <td>{{ $item->city->getTranslation('name', app()->getLocale()) }}</td>
                    <td>
                        <a href="{{ route('admins.regions.edit', $item->id) }}">edit</a>
                        <a href="{{ route('admins.regions.status', $item->id) }}">
                            <span>{{ $item->active == 0 ? 'active' : 'inactive' }}</span>
                        </a>
                        <form method="POST" action="{{ route('admins.regions.destroy', $item->id) }}"
                            onsubmit="return confirm('Are You sure?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn bg-gradient-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
