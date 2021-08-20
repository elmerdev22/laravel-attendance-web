<div>
	<div class="card card-primary card-outline mb-3">
        <form wire:submit.prevent="submit">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <img class="img-fluid border mr-auto ml-auto d-block mb-2" src="{{$photo ? $photo->temporaryUrl() : Utility::getDefaultPhoto('user')}}" style="height: 200px;">
                        <div class="form-group">
                            <label for="photo">Photo</label> 
                            <span wire:loading wire:target="photo">Uploading <span class="fas fa-spinner fa-spin"></span></span>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo" wire:model="photo">
                                    <label class="custom-file-label" for="photo">Choose file</label>
                                </div>
                            </div>
                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" wire:model.lazy="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="Firstname">
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" wire:model.lazy="last_name" class="form-control @error('last_name') is-invalid @enderror" id="first_name" placeholder="Lastname">
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="middle_name">Middle Name (<small>Optional</small>)</label>
                            <input type="text" wire:model.lazy="middle_name" class="form-control" id="middle_name" placeholder="Middlename">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" wire:model.lazy="email_address" class="form-control @error('email_address') is-invalid @enderror" id="email_address" placeholder="Email Address">
                            @error('email_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_no">Contact Number</label>
                            <input type="text" wire:model.lazy="contact_no" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" placeholder="Contact Number">
                            @error('contact_no') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" wire:model.lazy="gender">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" wire:model.lazy="birth_date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" max="{{date('Y-m-d')}}">
                            @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Submit <span wire:loading wire:target="submit" class="fas fa-spinner fa-spin"></span></button>
            </div>
        </form>
    </div>
</div>