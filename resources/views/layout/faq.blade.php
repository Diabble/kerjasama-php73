@extends('layout.master')
@section('title','FAQ')
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{!! $tangkap2->deskripsicarousel !!}</h2>
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
                    <h2>Have A Questions?</h2>
                </div>
                <div id="accordion">
                    <?php $count = 0 ?>
                    @foreach ($faq as $f)
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{$count}}">
                                <span>
                                    {{$f->id}}
                                </span>
                                {{$f->pertanyaan}}
                            </a>
                        </div>
                        <div id="collapse{{$count}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {{$f->jawaban}}
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