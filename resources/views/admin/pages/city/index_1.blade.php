@extends('admin.layouts._app')

@section('title', __('dashboard.city-index'))

@section('main')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('dashboard.name-city-en') }}</th>
                <th scope="col">{{ __('dashboard.name-city-ar') }}</th>
                <th scope="col">{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->getTranslation('name', 'en') }}</td>
                    <td>{{ $item->getTranslation('name', 'ar') }}</td>
                    <td>
                        <a href="{{ route('admins.cities.edit', $item->id) }}">edit</a>
                        <a href="{{ route('admins.cities.status', $item->id) }}">
                            <span>{{ $item->active == 0 ? 'active' : 'inactive' }}</span>
                        </a>
                        <form method="POST" action="{{ route('admins.cities.destroy', $item->id) }}"
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
