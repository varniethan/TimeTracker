import datetime, random

now_time = datetime.datetime.now().replace(microsecond=0)
print(now_time.time())
# a = -15
# b = 15
# minutes_to_add = random.uniform(a,b)
# datetime_new = now_time + datetime.timedelta(minutes=minutes_to_add)
#
# print(f"After adding mins {datetime_new}")

# start_date = datetime.datetime(2018, 1, 1) #Data starting date - i.e. 1st January 2021
# print(start_date)
# start_ts = int(start_date.timestamp()) #Converting the data starting date to time stamp so that it can be compared with the current time stamp
# shift_date_ts = start_ts
# shift_date = datetime.datetime.fromtimestamp(shift_date_ts) #return a Timestamp object when passed an integer which represents the timestamp value
# shift_date = shift_date + datetime.timedelta(minutes=45) #Increasing the day count by one
# shift_date_ts = shift_date.timestamp() #Converting back to time stamp to compare and do calculations
# print(shift_date.time())
#
# obj_time = datetime.datetime(shift_date.year,shift_date.month,shift_date.day, 9,0,50)
# obj_time = obj_time + datetime.timedelta(minutes=13)
# print(obj_time.time())



# now = datetime.datetime.now()
#
# start_date = datetime.datetime(2018, 1, 1)
# start_ts = int(start_date.timestamp())
# end_ts = int(datetime.datetime.now().timestamp())
#
# shift_date_ts = start_ts
#
# generated_count = 0
#
# user_id = input("Enter UserID for shifts: ")
# clock_in_time = int(input("Enter usual clock-in time: "))
# clock_out_time = int(input("Enter usual clock-out time: "))
# absentee_rate = float(input("Enter a absentee rate %: "))
#
#
# while shift_date_ts < end_ts:
#
#     shift_date = datetime.datetime.fromtimestamp(shift_date_ts)
#
#     if shift_date.weekday() < 5 and random.randint(1,100) > absentee_rate:
#         print(f"INSER INTO shifts ('user_id', 'date', 'clock_in', 'clock_out') VALUES({user_id},'{shift_date.year}/{shift_date.month:02}/{shift_date.day:02}','{clock_in_time}','{clock_out_time}');")
#         generated_count += 1
#
#     shift_date = shift_date + datetime.timedelta(days=1)
#     shift_date_ts = shift_date.timestamp()
#
#
# print(f"Dates generated: {generated_count}")
