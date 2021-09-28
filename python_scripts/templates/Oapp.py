from flask import Flask, request, render_template, session, redirect, url_for
import socketio
import random
import time
from itertools import count
import secrets
from database_connector import cnx
import  qrcode
import base64
import io

#Saving the connection in cursor variable
cursor = cnx.cursor()
application = Flask(__name__)
application.secret_key = "super secret key"
sio = socketio.Server()
app = socketio.WSGIApp(sio, static_files={
    '/':'./public/'
})

@application.route('/login', methods=['GET', 'POST'])
def login():
    msg=''
    if request.method=='POST':
        id = request.form['id']
        passcode = request.form['passcode']
        cursor.execute('SELECT * FROM branches WHERE id=%s and passcode=%s', (id, passcode))
        record = cursor.fetchone()
        if record:
            session['loggedin'] = True
            session['id'] = record[0]
            session['qr_token'] = record[3]
            return redirect(url_for('qr'))
        else:
            meg='Incorrect username/password. Try Again'
    return render_template('login.html', msg= msg)

@application.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('username', None)
    return redirect((url_for('login')))


@application.route("/qr")
def qr():
    print("qr invoked")
    print(session['id'])

    cursor.execute("SELECT qr_token FROM branches WHERE id={}".format(session['id'])) #TODO: Make secure
    row = cursor.fetchone()
    url = "http://localhost/timeTracker/public/qr/" + row[0]
    print(url)
    data = io.BytesIO()
    img = qrcode.make(url)
    img.save(data, "JPEG")
    encoded_img_data = base64.b64encode(data.getvalue())
    return render_template('qr.html', user_id=session['id'], qrcode =encoded_img_data.decode('utf-8'))

@sio.event
def connect(sid, environ):
    print(sid, 'connected')

@sio.event
def disconnect(sid):
    print(sid, 'disconnected')


@sio.event
def sum(sid, data):
    print(sid, data)
    result = data['numbers'][0] + data['numbers'][1]
    sio.emit('sum_result', {'result': result}, to=sid)

@sio.event
def send_code(sid):
    # result = session['id']
    # sio.emit('code_result', {'result': result}, to=sid)
    for i in count():
        result = secrets.token_hex(16)
        sio.emit('code_result', {'result': result}, to=sid)
        # print(sid, result)
        time.sleep(10)


if __name__ == '__main__':
    socketio.run(app)
