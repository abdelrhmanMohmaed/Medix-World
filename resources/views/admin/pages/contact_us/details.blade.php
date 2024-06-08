@extends('admin.layout.master')

@section('title', __('dashboard.message-view'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.messages.index') }}">{{ __('dashboard.message-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.message-view')}}</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="example m-3">

      <div class="row mb-3">
        <label for="exampleInputUsername2" class="col-sm-2 col-form-label m-2">{{ __('dashboard.name') }}</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="title[en]" id="title_en" value="{{ $message->name}}" disabled>

        </div>
      </div>

      <div class="row mb-3">
        <label for="exampleInputEmail2" class="col-sm-2 col-form-label m-2">{{ __('dashboard.email') }}</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="title[ar]" id="title_ar" value="{{ $message->email}}" disabled>
        </div>
      </div>

      <div class="row mb-3">
        <label for="exampleInputUsername2" class="col-sm-2 col-form-label m-2">{{ __('dashboard.status') }}</label>
        <div class="col-sm-8">
          @if($message->active == 1)
          <div class="spinner-grow spinner-grow-sm text-success" role="status">
          </div>
          <label for="defaultconfig" class="col-form-label text-muted">Seen</label>

          @else
          <div class="spinner-grow spinner-grow-sm text-warning" role="status">
          </div>
          <label for="defaultconfig" class="col-form-label text-muted ">Un Seen</label>
          @endif
        </div>
      </div>

      <div class="row mb-3">
        <label for="exampleInputEmail2" class="col-sm-2 col-form-label m-2">{{ __('dashboard.subject') }}</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="title[ar]" id="title_ar" value="{{ $message->subject}}" disabled>
        </div>
      </div>

      <div class="row mb-3">
        <label for="defaultconfig" class="col-sm-2 col-form-label m-2">Message</label>
        <div class="col-sm-8">
          <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text" value="{{$message->message }}" disabled>
        </div>
      </div>

      <div class="action d-flex mt-5 justify-content-center">

        <form action="{{ route('admins.messages.update',$message->id ) }}" method="post">

          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          @if($message->active == 1)
          <button type="submit" class="btn-sm btn-danger btn-icon-text m-1">
            <i class="fa-solid fa-thumbs-down p-1"></i>Mark as un seen</button>
          @else
          <button type="submit" class="btn-sm btn-success btn-icon-text m-1">
            <i class="fa-solid fa-thumbs-up p-1"></i>Mark as seen</button>
          @endif
        </form>

      </div>
    </div>
  </div>

</div>

@endsection