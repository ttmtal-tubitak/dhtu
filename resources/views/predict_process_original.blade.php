<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tahmin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.25;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.2}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.225rem}.leading-7{line-height:1.25rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.2rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.2rem;padding-right:1.2rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.2rem;padding-right:1.2rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="display: flex; justify-content: flex-start;">
            <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block" style="margin-left: 15%;">
                <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"  style="text-decoration: none; color: #fff; font-size: 1.3em; margin-right: 1em;">{{ __('auth.home') }}</a>
                <a href="{{ url('/predict') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"  style="border-bottom: 1px solid #ef3d2d; padding-bottom: 7px; text-decoration: none; color: #fff; font-size: 1.3em; margin-right: 1em;">Teşhis Et</a>
                <a href="{{ url('/docs') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"  style="text-decoration: none; color: #fff; font-size: 1.3em; margin-right: 1em;">{{ __('main.documentation') }}</a>
                <a href="{{ url('/abstract') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"  style="text-decoration: none; color: #fff; font-size: 1.3em; margin-right: 1em;">{{ __('main.about') }}</a>
            </div>
            
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('auth.home') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('auth.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('auth.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div class="container" style="color: #e2e8f0; font-size:21px;">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style="font-family: 'Nunito', sans-serif; font-size: 1.2em; color: #ef3c2d; font-weight: 900; justify-content: space-between;">
                    {{ __('main.title') }}
                    <span id="timer" style="display: none; color: white; font-size: 17px; margin-left:10px; margin-top: 13px">
                        <span class="col-3 myclass" id="dakika">00</span>
                        <span class="col-1 myclass">:</span>
                        <span class="col-3 myclass" id="saniye">00</span>
                        <span class="col-1 myclass">:</span>
                        <span class="col-3 myclass" id="salise">00</span>
                    </span>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)" >
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                {{-- <button class="btn btn-light btn-outline-primary" type="button" id="inputGroupFileAddon04">Button</button> --}}
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-block btn-outline-primary">Teşhis Et</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                        
                </div>
                
                <div class="row mt-3" id="loader" style="min-height: 3em; display: none;">
                    <div class="col-12 text-center">
                        <div class="spinner-border text-danger" role="status">
                           
                        </div>
                        {{-- <div class="text-white-50 text-rainbow-animation">Yapay Zeka Tahmini Çalışıyor... Lütfen Bekleyin</div> --}}
                        {{-- <div class=" text-white-50" id="timer">
                            Yapay Zeka Tahmini Çalışıyor... Lütfen Bekleyin
                        </div> --}}
                    </div>
                </div>

                <div class="row mt-3" id="res" style="min-height: 10em; display: none;">
                    <div class="col-lg-4 mb-2" id="imageBox">
                        <img src="/img/preds/melanocytic-nevi-86.jpg" class="img-thumbnail" style="min-width: 100%; min-height: 100%;" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 style="font-size: 1.2em" class="mb-2" id="oneName"></h5>
                                <small style="font-size: 1.2em" id="onePred"></small>
                              </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 style="font-size: 1.2em" class="mb-1" id="twoName"></h5>
                                  <small style="font-size: 1.2em" id="twoPred"></small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 style="font-size: 1.2em" class="mb-1" id="threeName"></h5>
                                  <small style="font-size: 1.2em" id="threePred"></small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 style="font-size: 1.2em" class="mb-1" id="fourName"></h5>
                                  <small style="font-size: 1.2em" id="fourPred"></small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 style="font-size: 1.2em" class="mb-1" id="fiveName"></h5>
                                  <small style="font-size: 1.2em" id="fivePred"></small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 style="font-size: 1.2em" class="mb-1" id="sixName"></h5>
                                  <small style="font-size: 1.2em" id="sixPred"></small>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>
<style>
    .text-rainbow-animation {
        font-family:'Nunito', sans-serif;
        font-size:25px;
        background-image: 
            linear-gradient(to right, rgb(255, 255, 255),rgb(96, 96, 96), rgb(246, 73, 73), rgb(255, 255, 255)); 
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;  
        animation: rainbow-animation 35s linear infinite;
    }

    @keyframes rainbow-animation {
        to {
            background-position: 4500vh;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    let saliseEkran = document.querySelector('#salise')
    let saniyeEkran = document.querySelector('#saniye')
    let dakikaEkran = document.querySelector('#dakika')
    let what = 0
    let salise = 00, saniye = 00, dakika = 00
    let sayac
    function start(){
        saliseEkran.innerHTML = '00';
        saniyeEkran.innerHTML = '00';
        dakikaEkran.innerHTML = '00';
        salise = 0;
        saniye = 0; 
        dakika = 0;
        sayac = setInterval(function(){
        salise++
        if(salise == 60){
            salise = 00
            saniye++
            if(saniye == 60){
                saniye = 00
                dakika++
                dakikaEkran.innerHTML = dakika < 10 ? ('0' + dakika) : dakika
            }
            saniyeEkran.innerHTML = saniye < 10 ? ('0' + saniye) : saniye
        }
        saliseEkran.innerHTML = salise < 10 ? ('0' + salise) : salise
        }, 16.6666666666666667)   
    }

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var _token = $('input[name="_token"]').val();

        $('#image').change(function(){
            let reader = new FileReader();
            // reader.onload = (e) => { 
            //     $('#preview-image-before-upload').attr('src', e.target.result); 
            // }
            reader.readAsDataURL(this.files[0]); 
        });

        $('#image-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('predictRunNew')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#loader').css('display', 'block');
                    $('#timer').css('display', 'block');
                    $('#res').css('display', 'none'); 
                    start();
                },
                success: (datas) => {
                    clearInterval(sayac)
                    this.reset();
                    $('#loader').css('display', 'none');
                    console.log(datas)
                    let data = datas[1];
                    let imgUrl = datas[0];
                    var result = Object.keys(data).map((key) => parseFloat(data[key]));
                    console.log(result)
                    var len = result.length;
                    var indices = new Array(len);
                    for (var i = 0; i < len; ++i) indices[i] = i;
                    indices.sort(function (a, b) { return result[a] < result[b] ? -1 : result[a] > result[b] ? 1 : 0; });
                    
                    result[0] = Number(result[0]).toFixed(5)
                    result[1] = Number(result[1]).toFixed(5)
                    result[2] = Number(result[2]).toFixed(5)
                    result[3] = Number(result[3]).toFixed(5)
                    result[4] = Number(result[4]).toFixed(5)
                    result[5] = Number(result[5]).toFixed(5)
                    
                    result.sort();
                    result.reverse();
                    indices.reverse();
                    for(let i=0; i<=5 ; i++){
                        if(indices[i] == 0) indices[i] = "İnfeksiyöz Deri Hastalığı"
                        else if(indices[i] == 1) indices[i] = "Ekzama"
                        else if(indices[i] == 2) indices[i] = "Akne"
                        else if(indices[i] == 3) indices[i] = "Pigmente Bağlı Deri Hastalığı"
                        else if(indices[i] == 4) indices[i] = "İyi Huylu Deri Tümörü"
                        else if(indices[i] == 5) indices[i] = "Kötü Huylu Deri Tümörü"
                    }
                    
                    

                    $('#oneName').html(`${indices[0]}`)
                    $('#onePred').html(`% ${Number(result[0]).toFixed(2) * 100}`)

                    $('#twoName').html(`${indices[1]}`)
                    $('#twoPred').html(`% ${Number(result[1]).toFixed(2) * 100}`)

                    $('#threeName').html(`${indices[2]}`)
                    $('#threePred').html(`% ${Number(result[2]).toFixed(2) * 100}`)

                    $('#fourName').html(`${indices[3]}`)
                    $('#fourPred').html(`% ${Number(result[3]).toFixed(2) * 100}`)
                    
                    $('#fiveName').html(`${indices[4]}`)
                    $('#fivePred').html(`% ${Number(result[4]).toFixed(2) * 100}`)

                    $('#sixName').html(`${indices[5]}`)
                    $('#sixPred').html(`% ${Number(result[5]).toFixed(2) * 100}`)

                    $('#imageBox').html('');
                    $('#imageBox').html(`<img src="${imgUrl}" class="img-thumbnail" style="min-width: 100%; min-height: 100%;">`);
                    $('#res').css('display', 'flex'); 

                    // console.log(indices);
                    // console.log(result);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });



        // SHELL TEST
        $(document).on('click', '#check', function(){ 
            $.ajax({
                url:"{{ route('predictRun') }}",
                method:"POST",
                data:{
                    _token:_token
                },
                beforeSend: function() {
                    $('#loader').css('display', 'block');
                },
                success:function(data){
                    $('#loader').css('display', 'none');
                    var result = Object.keys(data).map((key) => parseFloat(data[key]));
                    console.log(result)
                    var len = result.length;
                    var indices = new Array(len);
                    for (var i = 0; i < len; ++i) indices[i] = i;
                    indices.sort(function (a, b) { return result[a] < result[b] ? -1 : result[a] > result[b] ? 1 : 0; });
                    
                    result[0] = Number(result[0]).toFixed(5)
                    result[1] = Number(result[1]).toFixed(5)
                    result[2] = Number(result[2]).toFixed(5)
                    result[3] = Number(result[3]).toFixed(5)
                    result[4] = Number(result[4]).toFixed(5)
                    result[5] = Number(result[5]).toFixed(5)
                    
                    result.sort();
                    result.reverse();
                    indices.reverse();
                    for(let i=0; i<=5 ; i++){
                        if(indices[i] == 0) indices[i] = "İnfeksiyöz Deri Hastalığı"
                        else if(indices[i] == 1) indices[i] = "Ekzama"
                        else if(indices[i] == 2) indices[i] = "Akne"
                        else if(indices[i] == 3) indices[i] = "Pigment"
                        else if(indices[i] == 4) indices[i] = "İyi Huylu Deri Tümörü"
                        else if(indices[i] == 5) indices[i] = "Kötü Huylu Deri Tümörü"
                    }
                    
                    

                    $('#oneName').html(`${indices[0]}`)
                    $('#onePred').html(`% ${Number(result[0]) * 100}`)

                    $('#twoName').html(`${indices[1]}`)
                    $('#twoPred').html(`% ${Number(result[1]) * 100}`)

                    $('#threeName').html(`${indices[2]}`)
                    $('#threePred').html(`% ${Number(result[2]) * 100}`)

                    $('#fourName').html(`${indices[3]}`)
                    $('#fourPred').html(`% ${Number(result[3]) * 100}`)
                    
                    $('#fiveName').html(`${indices[4]}`)
                    $('#fivePred').html(`% ${Number(result[4])* 100}`)

                    $('#sixName').html(`${indices[5]}`)
                    $('#sixPred').html(`% ${Number(result[5])* 100}`)

                    $('#res').css('display', 'flex'); 

                    console.log(indices);
                    console.log(result);
                    
                    
                    // $('#res').html(data)
                }
            });
        });

    })
</script>



</html>

