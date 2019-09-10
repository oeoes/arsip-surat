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
    
    @include('layouts.form')

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
                        <span class="text-success" style="font-size: 24px">{{ $accu }}</span>
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
                        <span class="text-purple" style="font-size: 24px">{{ $in }}</span>
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
                        <span class="text-info" style="font-size: 24px">{{ $out }}</span>
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
                                    <div class="col-12"><i class="fas fa-pencil-alt dt pen" data-toggle="modal" data-target="#update{{ $dt }}" title="Edit"></i></div>
                                    <div class="col-12"><i class="fas fa-trash-alt dt trash" data-toggle="modal" data-target="#delete{{ $dt }}" title="Hapus"></i></div>
                                    <div class="col-12"><i class="fas fa-eye dt eye" data-toggle="modal" data-target="#detail{{ $dt }}" title="View detail"></i></div>
                                    <div class="col-12">
                                        @if($d->is_favorite == 0)
                                        <a href="{{ route('add.favorite', ['id' => $d->id]) }}"><i class="fas fa-star dt star"  title="Tambahkan ke favorit"></i></a>
                                        @else
                                        <a href="{{ route('add.favorite', ['id' => $d->id]) }}"><i class="fas fa-star dt star"  title="Hapus dari favorit" style="color: #fb4"></i></a>
                                        @endif
                                    </div>
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
                                            <div class="col-md-8">
                                                <img src="{{ asset($d->arsip) }}" alt="" style="max-width: 100%; align: center">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <!-- Detail surat -->
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Judul</small></div>
                                                            <div class="col-8">{{ $d->judul }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Tgl surat</small></div>
                                                            <div class="col-8">{{ $d->tgl_surat }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Tgl pembukuan</small></div>
                                                            <div class="col-8">{{ $d->tgl_pembukuan }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Asal surat</small></div>
                                                            <div class="col-8">{{ $d->asal_surat }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Jenis</small></div>
                                                            <div class="col-8">{{ $d->jenis_surat }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>No surat</small></div>
                                                            <div class="col-8">{{ $d->no_surat }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Tujuan</small></div>
                                                            <div class="col-8">{{ $d->tujuan }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Penerima</small></div>
                                                            <div class="col-8">{{ $d->penerima }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>NIP penerima</small></div>
                                                            <div class="col-8">{{ $d->nip_penerima }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Index surat</small></div>
                                                            <div class="col-8">{{ $d->index_surat }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Perihal</small></div>
                                                            <div class="col-8">{{ $d->perihal }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 td-desc">
                                                        <div class="row">
                                                            <div class="col-4"><small>Keterangan</small></div>
                                                            <div class="col-8">{{ $d->keterangan }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center mt-4">
                                                        <a href="{{ asset($d->arsip) }}" target="_blank" class="btn btn-primary" style="width: 50%" title="Download file arsip"><i class="fa fa-download"></i></a>
                                                    </div>
                                                    <!-- End of detail surat -->
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
                                        <h5 class="modal-title h4" id="myLargeModalLabel">Perbarui Surat Masuk/Keluar</h5>
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
                <h3 class="box-title">Baru Ditambahkan <i class="fa fa-star" style="color: #fb4"></i></h3>
                <div class="comment-center p-t-10">
                    <!-- Comment Body -->
                    @foreach ($favorite as $fav)
                    <div class="comment-body">
                        <div class="row no-gutters">
                            <div class="col-1">
                                @if($fav->jenis_surat == 'masuk')
                                <div class="lett-ico in-bg"></div>
                                @else
                                <div class="lett-ico out-bg"></div>
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="mail-contnet pl-0">
                                    <h5 class="mb-0">{{ $fav->judul }}</h5>
                                    @if($fav->jenis_surat == 'masuk')
                                    <div class="text-muted mb-2"><small>Surat {{ $fav->jenis_surat }}</small> | <small>Dari {{ $fav->asal_surat }}</small></div>
                                    @else
                                    <div class="text-muted mb-2"><small>Surat {{ $fav->jenis_surat }}</small> | <small>Ke {{ $fav->asal_surat }}</small></div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 mail-desc mt-0 mb-0">
                                            <div class="row">
                                                <div class="col-md-2">Penerima</div>
                                                <div class="col-md-8">-> {{ $fav->penerima }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12 mail-desc mt-0 mb-0">
                                            <div class="row">
                                                <div class="col-md-2">Index</div>
                                                <div class="col-md-8">-> {{ $fav->index_surat }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12 mail-desc mt-0 mb-0">
                                            <div class="row">
                                                <div class="col-md-2">Keterangan</div>
                                                <div class="col-md-8">-> {{ $fav->keterangan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    @endforeach
                    <!-- End of comment body -->
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel">
                <div class="sk-chat-widgets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Semua Favorite
                        </div>
                        <div class="panel-body">
                            <ul class="chatonline">
                                @foreach($fav_all as $fall)
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="{{ asset('images/users/varun.jpg') }}" alt="user-img" class="rounded-circle"> 
                                        <span>{{ $fall->judul }} @if($fall->jenis_surat == 'masuk')<small class="text-success">{{ $fall->jenis_surat }}</small>@else<small class="text-info">{{ $fall->jenis_surat }}</small>@endif</span>
                                    </a>
                                </li>
                                @endforeach
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
        var url = "{{ route('letters', ['type' => 'all']) }}";
        var Bulan = new Array();
        var Total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Bulan.push(data.bulan);
                Total.push(data.total);
            });           
            var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:Bulan,
                      datasets: [{
                          label: 'Total Catatan surat',
                          data: Total,
                          borderWidth: 1,
                          backgroundColor: 'rgba(255, 99, 132, 0.2)'
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
</script>
@endsection