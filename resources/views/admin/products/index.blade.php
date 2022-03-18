@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Product</h4>
                            <p class="card-category"> Here is the Products</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">Add
                                            new product</a>
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
                                            Status
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->id }}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.products.show', $product) }}">{{ $product->getTranslation('name', 'ar') }}</a>
                                                </td>
                                                <td>
                                                    {{ $product->status }}
                                                </td>
                                                <td>
                                                    {{ $product->category->name }}
                                                </td>
                                                <td>
                                                    {{ $product->price }}
                                                </td>
                                                <td>
                                                    {{ $product->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.products.destroy', $product) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.products.edit', $product) }}"
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
                                        {{ $products->links('pagination::bootstrap-4') }}
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
