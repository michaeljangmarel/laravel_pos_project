@extends('user.layout.master')

@section('lala')



    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <a href="{{ route('userui') }}" class="text-dark">
                    <i class="fa-solid fa-arrow-left fs-3"></i>
                </a>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Order  Code</th>
                             <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($order as $o )
                       <tr>
                         <td class="align-middle">{{ $o->created_at->format('D-M-Y | h:i') }}</td>
                         <td class="align-middle">{{ $o->order_code }}</td>
                         <td class="align-middle">{{ $o->final_amount }}</td>
                         <td class="align-middle">
                             @if ( $o->status == 0 )
                                 <small class="text-warning"> <i class="fa-solid fa-hourglass-start"></i>Pending....</small>
                             @elseif ($o->status == 1)
                             <small class="text-success"> <i class="fa-solid fa-check"></i>Success....</small>
                             @elseif ($o->status == 2)
                                <small class="text-danger"><i class="fa-solid fa-xmark"></i>Rejected....</small>

                             @endif
                         </td>


                    </tr>

                       @endforeach


                    </tbody>

                </table>
                <div class="mt-3">
                    {{ $order->links() }}
                </div>
            </div>

        </div>
    </div>
    <!-- Cart End -->


@endsection
