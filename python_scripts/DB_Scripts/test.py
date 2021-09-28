import random; import string
from database_connector import cnx
cursor = cnx.cursor()
p="ABCEGHJKLMNPRSTWXYZ"
c = ("".join([random.choice(p),random.choice(p)]+[random.choice(string.digits) for i in range(6)]+[random.choice("ABCD")]))
print(c)
organisation_id = random.randint(1,10)
cursor.execute(f"SELECT id from positions WHERE organisation = '{organisation_id}'")
position_organisation = cursor.fetchone()
while position_organisation == None:
    print('Hi')
    organisation_id = random.randint(1, 10)
    cursor.execute(f"SELECT id from positions WHERE organisation = '{organisation_id}'")
    position_organisation = cursor.fetchone()
position_organisation = int(position_organisation[0])
print(position_organisation)


# print(f"SELECT city from organisations WHERE id = '{position_organisation}'")
# cursor.execute(f"SELECT city from organisations WHERE id = '{int(position_organisation)}'")
# cursor.execute(f"SELECT city from organisations WHERE id = '8'")
# city = cursor.fetchone()
# print(int(city[0]))



