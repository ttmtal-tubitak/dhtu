from flask import Flask, request, jsonify
import cv2
import shutil
import os
import sys, json
import tensorflow as tf
from tensorflow import keras
from PIL import Image, ImageOps
import numpy as np
import jsonpickle
import joblib
from joblib import Memory
from PIL import Image


app = Flask(__name__)
memory = Memory(location='cache/', verbose=0)
memory = joblib.Memory(location='cache_directory')
def load_model():
    return tf.saved_model.load('model_v2')

cached_load_model = memory.cache(load_model)
loaded_model = cached_load_model()


@app.route('/predict', methods=['POST'])
def predict():
    # Giriş görüntüsünü yükleyin
    img_path = request.form['input_data']
    img = tf.keras.preprocessing.image.load_img(img_path, target_size=(600, 600))
    img_array = tf.keras.preprocessing.image.img_to_array(img)
    img_array = tf.expand_dims(img_array, axis=0)
    img_array = tf.image.convert_image_dtype(img_array, tf.float32)
    # Modeli yükleyin
    infer = loaded_model.signatures['serving_default']
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