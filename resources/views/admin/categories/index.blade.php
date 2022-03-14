@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Products</h4>
                            <p class="card-category"> Here is the product</p>
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
                                                            <i class="icon-pencil">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-link"
                                                            data-original-title="" title="">
                                                            <i class="icon-trash-simple">delete</i>
                                                            <div class="ripple-container"></div>
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
