
# Prevelansı Yüksek Deri Hastalıklarının Derin Öğrenme ile Sınıflandırılması ve Web Uygulamsı

Bu proje 2023 Tübitak 2204-A Liselerarası Proje Yarışmasında Türkiye 2.liği ödülünü almıştır. Proje **Eskişehir Türk Telekom Mesleki ve Teknik Anadolu Lisesi** Öğrencileri ***Enes Bostan, Defne Çal ve Irmak Derici*** tarafından hazırlanmıştır. Projede öneclikle derin öğrenme modellerinden EfficientNet B0-B7 arasındaki 8 model ile eğitim gerçekleştirilmiş ve başarım düzeyi en yüksek olan B7 modeli bir web uygulamasına entegre edilerek kullanılabilir bir yapay zeka uygulaması geliştirilmiştir. Proje Bursa bölgesinde Yazılım dalında bölge birinciliği kazanmış ve 5-9 Haziran 2023 tarihlerinde Ankara'da gerçekleştirilen Türkiye finallerinde 2. lik ödülünü almaya hak kazanmıştır. 


## Özet 
Deri hastalıkları insanların dış görünüşleri ile yakından ilgili olduğundan psikolojik durumlarını ve sosyal ilişkilerini olumsuz etkileyebilmektedir. Deri hastalıklarının en tehlikelisi olarak görülen kötü huylu deri tümörleri ise kanser hastalıkları içinde en çok görülen kanser türlerinin başında gelmektedir. Medikal deri görüntülerinden deri hastalıklarının sınıflandırılarak bir ön teşhis gerçekleştirilmesi uzman hekimlerin iş yükünü azaltabilmekte, zamandan ve sağlık harcamalarından tasarruf sağlayabilmektedir. Ayrıca yapay zeka destekli bilgisayarla görü sistemleri ile deri kanserinin erken teşhisi açısından hastalar için uyarı mekanizması sağlanabilir. Bu çalışmada derin öğrenme algoritmalarından Evrişimli Sinir Ağları kullanılarak anormal lezyonlara sahip deri görüntülerinden hastalık teşhisi gerçekleştirebilen bir model geliştirilmesi ve web tabanlı bir uygulama ile entegre edilmesi amaçlanmıştır. Çalışmada açık kaynaklı yayınlanan DermNet, Dermatology Atlas ve Kaggle veri tabanlarında bulunan infeksiyöz deri hastalıkları, ekzama, akne, pigment hastalıkları, iyi ve kötü huylu tümör olmak üzere 6 farklı deri hastalığına ait 38.760 adet görsel kullanılmıştır. EfficientNet-B7 modeli ile transfer öğrenme metodolojisi kullanılarak geliştirilen derin öğrenme modelinin eğitim, test ve doğrulama aşamalarında kullanmak amacıyla veri seti 0.80:0.10:0.10 oranında bölünmüştür. Aşırı öğrenme probleminin önüne geçilmesi için veri artırma, erken durdurma ve öğrenme oranı azaltma teknikleri kullanılmıştır. Geliştirilen model 6 farklı deri hastalığı için %82 oranında doğru sınıflandırma yapmaktadır. Çalışmanın sonuçlarına göre pigmente bağlı deri hastalıkları için modele aktarılan veri miktarının yetersiz olmasından dolayı bu hastalığa ait tahmin başarımının diğerlerine göre düşük olduğu görülmüştür. Model, geliştirilen web tabanlı uygulama ile entegre edilerek hastalık teşhisi yapan somut bir ürün haline getirilmiştir.

## Kullanılan Teknolojiler
* Projenin model geliştirme aşaması Kaggle platformunda Tesla P100 grafik kartına sahip sunucularda TensorFlow ve Keras kütüphaneleri kullanılarak gerçekleştirilmiştir.

* Geliştirilen model kaydedilerek dışarı aktarılmış ve sonrasında web uygulamasına entegrasyonu sağlanmıştır. 

* Web uygulaması Laravel 8 Framework'ü kullanılarak geliştirilmiştir.

* Kullanıcıdan alınan jpg formatın resim dosyası sunucu üzerine kaydedilmekte ve Flask API'ına tahmin için HTTP isteğinde bulunulmaktadır. 

* Flask ile geliştirilen tahmin API'ı yanıt olarak 6 hastalık için yüzdesel tahmin sonuçlarını döndürmektedir.

* PHP dönen tahmin sonucunu önyüze aktarmaktadır.

* Önyüzde alınan tahmin sonuçları JavaScript ile büyükten küçüğe doğru sıralanarak kullanıcıya sonuç olarak gösterilmektedir.

* Ayrıca uzman veri girişine imkan sağlanmaktadır, bu ekranda uzman hekimlerin teşhis koydukları görseller veri tabanına kaydedilmekte böylelikle veri setinin gelişimine katkı sağlanması amaçlanmaktadır.


## Veri Seti
Projede kullanılan veri setine buradan ulaşabilirsiniz: [Veri Seti](https://www.kaggle.com/datasets/ascanipek/skin-diseases)


# Uygulama

Projenin Web Uygulamasına buradan ulaşabilirsiniz: [Uygulamanın Yayında Olan Versiyonu](http://34.118.27.46/)

# REST API

3 . Parti Uygulamalarda kullanılmak üzere geliştirilen API'a ait HTTP istek türleri

## API EndPoint Listesi

### 1. Resim Dosyası ile Tahmin (predictWithImage)
#### Request (İstek)

`POST /api/predict-with-image/`

    const data = new FormData();
    data.append("image", "../IMG_4895_2.jpg");

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            console.log(this.responseText);
        }
    });

    xhr.open("POST", "http://34.118.92.185/api/predict-with-image");
    xhr.setRequestHeader("Authorization", "Bearer ...");

    xhr.send(data);

#### Response (Yanıt)

    {
        "image": "..\/img\/preds\/api_date_25-05-2023_21-17-01-559948419.jpg",
        "predicts": {
            "İnfeksiyöz Deri Hastalığı": 0.8316075801849365,
            "Ekzama": 0.0025978132616728544,
            "Akne": 0.0003459408471826464,
            "Pigmente Bağlı Deri Hastalığı": 0.0003996501909568906,
            "İyi Huylu Deri Tümörü": 0.16152003407478333,
            "Kötü Huylu Deri Tümörü": 0.003528905799612403
        }
    }

### 2. Base64 Veri ile Tahmin (predictBase64)
#### Request (İstek)

`POST /api/predict-base64/`

const data = new FormData();
data.append("image", "data:image/jpeg;base64,...");

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "http://34.118.92.185/api/predict-base64");
xhr.setRequestHeader("Accept", "application/json");
xhr.setRequestHeader("Authorization", "Bearer ...");

xhr.send(data);

#### Response (Yanıt)

    {
        "image": "..\/img\/preds\/api_base64_date_25-05-2023_22-29-19-391309081.jpeg",
        "predicts": {
            "İnfeksiyöz Deri Hastalığı": 0.8316075801849365,
            "Ekzama": 0.0025978132616728544,
            "Akne": 0.0003459408471826464,
            "Pigmente Bağlı Deri Hastalığı": 0.0003996501909568906,
            "İyi Huylu Deri Tümörü": 0.16152003407478333,
            "Kötü Huylu Deri Tümörü": 0.003528905799612403
        }
    }




