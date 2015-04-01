import cherrypy
import MySQLdb
import MySQLdb.cursors
import json

cherrypy.server.socket_host='0.0.0.0'
cherrypy.server.socket_port=8000

class testpy:

  def index(self):

# Tell Cherrypy to return JSON Objects


#   create a database connection object (db) to the database
#   tell mysql to return create a "dict" cursor to return results as {} 
#   instead of an array []

    db=MySQLdb.connect(host="websys3.stern.nyu.edu",user="nwhite",passwd="nwhite!!!",db="nwhite", cursorclass=MySQLdb.cursors.DictCursor)

# Create a cursor for the query
    mycurs=db.cursor()
# execute a query
    mycurs.execute("""SELECT * from users""")
# retrieve the results as a dict object so we can pass it to JSON
#  retrieve all the rows at once
    users=mycurs.fetchall()
#  convert to a JSON object string
    answ1 = json.dumps(users)


    cherrypy.response.body= answ1
    cherrypy.response.headers["Content-Type"] = "application/json"
    return answ1

  index.exposed = True

cherrypy.quickstart(testpy())
