# Glofox Task: Back-end

Glofox is a saas platform for boutiques, studios, and gyms which allows business owners to manage
their courses, classes, members, memberships etc,. There are a couple of stories outlined below
which you have to implement.

## Story: Create classes
As a studio owner i want to create classes for my studio so that my members can attend classes

● Implement an API to create classes(`/classes`). Assume this api doesn't need to have any
authentication to start with.

● Few bare minimum details we need to create classes are - class name, start_date, end_date,
capacity. For now, assume that there will be only one class per given day. Ex: If a class by
name pilates starts on 1st Dec and ends on 20th Dec, with capacity 10, that means Pilates
has 20 classes and for each class the maximum capacity of attendance is 10.

● No need to save the details in any database. Maintain an in memory array or a file to save the
info. (If you want to use the database, that's fine as well).

● Use Restful standards and create the api endpoint with proper success and error responses.

## Story - Book for a class
As a member of a studio, I can book for a class, so that I can attend a class.

● Implement an API endpoint (`/bookings`). Assume this api doesn't need to have any
authentication to start with.

● Few bare minimum details we need for reserving a class are - name(name of the member
who is booking the class), date(date for which the member want to book a class)

● No need to save the details in DB. If you can maintain the state in an in memory array or a file
is good to start with. But no constraints if you want to use a database to save the state.

● Use REST standards and think through basic api responses for success and failure.

● No need to consider the scenario of overbooking for a given date. Ex: 14th Dec having a
capacity of 20 , but the number of bookings can be greater than 20.

# Installing and Running the app

## Installing
- Clone the project and go into it's repository: 
```
$ git clone https://github.com/maridgarcia/backend_php_test.git
$ cd backend_php_test
```

## Running
- Inside the project, go into the "src" repository and in the command line run ``php -S localhost:8000`` to start the server. 
You can test the routes using softwares like [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/), or you can send your request via command line as well. For example, if you want to create a class, you can send this request:

```
$ curl -X POST -H "Content-Type: application/json" -d '{"class_name":"Pilates","start_date":"2023-12-01","end_date":"2023-12-20","capacity":10}' http://localhost:8000/classes
```

## Testing the routes:
There are two routes in this project: ``/classes`` and ``/bookings``

## ``/classes``
### GET
Once your server is running, navigate to the "http://localhost:8000/classes". Using the HTTP method __GET__, you receive all the saved classes, or an empty array if no classes have been created yet.

### POST
To create a new class, you must send an object in the request body. The object should be like this:
```
{
    "class_name": "Yoga",
    "start_date": "2023-08-06",
    "end_date": "2023-08-26",
    "capacity": 10,
    "bookings": 0
}
```
_Note: the ``bookings`` field is required, and it has to start with 0._

If all the required fields are provided, you will receive a 201 - Created response.

If one of the fields is not provided, you will receive a 400 - Bad request error with the message "``{"error": "Check your payload. All fields are required!}"``"

## ``/bookings``

### POST
To book a class, you must send an object in the body request. The object should look like this:

```
{
    "class_name": "Yoga",
    "date": "2023-08-06",
    "name": "John Doe"
}
```
_Note: All fields are required._

You must send this object via http://localhost:8000/bookings URL, and it will return a 201 - Created response. Additionally, once you have completed the booking process, you will notice that the "bookings" field in the "classes" has increased by 1.

## Tests
In this project, I used PHPUnit and GuzzleHttp to write the tests.
You can run the tests by going into the "tests" repository and running the following command in the command line:
```
$ phpunit tests/CreateClassTest.php
or
$ phpunit tests/CreateBookingTest.php
```

### Technologies Used in This Project

![PHP](https://img.shields.io/badge/-PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
