
<div class="container">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">افزودن مقام</div>
            <div class="card-body">
                <form wire:submit.prevent="roleForm">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">نام مقام به لاتین</label>
                        <input type="text" class="form-control" id="Input1" wire:model.defer="role.title">
                        @error('role.title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input1" class="form-label">توضیح مقام به فارسی</label>
                        <input type="text" class="form-control" id="Input1" wire:model.defer="role.value">
                        @error('role.value') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت مقام</button>
                </form>
            </div>
        </div>
    </div>
</div>
