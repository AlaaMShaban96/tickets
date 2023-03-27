@extends("layout.master")

@section("content")
 <!-- breadcrumb -->
 <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
    <div class="container">
        <h2 class="breadcrumb-title">Flight Full Width</h2>
        <ul class="breadcrumb-menu">
            <li><a href="index.html">Home</a></li>
            <li class="active">Flight Full Width</li>
        </ul>
    </div>
</div>




<!-- search area -->
<x-flight-booking.search></x-flight-booking.search>
<!-- search area end -->



<!-- flight booking -->
<x-flight-booking.list></x-flight-booking.list>
<!-- flight booking end -->

@endsection
