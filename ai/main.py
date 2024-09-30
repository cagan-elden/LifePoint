import dbConn
from flask import Flask, request

app = Flask(__name__)

@app.route('/http://localhost/lifePoint', methods=['GET', 'POST'])
def backendAi():
    conn = dbConn.conn()

    if conn:
        cursor = conn.cursor(dictionary=True)

        userId = request.cookies.get('user_id')
        id=(userId)

        query = "SELECT * FROM user WHERE userId=%s"
        cursor.execute(query,id)
        result = cursor.fetchone()

        print(result['username'])

        cursor.close()
        conn.close()

if __name__ == '__main__':
    app.run(debug=True)