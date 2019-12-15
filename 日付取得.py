import datetime

date=datetime.datetime.now()

dy = 'a_%s_%s'%(date.year,date.month)

print(dy)

dd = '%s'%(date.day)
dt = '%s時%s分%s秒'%(date.hour,date.minute,date.second) 
print(dd)
print(type(dd))
print(dt)
print(type(dt))


card_id='1113'
#配列(1次)の番号　→          #0                      #1                       #2
results=[('1111','岡林','収穫'),('1112','岡林','芽かき'),('1113','岡林','その他')]


#例:results[1][0]の中身は「2222」



for i in range(3):                      #配列(1次)を0～3まで全て照合。(2次)は0で固定

    if (results[i][0] == card_id):       #CARDIDと取得している配列の中身が一致した時の処理
        member = results[i][1]          #名前を変数memberに代入
        work   = results[i][2] 
    
#print(member)
#print(work)

dt_now = datetime.datetime.now()
#now = datetime.datetime(year=dt_now.year, month=dt_now.month, day=dt_now.day, hour=dt_now.hour, minute=dt_now.minute-5, second=dt_now.second)#日時を取得
now = datetime.datetime.now()

#td = abs(now - MyCardReader.d1)
#print(td.total_seconds())

print(dt_now)
print(now)
print(type(now))

for i in range(10):
    print(i)
