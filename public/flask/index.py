from flask import Flask, request, jsonify
import cv2
import json
import tensorflow as tf
from tensorflow import keras
import numpy as np
import joblib
from joblib import Memory

app = Flask(__name__)
# memory = Memory(location='cache/', verbose=0)

def load_model():
    return tf.keras.models.load_model('my_model.h5')
def load_model_v2():
    return tf.saved_model.load('model_v2')

memory = joblib.Memory(location='models_cache_dir')

cached_load_model_v1 = memory.cache(load_model)
cached_load_model_v2 = memory.cache(load_model_v2)

model_v1 = cached_load_model_v1()
model_v2 = cached_load_model_v2()

@app.route('/predict', methods=['POST'])
def predict():    
    input_data = request.form['input_data']
    img = cv2.imread(input_data)
    img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
    img = cv2.resize(img,(224,224))
    img = img.reshape(1,224,224,3)    
    res = model_v1.predict(img)
    res.astype(int)
    #Sonucun dönüştürülmesi
    return json.dumps(res.tolist())

@app.route('/predict-v2', methods=['POST'])
def predictv2():
    # Giriş görüntüsünü yükleyin
    img_path = request.form['input_data']
    img = tf.keras.preprocessing.image.load_img(img_path, target_size=(600, 600))
    img_array = tf.keras.preprocessing.image.img_to_array(img)
    img_array = tf.expand_dims(img_array, axis=0)
    img_array = tf.image.convert_image_dtype(img_array, tf.float32)
    # Modeli yükleyin
    infer = model_v2.signatures['serving_default']
    # Tahmin yapın
    result = infer(input_layer=img_array)
    output_layer = result['activation']
    # print(output_layer)
    return json.dumps(output_layer.numpy().tolist()) 

if __name__ == '__main__':
    app.run(debug=True)















# app = flask.Flask(__name__)
# app.config["DEBUG"] = False


# @app.route('/', methods=['GET'])
# def home():
#     return "<h1>dev.to/koraybarkin Flask ile Web API geliştirme</h1><p>Tebrikler ilk Web API'ınızı başarıyla geliştirdiniz!</p>"

# app.run()