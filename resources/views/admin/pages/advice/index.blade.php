@extends('admin.layouts._app')

@section('title',  __('dashboard.advice-index'))

@section('main')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('dashboard.title-advice-en') }}</th>
                <th scope="col">{{ __('dashboard.title-advice-ar') }}</th>
                <th scope="col">{{ __('dashboard.description-advice-en') }}</th>
                <th scope="col">{{ __('dashboard.description-advice-en') }}</th>
                <th scope="col">{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($advices as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->getTranslation('title', 'en') }}</td>
                    <td>{{ $item->getTranslation('title', 'ar') }}</td>
                    <td>{{ $item->getTranslation('description', 'en') }}</td>
                    <td>{{ $item->getTranslation('description', 'ar') }}</td>
                    <td> <img src="{{asset($item->img)}}" alt="Medical Advice" srcset=""> </td>
                    <td>
                        <a href="{{ route('admins.advices.edit', $item->id) }}">edit</a>
                        <a href="{{ route('admins.advices.status', $item->id) }}">
                            <span>{{ $item->active == 0 ? 'active' : 'inactive' }}</span>
                        </a>
                        <form method="POST" action="{{ route('admins.advices.destroy', $item->id) }}"
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
