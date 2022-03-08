@extends('layouts.master')
@section('title','Frequently Answer and Questions')
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{!! $tangkap2->deskripsicarousel !!}</h3>
            </div>
            <div class="col-12">
                <a href="/">Home</a>
                <a href="/faq">Frequently Answer and Questions</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- FAQs Start -->
<div class="faqs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header">
                    <h3>Have A Questions?</h3>
                </div>
                <div id="accordion">
                    <?php $count = 0 ?>
                    @foreach ( $faq as $row )
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{$count}}">
                                <span>
                                {{ $row->id }}
                                </span>
                                {{ $row->pertanyaan }}
                            </a>
                        </div>
                        <div id="collapse{{$count}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {{ $row->jawaban }}
                            </div>
                        </div>
                    </div>
                    <?php $count++ ?>
                    @endforeach
                </div>
                <a class="btn float-right" href="https://web.whatsapp.com">Ask more</a>
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->

@endsection