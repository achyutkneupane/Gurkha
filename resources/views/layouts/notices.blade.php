@if(auth()->check() && auth()->user()->role == 'user' && !auth()->user()->isFilled())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-danger text-center" role="alert">
                You must fill out your form. <a href='{{ route('profile.edit',auth()->id()) }}'>Click here</a> to add all the details.
              </div>
        </div>
    </div>
</div>
@endif