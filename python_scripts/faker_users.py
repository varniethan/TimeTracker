from database_connector import cnx
import datetime, random, string
from faker import Faker
from faker.providers import date_time
from faker.providers import person
fake_data = Faker()
#Saving the connection in cursor variable
cursor = cnx.cursor(buffered=True)
p="ABCEGHJKLMNPRSTWXYZ"

#Setting up time
now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())

no_of_users = int(input("How many users do you need:"))

organisation_id = random.randint(1,10)
cursor.execute(f"SELECT id from positions WHERE organisation = '{organisation_id}'")
position_organisation = cursor.fetchone()
while position_organisation == None:
    print('Hi')
    organisation_id = random.randint(1, 10)
    cursor.execute(f"SELECT id from positions WHERE organisation = '{organisation_id}'")
    position_organisation = cursor.fetchone()

position_organisation = int(position_organisation[0])
position_id = position_organisation

cursor.execute(f"SELECT city from organisations WHERE id = '{organisation_id}'")
city_id = cursor.fetchone()
city_id = int(city_id[0])

gender = random.randint(1,2)
maximum_basic_salary = int(input("Maximum Basic Salary:"))
minimum_basic_salary = int(input("Minimum Basic Salary:"))
hourly_rate = int(input("Houry rate"))
Faker.seed(0)
for _ in range(no_of_users):
    user_name = fake_data.user_name()
    password = '$2y$10$jFuZKjk6RCM814bhMFeIeerlqZRtSFCihU5ONUiF.LxYz8PgeGB.m'
    email = fake_data.email()
    first_name = fake_data.first_name()
    last_name = fake_data.last_name()
    dob = fake_data.date_of_birth(None, 18, 60)
    #Gender
    mobile_number = random.randint(99999999,9999999999)
    land_number = random.randint(99999999,9999999999)
    postal_code = fake_data.postcode()
    address_1 = fake_data.building_number()
    address_2 = fake_data.city()
    #city
    ni_number = ("".join([random.choice(p),random.choice(p)]+[random.choice(string.digits) for i in range(6)]+[random.choice("ABCD")]))
    basic_salary = random.randint(minimum_basic_salary, maximum_basic_salary)
    #Hourly rate
    #Organisation id
    status = 1
    role = 2
    print(f"INSERT INTO users values (NULL,'{user_name}','{password}','{email}','{first_name}','{last_name}','{dob}','{gender}','{mobile_number}','{land_number}','{postal_code}', '{address_1}', '{address_2}', '{city_id}', '{ni_number}','{position_id}','{basic_salary}','{hourly_rate}','{organisation_id}','{status}','{role}',NULL,NULL,'{now_time}','{now_time}')")
    cursor.execute(f"INSERT INTO users values (NULL,'{user_name}','{password}','{email}','{first_name}','{last_name}','{dob}','{gender}','{mobile_number}','{land_number}','{postal_code}', '{address_1}', '{address_2}', '{city_id}', '{ni_number}','{position_id}','{role}','{basic_salary}','{hourly_rate}','{organisation_id}','{status}',NULL,NULL,'0',NULL,'{now_time}',NULL)")
    cnx.commit()

cnx.close()
cursor.close()
