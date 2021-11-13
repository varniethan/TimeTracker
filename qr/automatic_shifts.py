import decimal

from database_connector import cnx
import operator
from priority_queue import PQueue

#Saving the connection in cursor variable
cursor = cnx.cursor()

class NoSolution(Exception):
    pass

# make Branch_Shifts as object
class OrganisationShifts(PQueue):
    def __init__(self, organisation_id, shift_id):
        self.__organisation_id = organisation_id
        self.__shift_id = shift_id
        cursor.execute("SELECT number_of_employees_needed FROM organisation_shifts WHERE id={}".format(shift_id))
        record = cursor.fetchone()
        cnx.commit()
        self.__no_of_employees_needed = record[0]
        self.__available_employees =  self.__getAvailbleEmployees()
        self.__q = PQueue(len(self.__available_employees))
        self.__shift_emp_list = []


    def __getAvailbleEmployees(self):
        # List of availble employees
        available_employees = []
        # Get the workes which have that shift time available
        cursor.execute("SELECT employee_id FROM employee_shifts WHERE organisation_shift_id={}".format(self.__shift_id))
        record = cursor.fetchall()
        cnx.commit()
        for row in record:
            # print(row[0])
            available_employees.append(row[0])
        return available_employees

    def __createEmployeeObjects(self):
        available_employees = self.__getAvailbleEmployees()
        employee_obj = []
        for employee in available_employees:
            # print(employee)
            emp_id = employee
            cursor.execute("SELECT contracted_hours FROM users WHERE id={}".format(employee))
            record = cursor.fetchone()
            cnx.commit()
            contracted_hours = record[0]
            # print(contracted_hours)
            cursor.execute("SELECT SUM(ABS(TIMESTAMPDIFF(SECOND, clock_in, clock_out))) AS worked_hours FROM shifts WHERE YEARWEEK(date) = YEARWEEK(NOW()) and user_id={}".format(employee))
            record = cursor.fetchall()
            cnx.commit()
            worked_hours = record[0][0]
            if worked_hours != None:
                ratio = (float(worked_hours) / (contracted_hours*3600))*100
            else:
                ratio = 0
            cursor.execute("SELECT branches.name FROM branches, branch_users WHERE branches.id = branch_users.branch_id and user_id={}".format(employee))
            record = cursor.fetchone()
            cnx.commit()
            branch_name = record
            d = Employee(employee, branch_name, contracted_hours, worked_hours, ratio)
            employee_obj.append(d)
            self.__q.add(d, ratio)
            # print(self.__q.status())
        return employee_obj

    def getStaffsForShift(self):
        # employees, overtime_employees = self.removeOvertimeEmployees()
        self.__createEmployeeObjects()
        employee_selected = []
        for i in range(len(self.__available_employees)):
            employee_selected.append(self.__q.remove().id)
        return employee_selected

# make Employee as object
class Employee:
    def __init__(self, id, branch_name, contracted_hours, worked_hours, ratio):
        self.id = id
        self.__branch_name = branch_name
        self.__contracted_hours = contracted_hours
        self.__worked_hours = worked_hours
        self.__ratio = ratio

    def getData(self):
        print("Getting Object Values")
        print(self.id, end=" and ")
        print(self.contracted_hours, end=" and ")
        print(self.worked_hours)

    @property
    def pctContractedHours(self):
        pct = (self.__worked_hours / (self.__contracted_hours)) * 100

#
# a = OrganisationShifts(11,1)
# print(a.getStaffsForShift())
