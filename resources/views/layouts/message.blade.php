<div class="col-6">
    @if (session('success'))
<div class="alert alert-success alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
    {{session('success')}}
  </div>
</div>
@elseif (session('warning'))
<div class="alert alert-warning alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
   {{session('warning')}}
  </div>
</div>
@elseif (session('danger'))
<div class="alert alert-danger alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
   {{session('danger')}}
  </div>
</div>
@elseif (session('error'))
<div class="alert alert-error alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
   {{session('error')}}
  </div>
</div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {!! $error !!}
            </div>
        </div>
    @endforeach
@endif
</div>
