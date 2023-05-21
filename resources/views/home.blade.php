@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" id="saveexpert" action="javascript:void(0)">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="test">
                            <label class="custom-file-label" for="customFile">Resim Dosyası Seçin</label>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <img id="view" src="img/blank_image.png" class="rounded img-thumbnail float-left" alt="">
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="disClass">Hastalık Sınıfı: </label>
                                    <select class="form-control" id="class" name="class">
                                    <option value="infeksiyoz">İnfeksiyöz Deri Hastalığı</option>
                                    <option value="ekzama">Ekzama</option>
                                    <option value="akne">Akne</option>
                                    <option value="pigment">Pigment Hastalığı</option>
                                    <option value="benign">İyi Huylu Tümör</option>
                                    <option value="malign">Kötü Huylu Tümör</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleFormControlTextarea1">Not: </label>
                                    <textarea class="form-control" id="desc" name="desc" rows="6"></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <input type="submit" class="btn btn-block btn-outline-dark" value="Kaydet">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    const Do = Swal.mixin({
        // toast: true,
        // position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
        // dangerMode: true
        type: 'success'
    });

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var _token = $('input[name="_token"]').val();
        $('#saveexpert').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                console.log(formData) 
                $.ajax({
                    type:'POST',
                    url: "{{ route('saveExpert')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data == 200){
                            this.reset();
                            $('#view').attr('src', 'img/blank_image.png');
                            Do.fire({ icon: 'success', title: 'Uzman Görüşü Başarılı Bir Şekilde Kaydedildi. Teşekkürler' })
                            // console.log(data)
                        }
                        else
                            Do.fire({ icon: 'error', title: 'Bir hata yaşandı!' })
                        
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
        });

        
        $("#image").change(function(e) {
            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#view').attr('src', reader.result);
                    //$('#view').html('<img src="' +reader.result+ '" id="img-inside-small"/>');
                }
                reader.readAsDataURL(file);        }
        });
        

    })
</script>
