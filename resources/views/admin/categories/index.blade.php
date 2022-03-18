@extends('layouts.app', ['page' => __('categories'), 'pageSlug' => 'categories'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Categories</h4>
                            <p class="card-category"> Here is the categories </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.categories.create') }}"
                                            class="btn btn-sm btn-primary">Add
                                            new category</a>
                                    </div>
                                </div>
                                <table class="table">

                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            English Name
                                        </th>
                                        <th>
                                            Arabic Name
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.categories.show', $category) }}">{{ $category->getTranslation('name', 'ar') }}</a>
                                                </td>
                                                <td>
                                                    {{ $category->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.categories.edit', $category) }}"
                                                            data-original-title="" title="">
                                                            <button type="button" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-icon">
                                                                <i class="tim-icons icon-settings"></i>
                                                            </button>
                                                        </a>
                                                        <button type="submit" rel="tooltip"
                                                            class="btn btn-danger btn btn-danger btn-sm btn-icon">
                                                            <i class="tim-icons icon-simple-remove"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-3 text-center m-auto">
                                        {{ $categories->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
