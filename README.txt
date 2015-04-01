#
# This directory contains a simple example of a restful like web service
#  It will allow the control of a resource called users, such as one might find in many apps
#
# The entity users has attributes of uid,username, firstname, lastname, email, password, ...
# corresponding to a table of the same name in a database called nwhite
#
# It exposes 4 capabilities in it's restful api
#
# getuser.php  - gets the information about a user, given a uid
# putuser.php -  Replaces/creates all information about a user
# postuser.php  - Updates information about a user
# deluser.php   - Deletes a user

# In all instances any data passed back will be a JSON encoded string
#
# It should easily be adapted to almost any table.

