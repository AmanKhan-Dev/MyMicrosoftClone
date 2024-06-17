const http = require('http');
const mysql = require('mysql');
const fs = require('fs');

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
});

// Create an HTTP server
const server = http.createServer((req, res) => {
    // Read the HTML file
    fs.readFile('cll.html', 'utf8', (err, html) => {
        if (err) {
            res.writeHead(500, { 'Content-Type': 'text/plain' });
            res.end('Error loading HTML file');
            return;
        }

        // Perform a SELECT query
        connection.query('SELECT Name FROM mydata', (error, results, fields) => {
            if (error) {
                res.writeHead(500, { 'Content-Type': 'text/plain' });
                res.end('Error executing query');
                return;
            }

            // Replace the placeholder in the HTML with the retrieved name
            const name = results[0].Name;
            html = html.replace('{Name}', name);

            // Serve the modified HTML
            res.writeHead(200, { 'Content-Type': 'text/html' });
            res.end(html);
        });
    });
});

// Start the server
const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}/`);
});
