
<div class="container">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">افزودن دسترسی</div>
            <div class="card-body">
                <form wire:submit.prevent="permissionForm">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">نام دسترسی به انگلیسی</label>
                        <input type="text" class="form-control" id="Input1" wire:model.defer="permission.title">
                        @error('permission.title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input1" class="form-label">نام دسترسی به فارسی</label>
                        <input type="text" class="form-control" id="Input1" wire:model.defer="permission.value">
                        @error('permission.value') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت دسترسی</button>
                </form>
            </div>
        </div>
    </div>
</div>
