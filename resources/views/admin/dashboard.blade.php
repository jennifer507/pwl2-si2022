@extends('_layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table table-stripped">
                            <thead>
                                <th>User</th>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Register Data</th>
                                <th>Paid Status</th>
                               <!-- <th>Action</th> -->
                            </thead>
                            <tbody>
                                @forelse($checkouts as $checkout)
                                    <tr>
                                        <td>{{$checkout->user->name}}</td>
                                        <td>{{$checkout->camp->title}}</td>
                                        <td>Rp. {{$checkout->camp->price}}</td>
                                        <td>{{$checkout->created_at->format('M d Y')}}</td>
                                        <td>{{$checkout->payment_status}}</td>
                                      <!--  <td>
                                            @if($checkout->is_paid)
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning">Waiting</span>
                                            @endif
                                        </td> -->
                                     <!--   <td>
                                      
                                            <form method="post" action="{{route('admin.checkout.update',$checkout->id)}}">
                                                @csrf 
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Set To Paid
</div>

                                            </form>
                                            endif
                                        </td> -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Camps Registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection