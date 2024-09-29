import mysql.connector

def conn():
    connectMysql = mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='lifePoint'
    )

    if connectMysql.is_connected():
        print("Successful database connection...")
        return connectMysql
    else:
        print("Unable to connect to the database...")