import cv2
import shutil
import os
import sys, json
import tensorflow as tf
from tensorflow import keras
from PIL import Image, ImageOps
import numpy as np

# argv = sys.argv
# Argv = json.loads(str(argv[1].replace("'", "")))
imgUrl = "./benign-1.jpg"
model = tf.keras.models.load_model('./my_model.h5')
#model.load_weights('./tmp/model-B7.h5')
img_path = Image.open(r"./date_17-04-2023_21-18-48-1796534488.jpg")
size = (224,224)    
image = ImageOps.fit(img_path, size, Image.ANTIALIAS)
image = np.asarray(image)
img = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
#numpy.newaxis is used to increase the dimension of the existing array by one more dimension, when used once. Thus,1D array will become 2D array
img_reshape = img[np.newaxis,...]
res = model.predict(img_reshape)

# img = cv2.imread(img_path)
# # img = cv2.cvtColor(img, cv2.COLOR_RGB2BGR)
# img = cv2.resize(img,(224,224))
# img = img.reshape(1,224,224,3)
# res = model.predict(img)
for i in res:
    print(i)