#For the oorganisations purpouse
from database_connector import cnx
import datetime, random, string
from faker import Faker

fake_data = Faker()

#Saving the connection in cursor variable
cursor = cnx.cursor()

#Setting up time
now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())
roles = ['super_admin','admin', 'employer','MD','branch_manager','shift_manager','employee']
Faker.seed(0)
generated_counter = 1
for i in range(len(roles)):
    id = i
    name = roles[i]
    description = fake_data.job()
    print(f"INSERT INTO roles values ('{id}','{name}','{description}','1','0',NULL,'{now_time}',NULL)")
    cursor.execute(f"INSERT INTO roles values ('{id}','{name}','{description}','1','0',NULL,'{now_time}',NULL)")
    if id == 1:
        change_db = input("Please go and make the role id = 0 for super admin and them press enter to countinue")
    cnx.commit()
    generated_counter += 1
cnx.close()
cursor.close()

print(generated_counter)
