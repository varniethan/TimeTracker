import decimal

from database_connector import cnx
import operator

#Saving the connection in cursor variable
cursor = cnx.cursor()

class NoSolution(Exception):
    pass

# make Branch_Shifts as object
class OrganisationShifts:
    def __init__(self, organisation_id, shift_id):
        self.organisation_id = organisation_id
        self.shift_id = shift_id
        cursor.execute("SELECT number_of_employees_needed FROM organisation_shifts WHERE organisation_id={}".format(organisation_id))
        record = cursor.fetchone()
        cnx.commit()
        self.no_of_employees_needed = record[0]

    def getAvailbleEmployees(self):
        # List of availble employees
        available_employees = []
        # Get the workes which have that shift time available
        cursor.execute("SELECT employee_id FROM employee_shifts WHERE organisation_shift_id={}".format(self.shift_id))
        record = cursor.fetchall()
        cnx.commit()
        for row in record:
            # print(row[0])
            available_employees.append(row[0])
        return available_employees

    def createEmployeeObjects(self):
        available_employees = self.getAvailbleEmployees()
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
            # print(emp_id)
            # print(worked_hours)
            # print(contracted_hours*3600)
            if worked_hours != None:
                ratio = (float(worked_hours) / (contracted_hours*3600))*100
            else:
                ratio = 0
            cursor.execute("SELECT branches.name FROM branches, branch_users WHERE branches.id = branch_users.branch_id and user_id={}".format(employee))
            record = cursor.fetchone()
            cnx.commit()
            branch_name = record
            employee_obj.append(Employee(employee, branch_name, contracted_hours, worked_hours, ratio))
        # print(employee_obj[4].worked_hours)
        return employee_obj

    def removeOvertimeEmployees(self):
        employees = self.createEmployeeObjects()
        overtime_employee_obj = []
        for index, employee in enumerate(employees):
            # print(employee.id)
            if (employee.worked_hours and employee.contracted_hours != None):
                if ((decimal.Decimal(employee.contracted_hours * 3600) - (employee.worked_hours)) < 0):
                    # print("Found a overtime")
                    overtime_employee_obj.append(employees.pop(index))
        return employees,overtime_employee_obj

    # Highest contracted hours first
    def orderByContractHours(self, employees):
        sorted_employees = sorted(employees, key=operator.attrgetter("ratio"))
        return sorted_employees

    # Least Overtime hours first
    def orderByOvertimeHours(self, overtime_employees):
        sorted_employees = sorted(overtime_employees, key=operator.attrgetter("worked_hours"))
        return sorted_employees

    def getStaffsForShift(self):
        employees, overtime_employees = self.removeOvertimeEmployees()
        shift_employees = []
        no_of_employees_needed = self.no_of_employees_needed
        no_of_employees_filled = 0
        ordered_employees = self.orderByContractHours(employees)
        ordered_overtime_employees = self.orderByOvertimeHours(overtime_employees)
        shift_employees = ordered_employees + ordered_overtime_employees
        shift_employees = shift_employees[:no_of_employees_needed]
        # print(no_of_employees_needed)
        # print(shift_employees)
        # for employee in shift_employees:
        #     print("Hello")
        #     print(employee.id)
        employee_selected = []
        for employee in shift_employees:
            employee_selected.append(employee.id)
        return employee_selected


# make Employee as object
class Employee:
    def __init__(self, id, branch_name, contracted_hours, worked_hours, ratio):
        self.id = id
        self.branch_name = branch_name
        self.contracted_hours = contracted_hours
        self.worked_hours = worked_hours
        self.ratio = ratio

    def getData(self):
        print("Getting Object Values")
        print(self.id, end=" and ")
        print(self.contracted_hours, end=" and ")
        print(self.worked_hours)

    @property
    def pctContractedHours(self):
        pct = (self.worked_hours / self.contracted_hours) * 100


# a = OrganisationShifts(11,1)
# print(a.getStaffsForShift())
