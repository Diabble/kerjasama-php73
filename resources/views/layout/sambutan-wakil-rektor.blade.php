@extends('layout.master2')
@section('title','Sambutan Wakil Rektor')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Sambutan Wakil Rektor</h2>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="/sambutan-wakil-rektor">Sambutan Wakil Rektor</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- About Start -->
            <div class="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{ asset('storage/' . $tangkap1->poto) }}" alt="Image" style="display:block; margin:auto;">
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <br>
                                <p style="text-align:center"><strong>{{$tangkap1->nama}}</strong></p>
                                <p style="text-align:center">{{$tangkap1->jabatan}}</p>
                                <p style="text-align:center">NIP. {{$tangkap1->nip}}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <!--div class="section-header">
                                <h2>Wakil Rektor Bidang Kerjasama</h2>
                            </div-->
                            <div class="about-text">
                                <p>Assalamualaikum wr. wb.</p>
                                <p>
                                Salam sehat untuk kita semua. Semoga Allah SWT segera mengangkat wabah pandemic Covid-19 di bumi tercinta Indonesia dan juga dunia.
                                <br><br>
                                Alhamdulillah atas rahmat dan hidayah Allah SWT kami menghadirkan website bidang Kerjasama dan Kelembagaan, UIN Syarif Hidayatullah Jakarta sebagai wadah penyampaian informasi yang lengkap, aktual, dan terpercaya,
                                <br><br>
                                Selamat datang bagi civitas UIN Syarif Hidayatulllah Jakarta dan stakeholders yang mengunjungi website kami. Website ini menjadi jendela masuk mendalami business profile lengkap bidang Kerjasama dan Kelembagaan dalam menunjang visi dan misi untuk meningkatkan rekognisi global UIN Syarif Hidayatullah Jakarta di tingkat nasional dan internasional.
                                <br><br>
                                Moto kami adalah memberi pelayanan prima, cepat dan tepat dengan pengembangan digitalisasi system informasi, yang sangat dibutuhkan di era industry 4.0 saat ini. Semoga website ini dapat memenuhi semua informasi yang dibutuhkan dan menjadi jembatan network UIN Syarif Hidayatullah Jakarta dengan dunia luar, serta salah satu leading sector menuju PTNBH.
                                </p>
                                <p>Wassalamualaikum wr. wb</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


@endsection