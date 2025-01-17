@extends('investor.layout_investor')
@section('content')

<!--Page Header Start-->
<section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg);">
    <div class="container">
        <h2>MUDAHKAN INVESTASIMU</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index.html">Mulai Sekarang</a></li>
        </ul>
    </div>
</section>

<!--Three Icon Boxes Start-->
<section class="three_icon_boxes why_choose_us_three_icon">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <!--Three Icon Boxes single-->
                <div class="three_icon_boxes_single wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1200ms">
                    <div class="three_icon_box">
                        <span class="icon-target"></span>
                    </div>
                    <h3>SIAPKAN MODAL DI MASA DEPAN</h3>
                    {{-- <p>There are many variations of passages of lorem ipsum but the majority.</p> --}}
                </div>
            </div>
            <div class="col-xl-4">
                <!--Three Icon Boxes single-->
                <div class="three_icon_boxes_single wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    <div class="three_icon_box">
                        <span class="icon-team"></span>
                    </div>
                    <h3>MEMBANTU PARA UMKM DAN EKONOMI DI INDONESIA</h3>
                    {{-- <p>There are many variations of passages of lorem ipsum but the majority.</p> --}}
                </div>
            </div>
            <div class="col-xl-4">
                <!--Three Icon Boxes single-->
                <div class="three_icon_boxes_single wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1200ms">
                    <div class="three_icon_box">
                        <span class="icon-mission"></span>
                    </div>
                    <h3>RAIH PROFIT HINGGA JUTAAN RUPIAH</h3>
                    {{-- <p>Para investor yang cerdas dan berpengalaman berhasil meraih profit hingga jutaan rupiah dengan strategi investasi yang tepat..</p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@if ($mess = Session::get('transaction-success'))
<div class="alert alert-success mx-5 text-center" role="alert">
    <p>{!! $mess !!}</p>
</div>
@endif
@if ($mess = Session::get('transaction-error'))
<div class="alert alert-danger mx-5 text-center" role="alert">
    <p>{!! $mess !!}</p>
</div>
@endif
<div class="investor_page_wrapper">
    <div class="container">
        <div class="row">
            @foreach ($datas as $data)
            @foreach ($data->payment as $pembayaran)
            <div class="col-md-12 mb-5 mt-3">
                <div class="card mb-3">
                    <img src="{{asset('storage/'.$data->gambar)}}" class="card-img-top"
                        style="width: auto; height: 500px" alt="...">
                    <div class="card-body">
                        <p class="text-black " style="font-size: 2.5rem; text-transform: uppercase; font-weight: 600">
                            {{ $data->nama_usaha }}</p>
                        <div style="border-radius: 6px; background-color: rgb(147, 232, 249); padding-top: 4px;">
                            <p style="margin-left: 10px; color: rgb(22, 153, 180)">Jumlah Modal Yang Harus Dibayar Rp.
                                {{ number_format($data->dana, 2) }}</p>
                        </div>
                        <div class="row" style="gap: 20px">
                            <div class="col-md-4 text-center">
                                <i class="fas fa-money-bill" style="font-size: 1.5rem"></i>
                                <p style="text-transform: capitalize">{{ $pembayaran->status ? "Sudah Didanai" : "Belum Didanai" }}</p>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-clock" style="font-size: 1.5rem"></i>
                                <p>{{ $data->waktu }} Minggu</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="fas fa-credit-card" style="font-size: 1.5rem;"></i>
                                <p style="text-transform: capitalize">{{ $pembayaran->status ? "Lunas" : "Belum Lunas" }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="desc_section">
                            <p class="text-black-50" style="font-size: 20px; font-weight: 600">DESCRIPTION</p>
                            <p>{!! $data->deskripsi !!}</p>
                        </div>
                        <div class="footer d-flex justify-content-between align-items-center">
                            @if ($pembayaran->status)
                            <div>
                                <button class="btn btn-success" style="cursor: not-allowed" disabled>Sudah Dibayar</button>
                            </div>
                            @else
                                <div>
                                    <a href="{{ URL('investor-page/pembayaran/' . $data->id) }}"
                                        class="btn btn-info">Bayar Sekarang</a>
                                </div>
                            @endif
                            <div>
                                <p style="font-size: 12px; text-align: end">Dibuat Pada:
                                    {{ $data->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection