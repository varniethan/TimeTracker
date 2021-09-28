import qrcode


img = qrcode.make("google.com")
img.save("full_shifts_qr.jpg")
