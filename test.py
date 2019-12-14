import psycopg2

connection = psycopg2.connect(
    host= "ec2-174-129-255-46.compute-1.amazonaws.com",
    port="5432",
    dbname="dflv6jh505d9tv",
    user="qajdgcrnucpdpx",
    password="d2144f11fa2bc512c9f5f4d65cef0b1f804fabef86759d786bd6ca430eba6fa8"
    )
TABNAME='a_2019_12'
ID='9999'
NAME='ば'
AGE='20'

card_id='3332'
cursor = connection.cursor()

cursor.execute("SELECT * FROM sample_member")
results = cursor.fetchall()

for i in range(9):                      #配列(1次)を0～3まで全て照合。(2次)は0で固定

    if (results[i][0] == card_id):       #CARDIDと取得している配列の中身が一致した時の処理
        member = results[i][1]          #名前を変数memberに代入
        work   = results[i][2] 

print(member)
print(work)

connection.commit()
cursor.close()
connection.close()




#ae=[('01','02','03'),('11','12','13'),('21','22','23')]

#for i 
