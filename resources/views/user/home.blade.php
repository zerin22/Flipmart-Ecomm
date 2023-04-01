
@include('layouts.fontend.inc.header');
{{--user profile section start here --}}
<style>
    input[type="text"] {
        border: none;
    }
</style>
<div class="profile_section" style="margin: 50px 100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-inner text-center" >
                    <div class="user-profile-image">
                        <div class="overlay"></div>
                        <form action="">
                            <img id="img_id" src="{{ asset(Auth::user()->image ?? 'backend/images/default/profile_img.png') }}" alt="img">
                            <input type="file" id="imageInput" class="profile_file">
                        </form>
                    </div>
                    <div class="profile_name">
                        <label class="nameLabel">User Name: </label>
                        <input type="text" value="{{  Auth::user()->name  }}" name="name">
                        <a href="{{ route('userUpdate-Id' , [ 'id' => Auth::user()->id])}}"  class="nameEdit"></a>
                    </div>
                    <div class="profile_email">
                        <label class="nameLabel">User Email: </label>
                        <input type="text" value="{{ Auth::user()->email }}">
                        <a  href="{{ route('emailGet-Id' , [ 'id' => Auth::user()->id])}}" class="nameEdit"></a>
                    </div>
                    <div class="profile_email">
                        <a class="btn btn-primary" href="{{ route('updatePassword-Show')}}" >Update Password</a>
                    </div>
                    <div class="profile_item">
                        <h4>Total Order: <span style="color:green; font-weight:700">{{count($orders)}}</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered text-center">
                    <thead>
                    @if (count($orders) > 0)
                        <tr style="font-size:18px;">
                            <th class="text-center" scope="col">Data</th>
                            <th class="text-center" scope="col">Total</th>
                            <th class="text-center" scope="col">Payment</th>
                            <th class="text-center" scope="col">Invoice</th>
                            <th class="text-center" scope="col">Order</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->	amount }}TK</td>
                            <td>{{ $order->payment_method }}</td>
                            <td> {{ $order->invoice_no }}</td>
                            <td>
                                @if($order->status == "Processing")
                                    <span class="badge badge-success" style="background-color:deeppink">
                                        {{ $order->status}}
                                    </span>
                                @elseif($order->status == "Delivered")
                                    <span class="badge badge-danger" style="background-color:green">
                                        {{ $order->status}}
                                    </span>
                                @elseif($order->status == "Return")
                                    <span class="badge badge-danger" style="background-color:red">
                                        {{ $order->status}}
                                    </span>
                                @elseif($order->status == "Shipped")
                                    <span class="badge badge-danger" style="background-color:#070333">
                                        {{ $order->status}}
                                    </span>
                                @elseif($order->status == "Picked")
                                    <span class="badge badge-danger" style="background-color:#c6cd30">
                                        {{ $order->status}}
                                    </span>
                                @elseif($order->status == "Pending")
                                    <span class="badge badge-danger" style="background-color:#0809d1">
                                        {{ $order->status}}
                                    </span>
                                    @else
                                    <span class="badge badge-danger" style="background-color:#75bb54">
                                        {{ $order->status}}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url("user/orderView/".$order->id) }}" style="margin-bottom: 10px"><i class="fas fa-eye"></i> View</a>
                                <br>
                                <a class="btn btn-danger" href="{{ url("user/downloadInvoice", $order->id) }}"><i class="fas fa-angle-double-down"></i> Invoice</a>
                            </td>
                        </tr>
                        @empty
                        <h1 style="color:red; font-weight: 700; margin-top:100px; text-align:center">Order Empty</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">
         $('#imageInput').change(function (){
            let Reader = new FileReader();
                Reader.readAsDataURL(this.files[0]);
                Reader.onload=function(event){
                    let imgSrc = event.target.result;
                    $("#img_id").attr('src', imgSrc);
                }
            // img settings
             let photoFile = $("#imageInput").prop('files')[0];
             let formData = new FormData();
             formData.append('photo', photoFile);
             photoUpload: '{{route("file.Upload")}}';
             axios.post("photoUpload", formData)
                 .then(function(response){
                     if(response.status===200){
                        toastr.success('Image Update Success');
                     }
                 })
                 .catch(function(error){
                     toastr.error('Image Update Fail');
                 })
         })
    </script>
@endsection
{{-- user profile section ending here --}}

@include('layouts.fontend.inc.footer')


