# from database_connector import get_db
from database_connector import cnx
import abc, datetime
import qrcode
import cv2
import secrets

#Saving the connection in cursor variable
cursor = cnx.cursor()
class TimeTrackerDB(abc.ABC):
    @abc.abstractmethod
    def create(self):
        pass

    @abc.abstractmethod
    def update(self):
        pass

    @abc.abstractmethod
    def read(self):
        pass

    @staticmethod
    @abc.abstractmethod
    def logout(self):
        pass

class CodeNotFound(Exception):
    pass

class UserPermissionError(Exception):
    pass


class UserActionError(Exception):
    pass


class UserAuthenticationError(Exception):
    pass


class QrCode(TimeTrackerDB):
    def __init__(self,cnx, branch_id):
        self.__cnx = cnx
        self.__branch_id = branch_id

    def create(self):
        cursor.execute('SELECT * FROM branches WHERE branch_id=%s', (self.__branch_id))
        record = cursor.fetchone()
        self.__qrToken = record['qr_token']
        img = qrcode.make(self.__qrToken)
        img.save("full_shifts_qr.jpg")

    def read(self):
        qrToken_decoded = cv2.QRCodeDetector
        val, points, straight_qrcode = qrToken_decoded.detectAndDecode(cv2.imread("qr_token"))
        print(val)

    def update(self):
        qr_token = secrets.token_hex(16)


