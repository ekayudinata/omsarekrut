<!doctype html>
<html lang="en">

<head>
    <!-- required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/formstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>OMSA Medic | {{ $title }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favico/favicon-16x16.png">
    <link rel="manifest" href="/img/favico/site.webmanifest"> 
    <style>
        h1 {
            display: flex;
            font-size: 16px;
            flex-direction: row;
        }
        h1:after{
            content: "";
            flex: 1 1;
            border-bottom: 1px solid;
            margin: auto;
        }
        h1:after {
            margin-left: 10px
        }
      </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a href="https://www.omsamedic.com/" class="navbar-brand"><img src="img/logo.png" alt="" width="150px"></a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-5 mt-5 text-center"><b>{{ $title }}</b> - OMSA MEDIC</h3>

        @if (session()->has('success'))
        <script>
            Swal.fire({
                title: 'LAMARAN TERKIRIM',
                text: '{{ session("success")  }}',
                icon: 'success',
                showConfirmButton: false, 
                showCloseButton:true
            })
        </script>
        @endif
        
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex" id="flexContainer">

                <div class="me-4 col-3" id="fotoForm">
                    <div class="col-12">
                        <img id="file-ip-1-preview" src="img/default.jpg" alt="" style="max-width: 100%; height: auto;">
                        <input type="file" id="pp" name="profile" style="display:none;" onchange="showPreview(event);" class="@error('profile') is-invalid @enderror">
                        <a class="btn btn-primary mt-3" type="button" style="width: 100%;" id="button" name="button" value="Upload" onclick="thisFileUpload();">Upload Foto</a>
                        @error('profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mt-5">

                       
                    <div class="mb-3"><h1><b>BIDANG PEKERJAAN</b></h1></div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Wilayah</label>
                        <select class="form-select @error('region_id') is-invalid @enderror" name="region_id" id="wilayah">
                            <option value="" selected>Pilih Wilayah</option>
                            <option disabled value="">------------------</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        <span class="badge bg-secondary mt-2">*Pilih wilayah terlebih dahulu</span>
                        @error('region_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Posisi</label>
                        <select class="form-select @error('workfield_id') is-invalid @enderror" name="workfield_id" id="posisi">
                            <option value="">Pilih Posisi</option>
                            <option disabled value="">------------------</option>
                        </select>
                        @error('workfield_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    </div>

                </div>
               

                <div class="col-9" id="idForm">

                    <input type="hidden" name="application_date" value="<?= date("Y/m/d") ?>">

                    <div class="mb-3"><h1><b>DATA DIRI</b></h1></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">No. Telepon <span style="color:red">*</span></label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="No. Telepon" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-Mail <span style="color:red">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir <span style="color:red">*</span></label>
                            <input type="text" class="form-control @error('place_birth') is-invalid @enderror" placeholder="Tempat Lahir" name="place_birth" value="{{ old('place_birth') }}">
                            @error('place_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                            <input type="date" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}">
                            @error('date_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Sesuai KTP <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Sesuai KTP" name="address" value="{{ old('address') }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Domisili <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('residence_address') is-invalid @enderror" placeholder="Alamat Domisili" name="residence_address" value="{{ old('residence_address') }}">
                        @error('residence_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <br>
                    <div class="mb-3"><h1><b>KONTAK YANG DAPAT DIHUBUNGI</b></h1></div>
                    <div class="mb-3">
                        <label class="form-label">Nama <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('family_name') is-invalid @enderror" placeholder="Nama" name="family_name" value="{{ old('family_name') }}">
                      
                        @error('family_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hubungan <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('family_status') is-invalid @enderror" placeholder="Hubungan" name="family_status" value="{{ old('family_status') }}">
                        <span class="badge bg-secondary mt-2">*Contoh: Ayah, Ibu, Wali , dll</span>
                        @error('family_status')location
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon <span style="color:red">*</span></label>
                        <input type="number" class="form-control @error('family_phone') is-invalid @enderror" placeholder="No. Telepon" name="family_phone" value="{{ old('family_phone') }}">
                        @error('family_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <br>
                    <div class="mb-3"><h1><b>PENDIDIKAN TERAKHIR</b></h1></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Universitas / Institut / Sekolah <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('studies') is-invalid @enderror" placeholder="Nama Universitas / Institut / Sekolah" name="studies" value="{{ old('studies') }}">
                        @error('studies')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('major') is-invalid @enderror" placeholder="Jurusan" name="major" value="{{ old('major') }}">
                        @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Pendidikan Terakhir <span style="color:red">*</span></label>
                            <select class="form-select @error('edu_level') is-invalid @enderror" name="edu_level">
                                <option value="" selected>Pilih Pendidikan Terakhir</option>
                                <option value="SMA/K" @if (old('edu_level') == "SMA/K") {{ 'selected' }} @endif>SMA/K</option>
                                <option value="Diploma" @if (old('edu_level') == "Diploma") {{ 'selected' }} @endif>Diploma</option>
                                <option value="Sarjana" @if (old('edu_level') == "Sarjana") {{ 'selected' }} @endif>Sarjana</option>
                            </select>
                            @error('edu_level')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror   
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun Lulus <span style="color:red">*</span></label>
                            <input type="number" class="form-control @error('grad_year') is-invalid @enderror" placeholder="Tahun Lulus" name="grad_year" value="{{ old('grad_year') }}">
                            @error('grad_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
        
                    <br>
                    <div class="mb-3"><h1><b>PENGALAMAN KERJA</b></h1></div>

                    <div class="mb-3">
                        <label class="form-label"><b>Nama Instansi 1</b></label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_name" value="{{ old('work_name') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pimpinan</label>
                            <input type="text" class="form-control" placeholder="Nama Pimpinan" name="lead_name" value="{{ old('lead_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Kontak Pimpinan</label>
                            <input type="number" class="form-control" placeholder="No. Kontak Pimpinan" name="lead_phone_number" value="{{ old('lead_phone_number') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi Terakhir</label>
                        <input type="text" class="form-control" placeholder="Posisi terakhir" name="position" value="{{ old('position') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="start_year" value="{{ old('start_year') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berhenti</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="end_year" value="{{ old('end_year') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="description">{{ old('description') }}</textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label class="form-label"><b>Nama Instansi 2</b></label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_namei" value="{{ old('work_namei') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pimpinan</label>
                            <input type="text" class="form-control" placeholder="Nama Pimpinan" name="lead_namei" value="{{ old('lead_namei') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Kontak Pimpinan</label>
                            <input type="number" class="form-control" placeholder="No. Kontak Pimpinan" name="lead_phone_numberi" value="{{ old('lead_phone_numberi') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi Terakhir</label>
                        <input type="text" class="form-control" placeholder="Posisi terakhir" name="positioni" value="{{ old('positioni') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="start_yeari" value="{{ old('start_yeari') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berhenti</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="end_yeari" value="{{ old('end_yeari') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="descriptioni">{{ old('descriptioni') }}</textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label class="form-label"><b>Nama Instansi 3</b></label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_nameii" value="{{ old('work_nameii') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pimpinan</label>
                            <input type="text" class="form-control" placeholder="Nama Pimpinan" name="lead_nameii" value="{{ old('lead_nameii') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Kontak Pimpinan</label>
                            <input type="number" class="form-control" placeholder="No. Kontak Pimpinan" name="lead_phone_numberii" value="{{ old('lead_phone_numberii') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi Terakhir</label>
                        <input type="text" class="form-control" placeholder="Posisi terakhir" name="positionii" value="{{ old('positionii') }}">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="start_yearii" value="{{ old('start_yearii') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berhenti</label>
                            <input type="date" class="form-control" placeholder="Tahun" name="end_yearii" value="{{ old('end_yearii') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="descriptionii">{{ old('descriptionii') }}</textarea>
                    </div>
                    <br>
                    <div class="mb-3"><h1><b>DOKUMEN PENUNJANG</b></h1></div>

                    
                    <div class="mb-3" id="checkdisplay">
                        <label class="form-label">Sertifikat STR / STRA / STRTTK</label>
                        <input type="file" class="form-control @error('str_certificate') is-invalid @enderror" name="str_certificate">
                        <span class="badge bg-danger mt-2">*Wajib untuk pelamar medis</span>
                        @error('str_certificate')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Foto KTP <span style="color:red">*</span></label>
                            <input type="file" class="form-control @error('personal_id_card') is-invalid @enderror" name="personal_id_card">
                                @error('personal_id_card')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Foto KK <span style="color:red">*</span></label>
                            <input type="file" class="form-control @error('family_id_card') is-invalid @enderror" name="family_id_card">
                            @error('family_id_card')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Scan Ijazah / Surat Keterangan Lulus <span style="color:red">*</span></label>
                            <input type="file" class="form-control @error('study_certificate') is-invalid @enderror" name="study_certificate">
                            @error('study_certificate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Scan Transkrip</label>
                            <input type="file" class="form-control @error('transcript') is-invalid @enderror" name="transcript">
                            @error('transcript')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Scan SKCK</label>
                            <input type="file" class="form-control @error('skck') is-invalid @enderror" name="skck">
                            @error('skck')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Surat Keterangan Sehat</label>
                            <input type="file" class="form-control @error('health_information') is-invalid @enderror" name="health_information">
                            @error('health_information')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <span class="badge bg-danger">*Pastikan foto berformat .jpg dengan ukuran < 1MB</span>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Dokumen Lainnya</label>
                        <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="certificate_address" class="myfrm form-control @error('certificate_address') is-invalid @enderror">
                            @error('certificate_address')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <span class="badge bg-danger mt-2">*Satukan dokumen menjadi file .pdf dengan ukuran < 1MB</span>
                    </div>

                    <button class="w-20 btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Kirim Lamaran</button>
                    <br>
                    <div style="height: 10px"></div>
                    <span style="color:red ; margin-top:20px">* Wajib diisi </span>
                </div>
                
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Lamaran Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Pastikan semua data sudah benar! kirim lamaran?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                </div>
            </div>

        </form>


    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center" id="txtReserved">
                <span class="text-muted">© <?= date("Y") ?>, OMSA GROUP. All right reserved</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" id="icoSosmed">
                <li class="ms-3">
                    <a href="https://www.facebook.com/omsamedic/" class="text-muted">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.instagram.com/omsa.medic" class="text-muted">
                        <i class="bi bi-instagram"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.youtube.com/channel/UCi9JBjs0vbY9i3uV8L7-lag" class="text-muted">
                        <i class="bi bi-youtube"></i>
                    </a>
                </li>
            </ul>
        </footer>
    </div>

    <script src=" js/bootstrap.bundle.min.js">
    </script>
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <script>
        function thisFileUpload() {
            document.getElementById("pp").click();
        };
    </script>
    
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        

    </script>
    
    <script>

        $(document).ready(function(){

            $('#wilayah').on('change',function(){

                var regionsId = $(this).val(); 
                if(regionsId){
                    $.ajax({
                        url:'/recruit/'+regionsId, 
                        type:'GET', 
                        data:{"_token":"{{ csrf_token() }}"}, 
                        dataType:"json", 
                        success:function(data){ 

                            if(data.length > 0){
                                $('#posisi').empty();
                                $('#posisi').append('<option hidden>Pilih Posisi</option>'); 
                                $.each(data, function(index, showdata){
                                $('select[name="workfield_id"]').append('<option value="'+ showdata.id +'">' + showdata.name+ '</option>');
                                })
                            }else{
                                $('#posisi').empty();
                                $('#posisi').append('<option>Tidak ada lowongan </option>'); 
                            }

                        }
                    }); 
                }

            })

        })
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    
    </html>