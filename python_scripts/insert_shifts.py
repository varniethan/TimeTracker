from database_connector import cnx
import datetime,holidays, random

#Saving the connection in cursor variable
cursor = cnx.cursor()

now = datetime.datetime.now().replace(microsecond=0) #Milliseconds since the epoch time
print(now)
uk_holidays = holidays.UnitedKingdom()
#print('2021-01-01' in uk_holidays)

start_date = datetime.datetime(2018, 1, 1) #Data starting date - i.e. 1st January 2021
start_ts = int(start_date.timestamp()) #Converting the data starting date to time stamp so that it can be compared with the current time stamp
print(start_ts)
end_ts = int(datetime.datetime.now().timestamp()) #Data end time - i.e. toady: 8th July 2021
shift_date_ts = start_ts #Starting time from epoch time

generated_count = 0 #To count the number of dates generated

user_id = int(input("Enter your User ID for shifts:"))
branch_id = int(input("Enter the branch id"))
job_code = int(input("Enter the job_code: 0 = No job code specified"))
work_at_weekend = int(input("Are the shifts available at the weekends? - 1 = Yes and 0 = No"))
work_at_public_holidays = int(input("Are the shifts available at the public holidays? - 1 = Yes and 0 = No"))
clock_in_time = int(input("Enter usual clock in time")) #09:00:00
clock_in_difference = int(input("Enter the number of mins the clock in time can be varied from a sheduled time"))
clock_out_time = int(input("Enter usual clock out time")) #05:00:00
clock_out_difference = int(input("Enter the number of mins the clock out time can be varied from a sheduled time"))
absentee_rate = float(input("Enter a absentee rate %:"))



while shift_date_ts < end_ts: #From 1st Jan 2018 to today
    shift_date = datetime.datetime.fromtimestamp(shift_date_ts) #return a Timestamp object when passed an integer which represents the timestamp value

    sheduled_clock_in_time = datetime.datetime(shift_date.year, shift_date.month, shift_date.day, 9, 00, 00)
    minutes_to_add = random.uniform(-clock_in_difference, clock_in_difference)
    real_clock_in_time = sheduled_clock_in_time + datetime.timedelta(minutes=minutes_to_add)
    real_clock_in_time = real_clock_in_time.replace(microsecond=0)

    sheduled_clock_out_time = datetime.datetime(shift_date.year, shift_date.month, shift_date.day, 5, 00, 00)
    minutes_to_add = random.uniform(-clock_out_difference, clock_out_difference)
    real_clock_out_time = sheduled_clock_out_time + datetime.timedelta(minutes=minutes_to_add)
    real_clock_out_time = real_clock_out_time.replace(microsecond=0)

    if shift_date.weekday() < 5 and shift_date not in uk_holidays and random.randint(1,100) > absentee_rate:
        #Executing the query
        print(f"INSERT INTO shifts values (NULL,{user_id},{branch_id},NULL,'{shift_date.year}/{shift_date.month:02}/{shift_date.day:02}','{sheduled_clock_in_time.time()}', '{sheduled_clock_out_time.time()}', '{real_clock_in_time.time()}', '{real_clock_out_time.time()}', '1', '{user_id}', '{user_id}', '{now}', 'NULL')")
        cursor.execute(f"INSERT INTO shifts values (NULL,{user_id},{branch_id},NULL,'{shift_date.year}/{shift_date.month:02}/{shift_date.day:02}','{sheduled_clock_in_time.time()}', '{sheduled_clock_out_time.time()}', '{real_clock_in_time.time()}', '{real_clock_out_time.time()}', '1', '{user_id}', '{user_id}', '{now}', '{now}')")
        # print(f"INSERT INTO test_time_data values (NULL,{user_id},{branch_id},NULL,'{shift_date.year}/{shift_date.month:02}/{shift_date.day:02}',{sheduled_clock_in_time.time()}, {sheduled_clock_out_time.time()}, {real_clock_in_time.time()}, {real_clock_out_time.time()}, '1', {user_id}, {user_id}, {now}, {now})")
        #Commiting the current transaction
        cnx.commit()
        generated_count += 1
    shift_date = shift_date + datetime.timedelta(days=1) #Increasing the day count by one
    shift_date_ts = shift_date.timestamp() #Converting back to time stamp to compare and do calculations

cnx.close()
cursor.close()
print(f"Dates generated: {generated_count}")
