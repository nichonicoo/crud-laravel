<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    <div>Index</div>
    <div>
            <a href=" {{ route('products.create') }}">Insert a Products</a>

    </div>
    <div>
        @if (session()->has('success'))
            <div>
               {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1" >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <a href="{{ route('products.edit', ['products' => $product]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('products.delete', ['products'=> $product]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="Submit" value="delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>

</body>
</html>
