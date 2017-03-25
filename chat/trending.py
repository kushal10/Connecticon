import MySQLdb
import sys
import datetime
db = MySQLdb.connect("localhost","root","spiderman","project")
cursor = db.cursor()
cursor.execute("SELECT channel from channels")
data = cursor.fetchall()
nowtime = datetime.datetime.now()
channelclicks = [0 for i in range(0,len(data))]
j =0
for channel in data:
    
    query = "SELECT post_time from "+channel[0];
    try:
        cursor.execute(query)
        times = cursor.fetchall()
        for i in times:
             y = i[0];
             if(nowtime.date()-y.date() < datetime.timedelta(2)):
                 channelclicks[j] += 1
    except:
        flag = 1
    j = j+1
maxchannel = 0
printed = []
for i in range (0,5):
    maxi = -1
    for j in range (0,len(channelclicks)):

        if(channelclicks[j] > 0 and channelclicks[j] > maxi and printed.count(j) < 1):
            maxi = channelclicks[j]
            maxchannel = j
    if(maxi > 0):
        print data[maxchannel][0]
        printed.append(maxchannel)
