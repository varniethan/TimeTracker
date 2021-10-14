import json
from flask import Flask, request, render_template, session, redirect, url_for, abort
from database_connector import cnx
import random
import time
from itertools import count
import secrets
import  qrcode
import base64
import io
import sys
from flask_cors import CORS, cross_origin
import automatic_shifts
from simplex import simplex_method
app = Flask(__name__)

#Saving the connection in cursor variable
cursor = cnx.cursor()

app = Flask(__name__)
app.config['CORS_HEADERS'] = 'Content-Type'
cors = CORS(app, resources={r"/workforce": {"origins": "http://localhost:5000"}})


@app.route('/')
def hello_world():
    return 'Hello World!'

@app.route('/login', methods=['GET', 'POST'])
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

@app.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('username', None)
    return redirect((url_for('login')))

@app.route("/qr", methods=['GET', 'POST'])
def qr():
    if request.method == 'GET':
        print("Get request")
        qr_token = secrets.token_hex(8)
        print("The Get QR")
        cursor.execute("UPDATE branches SET qr_token ='{0}' WHERE id={1}".format(qr_token,session['id'])) #TODO: Make secure
        cnx.commit()
        session['qr_token'] = qr_token
        url = "http://localhost/timeTracker/public/qr/" + qr_token
        print(url)
        data = io.BytesIO()
        img = qrcode.make(url)
        img.save(data, "JPEG")
        encoded_img_data = base64.b64encode(data.getvalue())
        return render_template('qr.html', user_id=session['id'], qrcode =encoded_img_data.decode('utf-8'))

    else:  # POST received, so this must be an AJAX call checking the qr code
        print("post method received")
        # get the latest QR for current branch from DB
        cursor.execute("SELECT qr_token FROM branches WHERE id={}".format(session['id']))
        record = cursor.fetchone()
        cnx.commit()
        print(record[0])
        latest_qr_from_DB = record[0]
        print(session['qr_token'], latest_qr_from_DB)

        # Test if latest in DB = what the client thinks is the latest
        if session['qr_token'] == latest_qr_from_DB:
            print("qr_token matches latest in db")
            return json.dumps({'status': 0, 'new_qr': None})
        else:
            print("The QR is changed")
            session['qr_token'] = latest_qr_from_DB
            print(latest_qr_from_DB)
            return json.dumps({'status': 1, 'new_qr': "updated"})


@app.route('/workforce', methods=['POST'])
@cross_origin(origin='localhost',headers=['Content- Type','Authorization'])
def workforce_insight():
    if request.values['auth_token'] == '123456':
        shift_generator = automatic_shifts.OrganisationShifts(request.values['organisation_id'], request.values['shift_id'])
        # shift_generator.getStaffsForShift()
        return json.dumps({
            'staff_list': shift_generator.getStaffsForShift(),
        })
    else:
        return abort(401)

@app.route('/simplex', methods=['POST'])
@cross_origin(origin='localhost',headers=['Content- Type','Authorization'])
def simplex():
    if request.values['auth_token'] == '123456':
        print("Got request")

        filename = 'simplex_input.txt'
        product_1_price = request.values['product_1_price']
        product_2_price = request.values['product_2_price']

        operation_1_product_1_hours = request.values['operation_1_product_1_hours']
        operation_1_product_2_hours = request.values['operation_1_product_2_hours']

        operation_2_product_1_hours = request.values['operation_2_product_1_hours']
        operation_2_product_2_hours = request.values['operation_2_product_2_hours']

        operation_3_product_1_hours = request.values['operation_3_product_1_hours']
        operation_3_product_2_hours = request.values['operation_3_product_2_hours']

        max_operaton_1_hours = request.values['max_operaton_1_hours']
        max_operaton_2_hours = request.values['max_operaton_2_hours']
        max_operaton_3_hours = request.values['max_operaton_3_hours']

        with open(filename, "w") as f:
            f.write('Maximise')
            f.write("\n")
            f.write(f"P = {product_1_price}x1 + {product_2_price}x2")
            f.write("\n")
            f.write('Subject to')
            f.write("\n")
            f.write(f"{operation_1_product_1_hours}x1 + {operation_1_product_2_hours}x2 <= {max_operaton_1_hours}")
            f.write("\n")
            f.write(f"{operation_2_product_1_hours}x1 + {operation_2_product_2_hours}x2 <= {max_operaton_2_hours}")
            f.write("\n")
            f.write(f"{operation_3_product_1_hours}x1 + {operation_3_product_2_hours}x2 <= {max_operaton_3_hours}")
            f.write("\n")
            f.write("-1x1 <= 0")
            f.write("\n")
            f.write("-1x1 <= 0")
        decision = simplex_method()
        return json.dumps({
            'orgID':23,
            'value':42,
            'decision_list': decision,
            'profit':433,
        })
    else:
        return abort(401)


@app.route("/test")
def test():
    cursor.execute("SELECT qr_token FROM branches WHERE id={}".format(session['id']))
    record = cursor.fetchone()
    cnx.commit()
    print(record[0])
    return record[0]

if __name__ == "__main__":
    app.secret_key = "super secret key"
    app.run(debug=True, port=5001)
