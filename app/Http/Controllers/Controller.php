<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Exception;
use Image;
Use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function predict(Request $request){
        if($request->ajax()){ 
            if($request->hasFile('image') == 1){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpg|max:2048'
                ]);
                if($validation->passes()){
                    $file = $request->file('image');
                    $new_name = 'date_' . Carbon::now()->format('d-m-Y_H-i-s-') . rand() . '.' . $file->getClientOriginalExtension();
                    $fileStatus = $file->move(public_path('img/preds'), $new_name);
                    // file kaydedildi mi kontrolü yapılabilir !!!
                    $fileUrl = 'img/preds/'. $new_name;
                    $obj = ['imgUrl' => $fileUrl];
                    $process = new Process(['python3',
                        'shell/predict.py', 
                        "'" . json_encode($obj) . "'"
                    ]);
                    $process->setTimeout(300);
                    $process->run();
                    if (!$process->isSuccessful()) {
                        throw new ProcessFailedException($process);
                    }
                    $output = $process->getOutput();
                    $str = explode("step", $output)[1];
                    $str = trim($str);
                    $str = substr($str, 1);
                    $str = substr($str, 0, -1);
                    $preds = explode(' ', $str);
                    $emptyRemoved = array_filter($preds, fn($value) => !is_null($value) && $value !== '');
                    foreach($emptyRemoved as $item)
                        $item = sprintf('%.6f', floatval($item));
                    // Düzenlenmiş sonuçları geri gönder
                    return [$fileUrl, $emptyRemoved];
                }
                else{
                    return 301; // dosya uygun değil
                }

            }
            else{
                $fileUrl = NULL;
                return 302; // image yüklenmemiş
            }
        }
    }

    public function predictNew(Request $request){
        if($request->ajax()){ 
            if($request->hasFile('image') == 1){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpg|max:2048'
                ]);
                if($validation->passes()){
                    $file = $request->file('image');
                    $new_name = 'date_' . Carbon::now()->format('d-m-Y_H-i-s-') . rand() . '.' . $file->getClientOriginalExtension();
                    $fileStatus = $file->move(public_path('img/preds/'), $new_name);
                    // file kaydedildi mi kontrolü yapılabilir !!!
                    $fileUrl = '../img/preds/'. $new_name;
                    // $image = file_get_contents($fileUrl);
                    
                    // $response = Http::post('http://127.0.0.1:5000/predict', [
                    //     'image' => $fileUrl
                    // ]);
                    $response = Http::asForm()->post('http://127.0.0.1:5000/predict', [
                        'input_data' => $fileUrl
                    ]);
                    
                    // $response = Http::asForm()->post('http://127.0.0.1:5000/predict', [
                    //     'image' => $image
                    // ]);
                    // $response = Http::attach(
                    //     'image', file_get_contents($fileUrl), $new_name
                    // )->post('http://127.0.0.1:5000/predict');
                    return [$fileUrl, $response[0]];

                    $str = explode("step", $output)[1];
                    $str = trim($str);
                    $str = substr($str, 1);
                    $str = substr($str, 0, -1);
                    $preds = explode(' ', $str);
                    $emptyRemoved = array_filter($preds, fn($value) => !is_null($value) && $value !== '');
                    foreach($emptyRemoved as $item)
                        $item = sprintf('%.6f', floatval($item));
                    // Düzenlenmiş sonuçları geri gönder
                    return [$fileUrl, $emptyRemoved];
                }
                else{
                    return 301; // dosya uygun değil
                }

            }
            else{
                $fileUrl = NULL;
                return 302; // image yüklenmemiş
            }
        }
    }
    
    public function predictNewV2(Request $request){
        if($request->ajax()){ 
            if($request->hasFile('image') == 1){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpg|max:2048'
                ]);
                if($validation->passes()){
                    $file = $request->file('image');
                    $new_name = 'date_' . Carbon::now()->format('d-m-Y_H-i-s-') . rand() . '.' . $file->getClientOriginalExtension();
                    $fileStatus = $file->move(public_path('img/preds/'), $new_name);
                    // file kaydedildi mi kontrolü yapılabilir !!!
                    $fileUrl = '../img/preds/'. $new_name;

                    $response = Http::asForm()->post('http://127.0.0.1:5000/predict-v2', [
                        'input_data' => $fileUrl
                    ]);
                    
                    return [$fileUrl, $response[0]];

                    $str = explode("step", $output)[1];
                    $str = trim($str);
                    $str = substr($str, 1);
                    $str = substr($str, 0, -1);
                    $preds = explode(' ', $str);
                    $emptyRemoved = array_filter($preds, fn($value) => !is_null($value) && $value !== '');
                    foreach($emptyRemoved as $item)
                        $item = sprintf('%.6f', floatval($item));
                    // Düzenlenmiş sonuçları geri gönder
                    return [$fileUrl, $emptyRemoved];
                }
                else{
                    return 301; // dosya uygun değil
                }

            }
            else{
                $fileUrl = NULL;
                return 302; // image yüklenmemiş
            }
        }
    }
}
