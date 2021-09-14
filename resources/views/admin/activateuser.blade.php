@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(session('success'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{session('success')}}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger mt-4" role="alert">
                        {{session('error')}}
                    </div>
            @endif
            <form method="POST" action="{{ route('user.status.updating', $user->id)}}">
                @csrf
                <label class="form-label">Activate User</label>
                <select class="form-select form-control" aria-label="Default select example" name="is_active" autofocus>
                    @if($user->is_active)
                    <option selected> Yes</option>
                        @else
                        <option selected> No</option>
                    @endif
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <button class="btn btn-primary mt-2" type="submit"> Done </button>
            </form>
        </div>
    </div>
</div>
@endsection
