<table class="table table-bordered" id="tableProduct">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price/Item</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $i=> $product)
        <tr>
            <th scope="row">{{ $products->firstItem()+$i }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="#updateProduct" data-toggle="modal" data-id="{{ $product->id }}"
                    data-name="{{  $product->name }}" data-price="{{ $product->price }}"
                    class="btn btn-success update_product_form">
                    <i class="lar la-edit"></i>
                </a>
                <a href="" class="btn btn-danger" id="btn-delete" data-id="{{ $product->id }}">
                    <i class="las la-times-circle"></i>
                </a>
            </td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>
{{ $products->links() }}