<div>
    <form wire:submit.prevent="authenticate">
        
        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{Session::get('error')}}
            </div>
        @endif

        <div class="form-group">
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" wire:model.lazy="email" value="{{ old('email') }}" placeholder="Email" autofocus="true">
            @error('email') 
                <span class="invalid-feedback" style="display: block;">
                    <span>{{$message}}</span>
                </span> 
            @enderror
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.lazy="password" placeholder="Password">
            @error('password') 
                <span class="invalid-feedback" style="display: block;">
                    <span>{{$message}}</span>
                </span> 
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" wire:loading.attr="disabled" wire:target="authenticate" class="btn btn-primary text-white  btn-block">
                    Sign In <span wire:loading wire:target="authenticate" class="fas fa-spinner fa-spin"></span>
                </button>
            </div>
        </div>
    </form>
</div>
