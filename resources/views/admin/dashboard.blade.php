@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Day Registered</th>
                    <th scope="col">Activation Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($otherUsers as $otherUser)
                <tr>
                    <th scope="row">{{$otherUser->name}}</th>
                    <td>{{$otherUser->email}}</td>
                    <td>{{$otherUser->created_at}}</td>
                    <td>
                        @if($otherUser->is_active == true)
                            <option selected> Is Active</option>
                            @else
                                <option selected> Is Not Active</option>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-outline-success" href="{{route('user.status.update', $otherUser->id)}}">Activate User</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection