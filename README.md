
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
git clone https://github.com/maridgarcia/backend_php_test.git
cd backend_php_test
```

## Running
- Inside the repository, in the command line run ``php -S localhost:8000`` to start the server. 
You can test the routes using softwares like [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/), or you can send your request via command line as well. For example, if you want to create a class, you can send this request:

```
curl -X POST -H "Content-Type: application/json" -d '{"class_name":"Pilates","start_date":"2023-12-01","end_date":"2023-12-20","capacity":10}' http://localhost:8000/classes
```

## Testing the routes:
There are two routes in this project: ``/classes`` and ``/bookings`` 