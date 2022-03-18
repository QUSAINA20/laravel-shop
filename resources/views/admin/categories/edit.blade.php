@extends('layouts.app', ['page' => __('categories'), 'pageSlug' => 'categories'])


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit Category') }}</h5>
                </div>
                <form method="post" action="{{ route('admin.categories.update', $category) }}"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Arabic Name') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group{{ $errors->has("name['ar']") ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has("name['ar']") ? ' is-invalid' : '' }}"
                                        name="name[ar]" id="input-name-ar" type="text"
                                        placeholder="{{ __('Arabic name') }}"
                                        value="{{ $category->getTranslation('name', 'ar') }}" required="true"
                                        aria-required="true" />
                                    @if ($errors->has(" name['ar']"))
                                        <span id="name-ar-error" class="error text-danger"
                                            for="input-name-ar">{{ $errors->first(name['ar']) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('English Name') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group{{ $errors->has("name['en']") ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has("name['en']") ? ' is-invalid' : '' }}"
                                        name="name[en]" id="input-name-en" type="text"
                                        placeholder="{{ __('English name') }}"
                                        value="{{ $category->getTranslation('name', 'en') }}" required="true"
                                        aria-required="true" />
                                    @if ($errors->has(" name['en']"))
                                        <span id="name-en-error" class="error text-danger"
                                            for="input-name-en">{{ $errors->first("name['en']") }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Images') }}</label>
                            <div class="col-sm-7">
                                <div class="custom-file {{ $errors->has('images') ? ' has-danger' : '' }}">
                                    <input class="form-control file{{ $errors->has('images') ? ' is-invalid' : '' }}"
                                        name="images[]" id="input-images" type="file" multiple="multiple"
                                        placeholder="{{ __('Upload Images') }}"
                                        value="{{ $category->getMedia('images') }}" required="true"
                                        aria-required="true" />
                                    @if ($errors->has('images'))
                                        <span id="images-error" class="error text-danger"
                                            for="input-images">{{ $errors->first('images') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                        </div>
                </form>
            </div>
        </div>
    @endsection
