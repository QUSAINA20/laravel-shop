@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title"> Product </h5>
                </div>
                <form>
                    <div class="card-body">
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ $product->name }} / {{ $product->getTranslation('name', 'ar') }}"
                                disabled>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                            <label>{{ __('Price') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                placeholder="{{ $product->price }}" disabled>
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                            <label>{{ __('category') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"
                                placeholder="{{ $product->category->name }}" disabled>
                            @include('alerts.feedback', ['field' => 'category'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        @foreach ($mediaItems as $mediaItem)
                            <img class="avatar" src="{{ $mediaItem->getUrl() }}" alt="">
                        @endforeach
                        <h5 class="title">{{ $product->name }} / {{ $product->getTranslation('name', 'ar') }}
                        </h5>
                    </div>
                    </p>
                    <div class="card-description">
                        {{ $product->description }} / {{ $product->getTranslation('description', 'ar') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
