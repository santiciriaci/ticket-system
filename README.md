Hi!

This is the code for my ticket project.

Clone the project from Git: git clone https://github.com/santiciriaci/ticket-system.git

Go to the project folder: cd ticket-system

Build and launch the container: docker-compose up --build

Set environment variables: cp .env.example .env

Run the database migrations: docker-compose exec app php artisan migrate

Go to the application: http://localhost:8000


User to create tickets: 
user: useree@example.com
password: password

User to manage tickets: 
user: agentee@example.com
password: password


Utils Routes:

Ticket creation path: /tickets

Ticket management path: /agent/ticket
