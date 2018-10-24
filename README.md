# Rest-API

A simple Rest API for SQL sever or mySQL.
<i>&#8226 Please note this is a proof conecpt and by no means should be used publically on a webserver. This rest API, although may work, is not secured enough for me to recommend using it in production. </i>

<b>How Does This Work?</b>

This rest api is built into three parts. 

<b>Part One: Connecting to a database.</b>

The database.php file in the db folder is used to connect to a server (local or remote). The server name, database name and user login are stored here. I highly recommend restricting access to this directory. 

<b>Part Two: The Query.</b>

Next we decide which table we need to use and create a query to retrieve the informatio we want. This is done in the orders.php file located in the objects folder. In this file we have a class that has the table name and variables to hold the fields we'd like to retrieve. It is also in this field take the connection string created in part one and add our query to it as well. The final result will be a statement to connect to the datebase with the given credentials, select the proper table and select desired fields. 

<b>Part Three: Execution</b>

The final part of the rest API is execuction. The first two parts "rest" on the server waiting for execution and the third part, the read.php file located in the read folder does just this. read.php executes the connection, reads through the rows returned and stores this data in an array. The array is then stored in our object, and the output is sent in json format. 
