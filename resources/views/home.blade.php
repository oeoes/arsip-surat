@extends('layouts.master')

@section('content')

    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#" data-toggle="modal" data-target="#addSurat"><i class="fas fa-scroll"></i> Record Surat</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <!-- Large modal -->

    <div class="modal fade" id="addSurat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Rekam Surat Masuk/Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->

                <form method="POST" enctype="multipart/form-data" action="{{ route('record.surat') }}">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukan judul">
                    </div>

                    <div class="form-group">
                        <label for="tgl_pembukuan">Tanggal Pembukuan</label>
                        <input name="tgl_pembukuan" type="date" class="form-control" id="tgl_pembukuan">
                    </div>

                    <div class="form-group">
                        <label for="asal_surat">Asal</label>
                        <input name="asal_surat" type="text" class="form-control" id="asal_surat" placeholder="Masukan asal surat">
                    </div>

                    <div class="form-group">
                        <label for="no_surat">No Surat</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat" placeholder="Masukan no surat">
                    </div>

                    <div class="form-group">
                        <label for="index_surat">Index</label>
                        <input name="index_surat" type="text" class="form-control" id="index_surat" placeholder="Masukan index surat">
                    </div>

                    <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat</label>
                        <input name="tgl_surat" type="date" class="form-control" id="tgl_surat" placeholder="Masukan tanggal surat">
                    </div>

                    <div class="form-group">
                        <label for="jenis_surat">Jenis</label>
                        <select name="jenis_surat" class="form-control" id="jenis_surat">
                            <option value="masuk">Surat Masuk</option>
                            <option value="keluar">Surat Keluar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input name="perihal" type="text" class="form-control" id="perihal" placeholder="Masukan perihal">
                        <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila Perihal tidak tersedia</small>
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input name="tujuan" type="text" class="form-control" id="tujuan" placeholder="Ditujukan kepada">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="5" rows="5" placeholder="Masukan keterangan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input name="penerima" type="text" class="form-control" id="penerima" placeholder="Masukan penerima surat">
                    </div>

                    <div class="form-group">
                        <label for="nip_penerima">NIP</label>
                        <input name="nip_penerima" type="text" class="form-control" id="nip_penerima" placeholder="Masukan NIP penerima">
                        <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila NIP tidak tersedia</small>
                    </div>

                    <div class="form-group">
                        <label for="arsip">Arsip</label>
                        <input name="arsip" type="file" class="form-control" id="arsip">
                        <small class="form-text text-muted">Upload arsip berupa gambar hasil scan.</small>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>

                <!-- End of Form -->
            </div>
        </div>
    </div>
    </div>
    <!-- End of large modal -->

    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Akumulasi Surat</h3>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4 text-right">
                        <span class="text-success" style="font-size: 24px">659</span>
                    </div>
                </div>                
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Surat Masuk</h3>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4 text-right">
                        <span class="text-purple" style="font-size: 24px">989</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Surat Keluar</h3>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4 text-right">
                        <span class="text-info" style="font-size: 24px">778</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Grafik Pembukuan Keluar/Masuk Surat</h3>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <select class="form-control pull-right row b-none">
                        <option>March 2017</option>
                        <option>April 2017</option>
                        <option>May 2017</option>
                        <option>June 2017</option>
                        <option>July 2017</option>
                    </select>
                </div>
                <h3 class="box-title">Baru Dibukukan</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul surat</th>
                                <th>Tanggal surat</th>
                                <th>Tanggal pembukuan</th>
                                <th>Asal Surat</th>
                                <th>Jenis</th>
                                <th colspan="2">Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt => $d)
                            <tr class="list-surat" title="{{ $d->judul }}">
                                <td>{{ $dt+1 }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->tgl_surat }}</td>
                                <td>{{ $d->tgl_pembukuan }}</td>
                                <td>{{ $d->asal_surat }}</td>
                                @if ($d->jenis_surat == 'masuk')
                                <td class="text-success">{{ $d->jenis_surat }}</td>
                                @else
                                <td class="text-info">{{ $d->jenis_surat }}</td>
                                @endif
                                <td>{{ $d->tujuan }}</td>
                                <td><div class="row">
                                    <div class="col-12"><i class="fas fa-pencil-alt dt" data-toggle="modal" data-target="#update{{ $dt }}" title="Edit"></i></div>
                                    <div class="col-12"><i class="fas fa-trash-alt dt" data-toggle="modal" data-target="#delete{{ $dt }}" title="Hapus"></i></div>
                                    <div class="col-12"><i class="fas fa-eye dt" data-toggle="modal" data-target="#detail{{ $dt }}" title="View detail"></i></div>
                                </div></td>
                            </tr>

                            <!-- Large modal View detail-->
                            <div class="modal fade" id="detail{{ $dt }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myLargeModalLabel">{{ $d->judul }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <img src="{{ asset($d->arsip) }}" alt="" style="max-width: 100%; align: center">
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-4 offset-md-4">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- End of large modal -->

                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete{{ $dt }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="h4">Apa Anda yakin untuk menghapus arsip surat "{{ $d->judul }}"?</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="{{ route('delete.surat', ['id' => $d->id]) }}" class="btn btn-danger">Ya, tentu.</a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- End of vertical delete modal -->

                            <!-- Large modal Edit-->

                            <div class="modal fade" id="update{{ $dt }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myLargeModalLabel">Rekam Surat Masuk/Keluar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form -->

                                        <form method="POST" enctype="multipart/form-data" action="{{ route('update.surat', ['id' => $d->id]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input value="{{ $d->judul }}" name="judul" type="text" class="form-control" id="judul" placeholder="Masukan judul">
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_pembukuan">Tanggal Pembukuan</label>
                                                <input value="{{ $d->tgl_pembukuan }}" name="tgl_pembukuan" type="date" class="form-control" id="tgl_pembukuan">
                                            </div>

                                            <div class="form-group">
                                                <label for="asal_surat">Asal</label>
                                                <input value="{{ $d->asal_surat }}" name="asal_surat" type="text" class="form-control" id="asal_surat" placeholder="Masukan asal surat">
                                            </div>

                                            <div class="form-group">
                                                <label for="no_surat">No Surat</label>
                                                <input value="{{ $d->no_surat }}" name="no_surat" type="text" class="form-control" id="no_surat" placeholder="Masukan no surat">
                                            </div>

                                            <div class="form-group">
                                                <label for="index_surat">Index</label>
                                                <input value="{{ $d->index_surat }}" name="index_surat" type="text" class="form-control" id="index_surat" placeholder="Masukan index surat">
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_surat">Tanggal Surat</label>
                                                <input value="{{ $d->tgl_surat }}" name="tgl_surat" type="date" class="form-control" id="tgl_surat" placeholder="Masukan tanggal surat">
                                            </div>

                                            <div class="form-group">
                                                <label for="jenis_surat">Jenis</label>
                                                <select name="jenis_surat" class="form-control" id="jenis_surat">
                                                    @if($d->jenis_surat == 'masuk')
                                                        <option value="masuk" selected>Surat Masuk</option>
                                                        <option value="keluar">Surat Keluar</option>
                                                    @else
                                                        <option value="masuk">Surat Masuk</option>
                                                        <option value="keluar" selected>Surat Keluar</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="perihal">Perihal</label>
                                                <input value="{{ $d->perihal }}" name="perihal" type="text" class="form-control" id="perihal" placeholder="Masukan perihal">
                                                <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila Perihal tidak tersedia</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="tujuan">Tujuan</label>
                                                <input value="{{ $d->tujuan }}" name="tujuan" type="text" class="form-control" id="tujuan" placeholder="Ditujukan kepada">
                                            </div>

                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" id="keterangan" cols="5" rows="5" placeholder="Masukan keterangan">{{ $d->keterangan }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="penerima">Penerima</label>
                                                <input value="{{ $d->penerima }}" name="penerima" type="text" class="form-control" id="penerima" placeholder="Masukan penerima surat">
                                            </div>

                                            <div class="form-group">
                                                <label for="nip_penerima">NIP</label>
                                                <input value="{{ $d->nip_penerima }}" name="nip_penerima" type="text" class="form-control" id="nip_penerima" placeholder="Masukan NIP penerima">
                                                <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila NIP tidak tersedia</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="arsip">Arsip</label>
                                                <input name="arsip" type="file" class="form-control" id="arsip">
                                                <small class="form-text text-muted">Kosongkan field ini apabila tidak akan mengubah gambar yang terkini.</small>
                                            </div>

                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </form>

                                        <!-- End of Form -->
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- End of large modal -->
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- chat-listing & recent comments -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- .col -->
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Recent Comments</h3>
                <div class="comment-center p-t-10">
                    <div class="comment-body">
                        <div class="user-img"> <img src="{{ asset('images/users/pawandeep.jpg') }}" alt="user" class="rounded-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5><span class="time">10:20 AM   20  may 2016</span>
                            <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                        </div>
                    </div>
                    <div class="comment-body">
                        <div class="user-img"> <img src="{{ asset('images/users/sonu.jpg') }}" alt="user" class="rounded-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Sonu Nigam</h5><span class="time">10:20 AM   20  may 2016</span>
                            <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span>
                        </div>
                    </div>
                    <div class="comment-body b-none">
                        <div class="user-img"> <img src="{{ asset('images/users/arijit.jpg') }}" alt="user" class="rounded-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Arijit singh</h5><span class="time">10:20 AM   20  may 2016</span>
                            <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel">
                <div class="sk-chat-widgets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CHAT LISTING
                        </div>
                        <div class="panel-body">
                            <ul class="chatonline">
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/varun.jpg') }}" alt="user-img" class="rounded-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/genu.jpg') }}" alt="user-img" class="rounded-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/ritesh.jpg') }}" alt="user-img" class="rounded-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/arijit.jpg') }}" alt="user-img" class="rounded-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/govinda.jpg') }}" alt="user-img" class="rounded-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/hritik.jpg') }}" alt="user-img" class="rounded-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/varun.jpg') }}" alt="user-img" class="rounded-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('custom-js')
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
        {
            label: 'Surat Masuk',
            data: [12, 19, 3, 5, 2, 3, 19, 3, 5, 2, 3, 19],
            backgroundColor: 'rgba(255, 99, 132, 0.2)'
        },
        {
            label: 'Surat Keluar',
            data: [10, 9, 20, 7, 5, 9, 9, 20, 7, 7, 5, 9],
            backgroundColor: 'rgba(255, 206, 86, 0.2)'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection