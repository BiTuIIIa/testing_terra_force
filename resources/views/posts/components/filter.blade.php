<div class="container" style="margin-top: 100px;" >
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" >
            <span class="font-weight-bold mb-2">
                <span class="d-none d-sm-inline">Posts </span>per Page
            </span>
        </div>
        <div class="col-md-6">
            <div class="input-group" >
                <select name="per_page" class="form-select form-select-sm filter__show-count-select filter-element">
                    @foreach(config('terra.pagination.per_page_list') as $perPage)
                        <option value="{{$perPage}}" @if(isset($params['per_page']) && $params['per_page'] == $perPage) selected @endif>
                            {{$perPage}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
