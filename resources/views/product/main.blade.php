<x-LayoutApp title="Products">
<div id="content_input"></div>
<div id="content_list">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
            <button onclick="load_input('{{route('products.create')}}');" style="float: right;" class="btn btn-primary mb-3" type="button">
                Add New Product
            </button>
            </div>
            <div class="col-md-12">
                <h2 class="text-center m-4">Products List</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mt-3">
                            <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('custom_js')
<script>
    load_list(1);
</script>
@endsection
</x-LayoutApp>