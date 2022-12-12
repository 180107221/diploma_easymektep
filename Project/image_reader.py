import cv2
import pytesseract
pytesseract.pytesseract.tesseract_cmd=r'C:\Program Files\Tesseract-OCR\tesseract.exe'

img=cv2.imread('img.png')
custom_config = r'-l kaz+rus+eng --oem 3 --psm 6'
text=pytesseract.image_to_string(img, config=custom_config)
print(text)