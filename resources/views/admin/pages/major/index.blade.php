@extends('admin.layouts._app')

@section('title',  __('dashboard.major-index'))

@section('main')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('dashboard.name-major-en') }}</th>
                <th scope="col">{{ __('dashboard.name-major-ar') }}</th>
                <th scope="col">{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majors as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->getTranslation('name', 'en') }}</td>
                    <td>{{ $item->getTranslation('name', 'ar') }}</td>
                    <td>
                        <a href="{{ route('admins.majors.edit', $item->id) }}">edit</a>
                        <a href="{{ route('admins.majors.status', $item->id) }}">
                            <span>{{ $item->active == 0 ? 'active' : 'inactive' }}</span>
                        </a>
                        <form method="POST" action="{{ route('admins.majors.destroy', $item->id) }}"
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
