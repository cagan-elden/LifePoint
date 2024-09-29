import dbConn
import mysql.connector

conn = dbConn.conn()

if conn:
    cursor = conn.cursor(dictionary=True)

    id=(1,)

    query = "SELECT * FROM user WHERE userId=%s"
    cursor.execute(query,id)
    result = cursor.fetchone()

    print('Username: ', result['username'])

    cursor.close()
    conn.close()