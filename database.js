const fs = require('fs');
const mysql = require('mysql');
const { exec } = require('child_process');

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

    // Perform a query
    connection.query('SELECT Name FROM mydata WHERE Email="b"', (error, results, fields) => {
        if (error) {
            console.error('Error executing query: ' + error.stack);
            return;
        }
        console.log('Query results:', results);

        if (results.length > 0) {
            // Read the login HTML file
            fs.readFile('index.html', 'utf8', (err, data) => {
                if (err) {
                    console.error('Error reading file: ' + err.stack);
                    return;
                }

                // Update the login HTML file with the retrieved name
                const updatedData = data.replace('<a id="sigma"></a>', `<a id="sigma">${results[0].name}</a>`);

                // Write the updated content back to the login HTML file
                fs.writeFile('index.html', updatedData, (err) => {
                    if (err) {
                        console.error('Error writing to file: ' + err.stack);
                        return;
                    }
                    console.log('Name written to login.html');

                    // Open the HTML file in the default browser
                    exec('start chrome "http://127.0.0.1:5500/index.html"', (err, stdout, stderr) => {
                        if (err) {
                            console.error('Error opening file: ' + err.stack);
                            return;
                        }
                        console.log('HTML file opened in the browser.');
                    });
                });
            });
        }
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
