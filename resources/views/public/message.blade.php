@foreach(['success','danger'] as $k=>$v)
    @if(session($v))
        <div class="alert alert-{{$v}} alert-dismissible fade show" role="alert">
            <strong>{{session()->get($v)}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach