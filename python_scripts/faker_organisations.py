from database_connector import cnx
import datetime, random
from faker import Faker
fake_data = Faker()

#Saving the connection in cursor variable
cursor = cnx.cursor()

#Setting up time
now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())

number_of_organisations = int(input("Enter the number of number of organisations that must be created"))
Faker.seed(0)
generated_counter = 1
for _ in range(number_of_organisations):
    id = generated_counter
    name = fake_data.company()
    display_name = fake_data.company()
    sector = fake_data.bs()
    owner = random.randint(0,number_of_organisations)
    email = fake_data.email()
    mobile_number = random.randint(99999999, 9999999999)
    land_number = random.randint(99999999, 9999999999)
    postal_code = fake_data.postcode()
    address_1 = fake_data.building_number()
    address_2 = fake_data.city()
    latitude = fake_data.latitude()
    longitude = fake_data.longitude()
    city = random.randint(0,146156)
    created_by = generated_counter
    created_at = now_time
    print(f"INSERT INTO organisations values ('{id}','{name}','{display_name}','{sector}','{owner}','{email}','{mobile_number}','{land_number}', '{address_1}','{address_2}', '{postal_code}','{latitude}', '{longitude}', '{city}','1','{generated_counter}',NULL,'{now_time}',NULL)")
    cursor.execute(f"INSERT INTO organisations values ('{id}','{name}','{display_name}','{sector}','{owner}','{email}','{mobile_number}','{land_number}', '{address_1}','{address_2}', '{postal_code}','{latitude}', '{longitude}', '{city}', '1','{generated_counter}',NULL,'{now_time}',NULL)")
    cnx.commit()
    generated_counter += 1
cnx.close()
cursor.close()
