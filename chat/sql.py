import MySQLdb
import sys
def page(channel):
    
   print '<div class ="col-sm-6 col-md-6 hp-featured-item pnone">'
   print '<div class="hp-fi-cover-img cubic-trans" style="background-image:url(div.jpg);">'
   print '</div>'

   print '<div class="hp-fi-cover cubic-trans">'
   print '</div>'

   print '<div class="hp-fi-desc">'
   print '<form method="POST" action="chatdup.php">'
   print '<input value="'+channel+'" type="hidden" name="search2">'
   print '<h3>'+channel+'</h3>'
            
   print '<input type="submit" class="hp-item-btn cubic-trans" value="Join">'
   print '</form>'
   print '</div>'
   print '</div>'
def dist(word1,word2):
    len1 = len(word1)
    len2 = len(word2)
    a = [[0 for x in range(len2+1)] for y in range(len1+1)]

    for i in range(0,len1+1):

        a[i][0]=i
    for j in range(0,len2+1):

        a[0][j]=j
    for i in range (1,len1+1):

        for j in range(1,len2+1):

            if word1[i-1]==word2[j-1]:
                a[i][j] = a[i-1][j-1] 

            else :
                a[i][j] = min(a[i][j-1],a[i-1][j],a[i-1][j-1])+1
#    for i in range(0,len1+1):
 #       for j in range(0,len2+1):
  #          sys.stdout.write(str(a[i][j])+" ")
  #  print "\n"

    return a[i][j]

db = MySQLdb.connect("localhost","root","spiderman","project")
cursor = db.cursor()
cursor.execute("SELECT * from channels")
data = cursor.fetchall()
channels = []
for a in data:
    channels.append(a[1])
rank_channel = [[0,i] for i in range(len(channels))]
input_word = "sopt"
count = 0
for channel in channels:
    rank_channel[count][0] = dist(channel,input_word)
    count = count+1
	
