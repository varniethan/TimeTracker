from database_connector import cnx
import datetime, random
from faker import Faker
from faker.providers import date_time
from faker.providers import person
fake_data = Faker()
#Saving the connection in cursor variable
cursor = cnx.cursor()

#Setting up time
now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())

no_of_users = int(input("How many users do you need:"))
organisation_id = int(input("Enter the organisation id:"))
city_id = int(input("Enter the city_id of the user"))
gender = int(input("Gender:"))
maximum_basic_salary = int(input("Maximum Basic Salary:"))
minimum_basic_salary = int(input("Minimum Basic Salary:"))
hourly_rate = int(input("Houry rate"))
Faker.seed(0)
for _ in range(no_of_users):
    user_name = fake_data.user_name()
    password = '1234'
    email = fake_data.email()
    first_name = fake_data.first_name()
    last_name = fake_data.last_name()
    dob = fake_data.date_of_birth(None, 18, 60)
    #Gender
    mobile_number = fake_data.phone_number
    land_number = fake_data.phone_number
    postal_code = fake_data.postcode()
    address_1 = fake_data.building_number()
    address_2 = fake_data.city()
    #city
    ni_number = fake_data.random_number(9, True)
    position_id = random.randint(0,2)
    basic_salary = random.randint(minimum_basic_salary, maximum_basic_salary)
    #Hourly rate
    #Organisation id
    status = 1
    role = 2

    print(f"INSERT INTO users values (NULL,{user_name},{password},{email},{first_name},{last_name},{dob},{gender},{mobile_number},{land_number},{postal_code}, {address_1}, {address_2}, {city_id}, {ni_number},{position_id},{basic_salary},{hourly_rate},{organisation_id},{status},{role},NULL,NULL,NULL,NULL,{now_time.time()},{now_time.time()})")
    print(user_name)
