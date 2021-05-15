# API REST EXAMPLE
This is a small rest api application. 

## MAIN SECTIONS (Shifts, Employee(Workers),Employee Shifts,)


### Shift
#### Fetch ALL Records
*	http://subhenoorstore.com/teamway/api/shift/read.php 

#### Fetch Single Record
*	http://subhenoorstore.com/teamway/api/shift/single_read.php/?id=2` 

#### Create Shift
*	http://subhenoorstore.com/teamway/api/shift/create.php/
<pre>
	{
	    "title" : "Shift Title"
	}
</pre>

#### Update Shift
*	http://subhenoorstore.com/teamway/api/shift/update.php/
<pre>
	{
	    "id"	: "2",
	    "title" : "Shift Title"
	}
</pre>

#### Delete Shift
*	http://subhenoorstore.com/teamway/api/shift/delete.php/
<pre>
	{
	    "id"	: "2"
	}
</pre>

### Worker
#### Fetch ALL Records
*	http://subhenoorstore.com/teamway/api/worker/read.php 

#### Fetch Single Record
*	http://subhenoorstore.com/teamway/api/worker/single_read.php/?id=2` 

#### Create Worker
*	http://subhenoorstore.com/teamway/api/worker/create.php/
<pre>
	{
	    "name" : "Worker 01",
	    "email" : "worker@omar.com",
	    "age" : "20",
	    "designation" : "Packer"
	}
</pre>

#### Update Worker
*	http://subhenoorstore.com/teamway/api/worker/update.php/
<pre>
	{
	    "id"   : "3",
	    "name" : "Worker 03",
	    "email" : "worker@omar.com",
	    "age" : "20",
	    "designation" : "Packer"
	}
</pre>

#### Delete Shift
*	http://subhenoorstore.com/teamway/api/worker/delete.php/
<pre>
	{
	    "id"	: "20"
	}
</pre>
### Worker Shift
#### Fetch ALL Records
*	http://www.subhenoorstore.com/teamway/api/workershift/shift_by_date.php?date=%222021-05-04%22

#### Fetch Single Record
*	http://www.subhenoorstore.com/teamway/api/workershift/shift_by_worker.php?id=2

#### Create Worker Shift

##### We first check by workerId exist in workershift data if not exist then we will insert other wise we throw error msg to client that worker already exist in that day for a shift
*	http://subhenoorstore.com/teamway/api/worker/create.php/
<pre>
	{
	    "workerId" : "1",
		"shiftId" : "1",
	    "date" : "2021-05-09"
	}
</pre>

#### Delete Shift
*	http://subhenoorstore.com/teamway/api/worker/delete.php/
<pre>
	{
	    "workerId" : "1",
	    "date"	: "2021-05-09"
	}
</pre>

## DB Explanation
There are three tables.
*	worker
	-	Worker table is for workers, fields are(id,name,email,age,designation)
*	shift
	-	Shift tables is for shift, fields are(id,title)
*	workershift
	-	workershift is childtable to store the worker's shift record. Fields are (id,workerid,shiftid,date )