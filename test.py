import psycopg2

connection = psycopg2.connect(
    host= "ec2-174-129-255-46.compute-1.amazonaws.com",
    port="5432",
    dbname="dflv6jh505d9tv",
    user="qajdgcrnucpdpx",
    password="d2144f11fa2bc512c9f5f4d65cef0b1f804fabef86759d786bd6ca430eba6fa8"
    )

cursor = connection.cursor()
cursor.execute("SELECT * FROM aaa")
results = cursor.fetchall()
#row=[]*3
print(results)
connection.commit()
cursor.close()
connection.close()


#ae=[('01','02','03'),('11','12','13'),('21','22','23')]

#for i 
