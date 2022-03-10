<div class="container">
    <form class="form-horizontal mt-5" id="inser-form">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Add New Product</h4>
                    <div class="form-group">
                        <label class="form-label"for="name">Product Name</label>
                        <input type="text" class="form-control form-control-solid" name="name" id="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label  class="form-label"for="category">Product Category</label>
                        <select name="category" name="category" class="form-select" aria-label="Default select example">
                            <option>Choose Product Category</option>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}" {{$cat->id==$product->category_id ? 'selected' : ''}}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="description">Description</label>
                        <textarea name="description" id="description" class="form-control form-control-solid" name="description" cols="30" rows="10">{{$product->description}}</textarea>
                    </div>
                </div>
        </div>
            @if($product->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#inser-form','{{route('products.update',$product->id)}}','PATCH','Update')" id="SubmitCreateArticleForm">Update</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#inser-form','{{route('products.store')}}','POST','Send')" id="SubmitCreateArticleForm">Save</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Back</button>
            </div>
    </form>
</div>