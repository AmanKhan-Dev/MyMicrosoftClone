// Include the mysql module
const mysql = require('mysql');

// Create a connection to the database
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '123456789',
    database: 'js_data'
});

// Connect to the database
connection.connect((err) => {
    if (err) {
        console.error('Error connecting to database: ' + err.stack);
        return;
    }
    console.log('Connected to database as id ' + connection.threadId);

    // Perform an INSERT query
    const newRecord = { Name: 'Kauser Khan', Email: 'ak@gmail.com' };
    connection.query('INSERT INTO mydata SET ?', newRecord, (error, results, fields) => {
        if (error) {
            console.error('Error executing query: ' + error.stack);
            return;
        }
        console.log('Inserted new record with ID ' + results.insertId);
    });

    // Close the connection
    connection.end((err) => {
        if (err) {
            console.error('Error closing database connection: ' + err.stack);
            return;
        }
        console.log('Connection closed.');
    });
});
