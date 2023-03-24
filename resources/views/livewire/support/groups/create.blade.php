
<div class="container">
    <div class="card">
        <div class="card-body">
            <form role="form" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input1" class="form-label">نام گروه</label>
                            <input type="text" class="form-control" id="Input1">
                            @error('') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select1">گروه اصلی</label>
                            <select class="form-control" id="select1">
                                <option selected>انتخاب کنید ...</option>
                                <option value="1">تست</option>
                                <option value="0">تست</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="file1">لوگو گروه</label>
                        <div class="preview mb-3"></div>
                        <input class="form-control" type="file" id="file1">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">ثبت گروه</button>
            </form>
        </div>
    </div>
</div>

