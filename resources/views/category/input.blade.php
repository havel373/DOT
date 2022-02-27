<div class="container">
    <form class="form-horizontal mt-5" id="insert-form">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Add New Category</h4>
                    <div class="form-group">
                        <label class="form-label"for="name">Category Name</label>
                        <input type="text" class="form-control form-control-solid" name="name" id="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label class="form-label"for="description">Description</label>
                        <textarea name="description" id="description" class="form-control form-control-solid" name="description" cols="30" rows="10">{{$category->description}}</textarea>
                    </div>
                </div>
        </div>
            @if($category->id)
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#insert-form','{{route('categories.update',$category->id)}}','PATCH','Update')" id="SubmitCreateArticleForm">Update</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#insert-form','{{route('categories.store')}}','POST','Send')" id="SubmitCreateArticleForm">Save</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Back</button>
            </div>
    </form>
</div>