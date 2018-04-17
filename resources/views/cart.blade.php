<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/site.css">
    <link rel="stylesheet" href="../css/shop.css">

</head>
<body>

@include("layouts.Header")

<div class="row">
    <div>
        <a href="/shop">Back</a>
    </div>

    <div>
    <a href="/shop/basket">CART</a>
    </div>
</div>

<div class="container">
    @forelse ($items as $item)
        <div class="row">
            <div class="col-2-md">
                {{$item['name']}}
            </div>

            <div class="col-2-md">
                Quantity : {{$item['number']}}
            </div>

            <form action="/remove" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="product" value="{{$item['id']}}">
                Number of products
                <input type="text" name="number" value="{{$item['number']}}">
                <input type="submit" value="Change number">
            </form>

        </div>
    @empty
        <div class="row">
            No products
        </div>
    @endforelse
</div>

@include("layouts.Footer")

</body>
</html>