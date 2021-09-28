#For time trackers use
from database_connector import cnx
import datetime, random, string
from faker import Faker

fake_data = Faker()

#Saving the connection in cursor variable
cursor = cnx.cursor()

#Setting up time
now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())

print("Positions is organisation specific")
number_of_positions = int(input("Enter the number of positions that must be created"))
maximum_basic_salary = int(input("Maximum Basic Salary:"))
minimum_basic_salary = int(input("Minimum Basic Salary:"))
basic_salary = random.randint(minimum_basic_salary, maximum_basic_salary)
over_time = random.randint(0,1)
Faker.seed(0)
generated_counter = 1
counter = 1
for _ in range(number_of_positions):
    id = generated_counter
    name = fake_data.job()
    organisation = random.randint(1,5)
    descriptions = fake_data.job()
    created_by = generated_counter
    if generated_counter > 16:
        print(f"INSERT INTO positions values ('{name}','{organisation}','{descriptions}','1','{basic_salary}','{over_time}','0',NULL,NULL,'{now_time}',NULL)")
        cursor.execute(f"INSERT INTO positions values ('{counter}','{name}','{organisation}','{descriptions}','1','{basic_salary}','{over_time}','0',2,NULL,'{now_time}',NULL)")
        cnx.commit()
        counter += 1
    generated_counter += 1
cnx.close()
cursor.close()
