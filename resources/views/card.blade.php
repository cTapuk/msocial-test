<div class="card border-primary" style="width: 15rem;">
    <img src="/storage/{{$user->avatar}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$user->name}} {{$user->sname}}</h5>
        <p class="card-text">{{$user->aboutyou}}</p>
    </div>
    <div class="card-footer">
        <small class="text-muted">{{$user->email}}</small>
    </div>
</div>